<x-filament-panels::page>
    @php
        $pageTitle = 'Bulk Import Exam Questions';
    @endphp
    <style>
        .form-header { display: flex; align-items: center; justify-content: space-between; gap: 16px; flex-wrap: wrap; margin-bottom: 20px; }
        .form-header-left { display: flex; align-items: center; gap: 12px; }
        .form-header-icon { width: 38px; height: 38px; border-radius: 10px; background: var(--accent-light); color: var(--accent); display: flex; align-items: center; justify-content: center; font-size: 16px; flex-shrink: 0; }
        .form-header-text h1 { font-size: 18px; font-weight: 700; color: var(--text); margin: 0; }
        .form-header-text p { font-size: 13px; color: var(--text-muted); margin: 4px 0 0; }
        .form-card { background: var(--bg-card); border: 1px solid var(--border); border-radius: var(--radius-lg); padding: 28px; max-width: 860px; transition: box-shadow .2s; margin-bottom: 24px; }
        .form-card:hover { box-shadow: var(--shadow-sm); }
        .step-bar { display: flex; align-items: center; gap: 8px; margin-bottom: 24px; }
        .step { display: flex; align-items: center; gap: 8px; font-size: 13px; font-weight: 600; color: var(--text-muted); }
        .step.active { color: var(--accent); }
        .step.done { color: #16a34a; }
        .step-num { width: 28px; height: 28px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: 700; background: var(--border); color: var(--text-muted); }
        .step.active .step-num { background: var(--accent-light); color: var(--accent); }
        .step.done .step-num { background: #16a34a15; color: #16a34a; }
        .step-line { flex: 1; height: 2px; background: var(--border); min-width: 24px; }
        .step-line.done { background: #16a34a; }
        .section-title { font-size: 15px; font-weight: 700; color: var(--text); margin: 0 0 16px; display: flex; align-items: center; gap: 8px; }
        .summary-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(140px, 1fr)); gap: 12px; margin-bottom: 20px; }
        .summary-card { background: var(--bg); border: 1px solid var(--border); border-radius: var(--radius-md); padding: 16px; text-align: center; }
        .summary-value { font-size: 24px; font-weight: 700; color: var(--text); }
        .summary-label { font-size: 11px; color: var(--text-muted); margin-top: 4px; }
        .q-preview { background: var(--bg); border: 1px solid var(--border); border-radius: var(--radius-md); padding: 16px; margin-bottom: 10px; }
        .q-preview-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px; }
        .q-type { font-size: 10px; font-weight: 700; text-transform: uppercase; padding: 2px 8px; border-radius: 4px; }
        .q-type.mc { background: #2563eb15; color: #2563eb; }
        .q-type.tf { background: #16a34a15; color: #16a34a; }
        .q-type.sa { background: #f5a52415; color: #f5a524; }
        .q-type.sc { background: #7c3aed15; color: #7c3aed; }
        .q-text { font-size: 14px; font-weight: 500; color: var(--text); margin-bottom: 6px; }
        .q-options { font-size: 12px; color: var(--text-muted); }
        .q-answer { font-size: 12px; color: #16a34a; font-weight: 600; margin-top: 4px; }
        .q-answers { font-size: 12px; color: var(--text-muted); margin-top: 4px; padding-left: 16px; }
        .q-answers li { margin-bottom: 2px; }
        .btn-primary { display: inline-flex; align-items: center; gap: 8px; background: var(--crimson); color: #fff; font-weight: 600; padding: 11px 24px; border-radius: var(--radius-md); border: none; cursor: pointer; font-size: 14px; transition: all .15s; }
        .btn-primary:hover { background: var(--crimson-hover); box-shadow: var(--shadow-md); }
        .btn-secondary { display: inline-flex; align-items: center; gap: 8px; background: var(--bg-card); color: var(--text); font-weight: 600; padding: 11px 24px; border-radius: var(--radius-md); border: 1px solid var(--border); cursor: pointer; font-size: 14px; transition: all .15s; }
        .btn-secondary:hover { border-color: var(--accent); color: var(--accent); }
        .btn-success { display: inline-flex; align-items: center; gap: 8px; background: #16a34a; color: #fff; font-weight: 600; padding: 11px 24px; border-radius: var(--radius-md); border: none; cursor: pointer; font-size: 14px; transition: all .15s; }
        .btn-success:hover { background: #15803d; box-shadow: var(--shadow-md); }
        .btn-group { display: flex; align-items: center; gap: 12px; flex-wrap: wrap; }
        .success-card { background: #16a34a10; border: 1px solid #16a34a30; border-radius: var(--radius-lg); padding: 32px; text-align: center; max-width: 500px; margin: 0 auto; }
        .success-card h2 { font-size: 20px; font-weight: 700; color: #16a34a; margin: 16px 0 8px; }
        .success-card p { font-size: 14px; color: var(--text-muted); margin: 0 0 20px; }
        .parse-section { margin-top: 20px; }
    </style>

    <div id="dash" x-data="{ mobileSidebar: false }">
        <x-admin.dash-layout :title="$pageTitle">
            <div class="dash-content">

                {{-- Header --}}
                <div class="form-header">
                    <div class="form-header-left">
                        <div class="form-header-icon">
                            <i class="fas fa-file-upload"></i>
                        </div>
                        <div class="form-header-text">
                            <h1>{{ $pageTitle }}</h1>
                            <p>Upload Excel, PDF, DOCX, CSV, or TXT files with exam questions and import them automatically.</p>
                        </div>
                    </div>
                </div>

                {{-- Step Bar --}}
                <div class="step-bar">
                    <div class="step {{ $this->hasParsedQuestions() ? 'done' : 'active' }}">
                        <span class="step-num"><i class="fas {{ $this->hasParsedQuestions() ? 'fa-check' : 'fa-1' }}"></i></span>
                        <span>Fill Details & Upload</span>
                    </div>
                    <div class="step-line {{ $this->hasParsedQuestions() ? 'done' : '' }}"></div>
                    <div class="step {{ $this->hasParsedQuestions() ? 'active' : '' }}">
                        <span class="step-num"><i class="fas {{ $this->hasParsedQuestions() ? 'fa-check' : 'fa-2' }}"></i></span>
                        <span>Review & Import</span>
                    </div>
                    @if($this->exam)
                    <div class="step-line done"></div>
                    <div class="step done">
                        <span class="step-num"><i class="fas fa-check"></i></span>
                        <span>Done!</span>
                    </div>
                    @endif
                </div>

                {{-- Step 1: Form --}}
                @if(!$this->hasParsedQuestions() && !$this->exam)
                <div class="form-card">
                    {{ $this->form }}
                    <div style="margin-top: 20px; text-align: right;">
                        <button wire:click="parse" class="btn-primary" wire:loading.attr="disabled">
                            <i class="fas fa-play"></i> Parse File
                        </button>
                    </div>
                </div>
                @endif

                {{-- Step 2: Preview --}}
                @if($this->hasParsedQuestions())
                <div class="form-card">
                    <div class="section-title"><i class="fas fa-eye"></i> Parsed Questions Preview</div>

                    {{-- Summary Cards --}}
                    <div class="summary-grid">
                        <div class="summary-card">
                            <div class="summary-value">{{ $this->summary['total'] ?? 0 }}</div>
                            <div class="summary-label">Total Questions</div>
                        </div>
                        <div class="summary-card">
                            <div class="summary-value" style="color:#2563eb">{{ $this->summary['multiple_choice'] ?? 0 }}</div>
                            <div class="summary-label">Multiple Choice</div>
                        </div>
                        <div class="summary-card">
                            <div class="summary-value" style="color:#16a34a">{{ $this->summary['true_false'] ?? 0 }}</div>
                            <div class="summary-label">True / False</div>
                        </div>
                        <div class="summary-card">
                            <div class="summary-value" style="color:#f5a524">{{ $this->summary['short_answer'] ?? 0 }}</div>
                            <div class="summary-label">Short Answer</div>
                        </div>
                        <div class="summary-card">
                            <div class="summary-value" style="color:#7c3aed">{{ $this->summary['scenario'] ?? 0 }}</div>
                            <div class="summary-label">Scenarios</div>
                        </div>
                    </div>

                    {{-- Question Previews (first 10) --}}
                    @foreach(array_slice($this->parsedQuestions, 0, 10) as $q)
                    <div class="q-preview">
                        <div class="q-preview-header">
                            <span class="q-type {{ $q['type'] === 'multiple_choice' ? 'mc' : ($q['type'] === 'true_false' ? 'tf' : ($q['type'] === 'short_answer' ? 'sa' : 'sc')) }}">
                                {{ str_replace('_', ' ', ucfirst($q['type'])) }}
                            </span>
                        </div>
                        <div class="q-text">{{ $q['question'] }}</div>
                        @if($q['type'] === 'multiple_choice' && !empty($q['options']))
                        <div class="q-options">
                            @foreach(['a', 'b', 'c', 'd'] as $opt)
                                @if(!empty($q['options'][$opt]))
                                    <div>{{ strtoupper($opt) }}. {{ $q['options'][$opt] }}</div>
                                @endif
                            @endforeach
                        </div>
                        <div class="q-answer">Answer: {{ strtoupper($q['correctAnswer']) }}</div>
                        @endif
                        @if($q['type'] === 'true_false')
                        <div class="q-answer">Answer: {{ $q['correctAnswer'] }}</div>
                        @endif
                        @if(($q['type'] === 'short_answer' || $q['type'] === 'scenario') && !empty($q['answers']))
                        <ul class="q-answers">
                            @foreach($q['answers'] as $ans)
                                <li>{{ $ans }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    @endforeach

                    @if(count($this->parsedQuestions) > 10)
                    <p style="text-align: center; font-size: 13px; color: var(--text-muted); margin: 12px 0;">
                        Showing 10 of {{ count($this->parsedQuestions) }} questions
                    </p>
                    @endif

                    {{-- Actions --}}
                    <div class="btn-group" style="justify-content: flex-end; margin-top: 20px;">
                        <button wire:click="$set('parsedQuestions', [])" class="btn-secondary">
                            <i class="fas fa-times"></i> Cancel
                        </button>
                        <button wire:click="parse" class="btn-secondary">
                            <i class="fas fa-redo"></i> Re-parse
                        </button>
                        <button wire:click="import" class="btn-success" wire:loading.attr="disabled">
                            <i class="fas fa-check"></i> Import {{ count($this->parsedQuestions) }} Questions
                        </button>
                    </div>
                </div>
                @endif

                {{-- Step 3: Success --}}
                @if($this->exam)
                <div class="success-card">
                    <i class="fas fa-check-circle" style="font-size: 48px; color: #16a34a;"></i>
                    <h2>Exam Created Successfully!</h2>
                    <p><strong>{{ $this->exam->title }}</strong> has been created with {{ $this->summary['total'] ?? 0 }} questions. Students enrolled in the course have been notified.</p>
                    <div class="btn-group" style="justify-content: center;">
                        <a href="{{ \App\Filament\Resources\Exams\ExamResource::getUrl('edit', ['record' => $this->exam->id]) }}" class="btn-primary">
                            <i class="fas fa-pen"></i> Edit Exam
                        </a>
                        <a href="{{ url('/admin/exams') }}" class="btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to Exams
                        </a>
                        <button wire:click="$set('exam', null)" class="btn-secondary">
                            <i class="fas fa-plus"></i> Import Another
                        </button>
                    </div>
                </div>
                @endif

                {{-- Format Help --}}
                <div class="form-card" style="max-width: 860px;">
                    <div class="section-title"><i class="fas fa-info-circle"></i> Accepted File Formats</div>
                    <div style="font-size: 13px; color: var(--text-muted); line-height: 1.7;">
                        <p><strong>Excel (.xlsx, .xls):</strong> First row as header: Question, Option A, Option B, Option C, Option D, Correct Answer. Or paste questions in text format in cells.</p>
                        <p><strong>Text format (.txt, .pdf, .docx):</strong> The parser detects this format automatically:</p>
                        <pre style="background: var(--bg); padding: 12px; border-radius: 8px; font-size: 12px; line-height: 1.6; margin: 8px 0; white-space: pre-wrap;">
1. Question text here?
A) Option A
B) Option B
C) Option C
D) Option D
Answer: C

2. True or false statement?
Answer: True

3. Short answer question?
Answer:
Bullet point 1
Bullet point 2</pre>
                        <p><strong>CSV:</strong> Same format as Excel with comma-separated values.</p>
                        <p><strong>Note:</strong> Exam is created as <strong>inactive</strong> by default. You must activate it and open the exam portal for students to access it.</p>
                    </div>
                </div>

            </div>
        </x-admin.dash-layout>
    </div>
</x-filament-panels::page>
