<x-filament-panels::page>
    <x-student.dash-layout title="{{ $exam->title }}">
        <div class="dash-content">
            <style>
                [x-cloak] { display: none !important; }
                .exam-option { transition: all 0.15s ease; }
                .exam-option:hover { border-color: var(--crimson); background: color-mix(in srgb, var(--crimson) 5%, transparent); }
            </style>
            <div x-data="{ timeLeft: {{ $timeRemaining }}, minutes: 0, seconds: 0, init() { this.updateDisplay(); setInterval(() => { this.timeLeft--; this.updateDisplay(); if(this.timeLeft <= 0) document.getElementById('exam-form').requestSubmit(); }, 1000); }, updateDisplay() { this.minutes = Math.floor(this.timeLeft / 60); this.seconds = this.timeLeft % 60; } }">
                {{-- Timer Header --}}
                <div class="stat-card" style="margin-bottom:24px;padding:16px 24px;display:flex;align-items:center;justify-content:space-between;">
                    <div>
                        <h2 style="font-size:18px;font-weight:700;color:var(--text);margin:0 0 4px;">{{ $exam->title }}</h2>
                        <p style="font-size:12px;color:var(--text-muted);margin:0;">Attempt {{ $attempt->attempt_number }} of {{ $exam->max_attempts }}</p>
                    </div>
                    <div style="text-align:center;" :style="timeLeft < 60 ? 'color:#dc2626;' : 'color:var(--crimson);'">
                        <div style="font-size:28px;font-weight:700;line-height:1;" x-text="String(minutes).padStart(2, '0') + ':' + String(seconds).padStart(2, '0')"></div>
                        <div style="font-size:11px;font-weight:600;color:var(--text-muted);margin-top:2px;">REMAINING</div>
                    </div>
                </div>

                {{-- Questions --}}
                <form id="exam-form" action="{{ route('student.exam.submit', ['attemptId' => $attempt->id]) }}" method="POST">
                    @csrf
                    <div style="display:flex;flex-direction:column;gap:16px;">
                        @foreach($questions as $index => $question)
                        <div class="dash-section-card">
                            <p style="font-weight:600;color:var(--text);margin:0 0 12px;font-size:15px;">{{ $index + 1 }}. {{ $question->question_text }}</p>
                            <div style="display:flex;flex-direction:column;gap:8px;">
                                @foreach(['a', 'b', 'c', 'd'] as $option)
                                @if(!empty($question['option_' . $option]))
                                <label class="exam-option" style="display:flex;align-items:center;gap:12px;padding:12px 16px;border-radius:var(--radius-md);border:1px solid var(--border);cursor:pointer;">
                                    <input type="radio" name="question_{{ $question->id }}" value="{{ $option }}" style="accent-color:var(--crimson);width:16px;height:16px;" required>
                                    <span style="font-size:14px;color:var(--text);">{{ $question['option_' . $option] }}</span>
                                </label>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div style="margin-top:32px;text-align:center;">
                        <button type="submit" style="display:inline-flex;align-items:center;gap:8px;background:var(--crimson);color:#fff;font-weight:700;padding:14px 48px;border-radius:var(--radius-md);border:none;cursor:pointer;font-size:15px;box-shadow:var(--shadow-md);transition:all 0.15s;" onmouseover="this.style.background='var(--crimson-hover)'" onmouseout="this.style.background='var(--crimson)'">
                            <i class="fas fa-check-circle"></i> Submit Exam
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </x-student.dash-layout>
</x-filament-panels::page>
