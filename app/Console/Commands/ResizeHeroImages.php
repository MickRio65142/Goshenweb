<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ResizeHeroImages extends Command
{
    protected $signature = 'images:resize-heroes
                            {--max-width=1200 : Max width in pixels}
                            {--quality=80 : JPEG/WebP quality (0-100)}
                            {--force : Re-encode even if already <= max-width}';

    protected $description = 'Resize, convert PNG-to-JPEG, and compress hero images';

    public function handle()
    {
        $maxWidth = (int) $this->option('max-width');
        $quality = (int) $this->option('quality');
        $force = $this->option('force');
        $dir = public_path('images');
        $files = glob($dir . '/*hero*.{jpg,jpeg,png,webp}', GLOB_BRACE);

        if (empty($files)) {
            $this->warn('No hero images found in ' . $dir);
            return Command::SUCCESS;
        }

        $count = 0;
        $saved = 0;

        foreach ($files as $path) {
            $beforeSize = filesize($path);
            if (!$beforeSize) {
                $this->line("  Skipped (0 B): " . basename($path));
                continue;
            }

            $info = getimagesize($path);
            if (!$info) {
                $this->line("  Skipped (unreadable): " . basename($path));
                continue;
            }

            [$w, $h, $type] = $info;
            $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));

            $isPngMislabeled = ($type === IMAGETYPE_PNG && $ext === 'jpg');
            $needsResize = $w > $maxWidth;

            if (!$needsResize && !$isPngMislabeled && !$force) {
                $this->line("  OK ({$w}px): " . basename($path));
                continue;
            }

            $src = $this->createImage($path, $type);
            if (!$src) {
                $this->line("  Skipped (unsupported type): " . basename($path));
                continue;
            }

            $newW = min($w, $maxWidth);
            $newH = (int) round($h * ($newW / $w));

            $dst = imagecreatetruecolor($newW, $newH);
            imagecopyresampled($dst, $src, 0, 0, 0, 0, $newW, $newH, $w, $h);
            imagedestroy($src);

            imagejpeg($dst, $path, $quality);
            imagedestroy($dst);
            clearstatcache(true, $path);

            $afterSize = filesize($path);
            $saved += $beforeSize - $afterSize;
            $count++;

            $actions = [];
            if ($isPngMislabeled) $actions[] = 'PNG→JPEG';
            if ($needsResize) $actions[] = "{$w}x{$h}→{$newW}x{$newH}";
            if (!$needsResize && !$isPngMislabeled) $actions[] = "re-encoded q{$quality}";
            $label = implode(', ', $actions);

            $this->line("  {$label} (" . $this->formatBytes($beforeSize) . " → " . $this->formatBytes($afterSize) . "): " . basename($path));
        }

        $this->newLine();
        $this->info("Done. {$count} images processed, {$this->formatBytes($saved)} saved.");
        return Command::SUCCESS;
    }

    private function createImage(string $path, int $type)
    {
        return match ($type) {
            IMAGETYPE_JPEG => imagecreatefromjpeg($path),
            IMAGETYPE_PNG => imagecreatefrompng($path),
            IMAGETYPE_WEBP => imagecreatefromwebp($path),
            default => null,
        };
    }

    private function formatBytes(int $bytes): string
    {
        if ($bytes >= 1048576) return round($bytes / 1048576, 1) . ' MB';
        if ($bytes >= 1024) return round($bytes / 1024, 1) . ' KB';
        return $bytes . ' B';
    }
}
