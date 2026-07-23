<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class ExamImportService
{
    public function parseFromFile(UploadedFile $file): array
    {
        $extension = strtolower($file->getClientOriginalExtension());

        $text = match ($extension) {
            'xlsx', 'xls' => $this->parseExcel($file),
            'pdf' => $this->parsePdf($file),
            'docx' => $this->parseDocx($file),
            'csv' => $this->parseCsv($file),
            'txt' => file_get_contents($file->getPathname()),
            default => throw new \Exception("Unsupported file format: {$extension}"),
        };

        return $this->parseText($text);
    }

    private function parseExcel(UploadedFile $file): string
    {
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file->getPathname());
        $rows = $spreadsheet->getActiveSheet()->toArray();
        return $this->rowsToText($rows);
    }

    private function parseCsv(UploadedFile $file): string
    {
        $rows = array_map('str_getcsv', file($file->getPathname()));
        return $this->rowsToText($rows);
    }

    private function rowsToText(array $rows): string
    {
        if (empty($rows) || empty($rows[0])) return '';

        $firstCol = strtolower(trim($rows[0][0] ?? ''));
        $hasHeader = str_contains($firstCol, 'question');

        $text = '';
        foreach ($rows as $i => $row) {
            if ($hasHeader && $i === 0) continue;

            $question = trim($row[0] ?? '');
            $optionA = trim($row[1] ?? '');
            $optionB = trim($row[2] ?? '');
            $optionC = trim($row[3] ?? '');
            $optionD = trim($row[4] ?? '');
            $answer = trim($row[5] ?? '');

            if (empty($question)) continue;

            $text .= ($hasHeader ? ($i) : ($i + 1)) . ". {$question}\n";
            if (!empty($optionA)) $text .= "A) {$optionA}\n";
            if (!empty($optionB)) $text .= "B) {$optionB}\n";
            if (!empty($optionC)) $text .= "C) {$optionC}\n";
            if (!empty($optionD)) $text .= "D) {$optionD}\n";
            $text .= "Answer: {$answer}\n\n";
        }
        return $text;
    }

    private function parsePdf(UploadedFile $file): string
    {
        $parser = new \Smalot\PdfParser\Parser();
        $pdf = $parser->parseFile($file->getPathname());
        return $pdf->getText();
    }

    private function parseDocx(UploadedFile $file): string
    {
        $zip = new \ZipArchive();
        if ($zip->open($file->getPathname()) !== true) {
            throw new \Exception('Could not open DOCX file');
        }
        $content = $zip->getFromName('word/document.xml');
        $zip->close();

        if (!$content) {
            throw new \Exception('Could not read DOCX content');
        }

        $content = strip_tags($content);
        return html_entity_decode($content, ENT_QUOTES, 'UTF-8');
    }

    public function parseText(string $text): array
    {
        $text = preg_replace('/[^\x20-\x7E\x0A\x0D\x80-\xFF\xE1\xE9\xED\xF3\xFA]/', '', $text);
        $lines = explode("\n", $text);

        $blocks = [];
        $currentBlock = [];

        foreach ($lines as $line) {
            $trimmed = trim($line);
            if (empty($trimmed)) {
                if (!empty($currentBlock)) {
                    $blocks[] = $currentBlock;
                    $currentBlock = [];
                }
                continue;
            }

            if (preg_match('/^(SECTION|Section)\s+[A-Z]/', $trimmed)) {
                if (!empty($currentBlock)) {
                    $blocks[] = $currentBlock;
                }
                $currentBlock = [];
                continue;
            }

            if (preg_match('/^(Total Marks|Time:|ANSWER KEY|Answer Key|Answer Summary|Write True|Choose the correct|Below are)/i', $trimmed)) {
                continue;
            }

            $currentBlock[] = $trimmed;
        }
        if (!empty($currentBlock)) {
            $blocks[] = $currentBlock;
        }

        $questions = [];

        foreach ($blocks as $blockLines) {
            $questionText = '';
            $options = ['a' => '', 'b' => '', 'c' => '', 'd' => ''];
            $correctOption = null;
            $isTrueFalse = false;
            $isShortAnswer = false;
            $answers = [];
            $isScenario = false;

            foreach ($blockLines as $line) {
                if (preg_match('/^\d+[\.\)]\s*(.+)/', $line, $m)) {
                    if (!empty($questionText)) {
                        $this->saveQuestion($questions, $questionText, $options, $correctOption, $isTrueFalse, $isShortAnswer, $answers, $isScenario);
                        $options = ['a' => '', 'b' => '', 'c' => '', 'd' => ''];
                        $correctOption = null;
                        $isTrueFalse = false;
                        $isShortAnswer = false;
                        $answers = [];
                        $isScenario = false;
                    }
                    $questionText = $m[1];

                    if (preg_match('/\.\s*(True|False)$/i', $questionText, $tfMatch)) {
                        $isTrueFalse = true;
                        $correctOption = ucfirst(strtolower($tfMatch[1]));
                    }
                } elseif (preg_match('/^[Aa][\.\)]\s*(.+)/', $line, $m)) {
                    $options['a'] = $m[1];
                } elseif (preg_match('/^[Bb][\.\)]\s*(.+)/', $line, $m)) {
                    $options['b'] = $m[1];
                } elseif (preg_match('/^[Cc][\.\)]\s*(.+)/', $line, $m)) {
                    $options['c'] = $m[1];
                } elseif (preg_match('/^[Dd][\.\)]\s*(.+)/', $line, $m)) {
                    $options['d'] = $m[1];
                } elseif (preg_match('/^Answer:\s*([a-dA-D])/i', $line, $m)) {
                    $correctOption = strtolower($m[1]);
                } elseif (preg_match('/^Answer:\s*(True|False)/i', $line, $m)) {
                    $isTrueFalse = true;
                    $correctOption = ucfirst(strtolower($m[1]));
                } elseif (preg_match('/^Answer:\s*(.+)/i', $line, $m)) {
                    $isShortAnswer = true;
                    $answers[] = trim($m[1]);
                } elseif (preg_match('/^Answer:/i', $line)) {
                    $isShortAnswer = true;
                } elseif (!empty($line) && $isShortAnswer) {
                    $clean = preg_replace('/^[•>\-\*\s]+/', '', $line);
                    if (!empty(trim($clean))) {
                        $answers[] = trim($clean);
                    }
                } elseif (!empty($line) && empty($options['a']) && empty($options['b'])) {
                    if (strlen($line) > 60) {
                        $isScenario = true;
                    }
                    $questionText .= "\n" . $line;
                }
            }

            if (!empty($questionText)) {
                $this->saveQuestion($questions, $questionText, $options, $correctOption, $isTrueFalse, $isShortAnswer, $answers, $isScenario);
            }
        }

        return $questions;
    }

    private function saveQuestion(array &$questions, string $text, array $options, $correct, bool $tf, bool $sa, array $answers, bool $scenario): void
    {
        $text = trim(preg_replace('/\s+/', ' ', $text));

        if ($sa) {
            $questions[] = [
                'type' => 'short_answer',
                'question' => $text,
                'answers' => $answers,
            ];
        } elseif ($tf) {
            $questions[] = [
                'type' => 'true_false',
                'question' => $text,
                'correctAnswer' => $correct,
            ];
        } elseif ($correct && !empty($options['a'])) {
            $questions[] = [
                'type' => 'multiple_choice',
                'question' => $text,
                'options' => $options,
                'correctAnswer' => $correct,
            ];
        } elseif ($scenario) {
            $questions[] = [
                'type' => 'scenario',
                'question' => $text,
                'answers' => $answers ?: [$text],
            ];
        }
    }
}
