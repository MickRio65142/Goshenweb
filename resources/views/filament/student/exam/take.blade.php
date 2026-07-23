<x-filament-panels::page>
    <x-student.dash-layout title="{{ $exam->title }}">
        <div class="dash-content">
            <style>
                [x-cloak] { display: none !important; }
                .exam-option { transition: all 0.15s ease; }
                .exam-option:hover { border-color: var(--crimson); background: color-mix(in srgb, var(--crimson) 5%, transparent); }
                .exam-option.has-error { border-color: #dc2626; background: color-mix(in srgb, #dc2626 5%, transparent); }
                .q-progress { display: flex; align-items: center; gap: 6px; margin-bottom: 20px; }
                .q-dot { width: 10px; height: 10px; border-radius: 50%; background: var(--border); flex-shrink: 0; }
                .q-dot.active { background: var(--crimson); box-shadow: 0 0 0 3px color-mix(in srgb, var(--crimson) 25%, transparent); }
                .q-dot.answered { background: #16a34a; }
                .nav-btn { display: inline-flex; align-items: center; gap: 6px; padding: 10px 20px; border-radius: var(--radius-md); border: 1px solid var(--border); cursor: pointer; font-weight: 600; font-size: 14px; transition: all 0.15s; background: var(--bg-card); color: var(--text); }
                .nav-btn:hover { border-color: var(--accent); color: var(--accent); }
                .nav-btn:disabled { opacity: 0.4; cursor: not-allowed; }
            </style>

            @php $perQuestion = $exam->time_per_question_seconds; @endphp

            <div x-data="examTimer({
                totalTime: {{ $timeRemaining }},
                perQuestionTime: {{ $perQuestion ? $perQuestion : 'null' }},
                totalQuestions: {{ $questions->count() }}
            })">
                {{-- Header --}}
                <div class="stat-card" style="margin-bottom:24px;padding:16px 24px;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px;">
                    <div>
                        <h2 style="font-size:18px;font-weight:700;color:var(--text);margin:0 0 4px;">{{ $exam->title }}</h2>
                        <p style="font-size:12px;color:var(--text-muted);margin:0;">
                            Attempt {{ $attempt->attempt_number }} of {{ $exam->max_attempts }}
                            @if($perQuestion)
                                &middot; <span x-text="currentQuestion + 1"></span> of {{ $questions->count() }} questions
                            @endif
                        </p>
                    </div>
                    <div style="text-align:center;" :style="timerStyle">
                        <div style="font-size:28px;font-weight:700;line-height:1;" x-text="timerDisplay"></div>
                        <div style="font-size:11px;font-weight:600;color:var(--text-muted);margin-top:2px;">
                            <span x-text="perQuestionTime ? 'TIME LEFT (QUESTION)' : 'REMAINING'"></span>
                        </div>
                    </div>
                </div>

                {{-- Question progress dots (per-question mode) --}}
                <template x-if="perQuestionTime">
                    <div class="q-progress">
                        <template x-for="(q, i) in questions" :key="i">
                            <div class="q-dot" :class="{ active: i === currentQuestion, answered: answered[i] }"></div>
                        </template>
                    </div>
                </template>

                {{-- Exam Form --}}
                <form id="exam-form" action="{{ route('student.exam.submit', ['attemptId' => $attempt->id]) }}" method="POST">
                    @csrf

                    @if($perQuestion)
                        {{-- One question at a time --}}
                        @foreach($questions as $index => $question)
                        <div x-show="currentQuestion === {{ $index }}" x-cloak x-transition.opacity.duration.200ms>
                            <div class="dash-section-card">
                                <p style="font-weight:600;color:var(--text);margin:0 0 4px;font-size:15px;">
                                    <span style="color:var(--crimson);font-weight:700;">{{ $index + 1 }}.</span>
                                    {{ $question->question_text }}
                                </p>
                                <div style="display:flex;flex-direction:column;gap:8px;margin-top:16px;">
                                    @foreach(['a', 'b', 'c', 'd'] as $option)
                                    @if(!empty($question['option_' . $option]))
                                    <label class="exam-option" style="display:flex;align-items:center;gap:12px;padding:12px 16px;border-radius:var(--radius-md);border:1px solid var(--border);cursor:pointer;">
                                        <input type="radio" name="question_{{ $question->id }}" value="{{ $option }}"
                                               style="accent-color:var(--crimson);width:16px;height:16px;" required
                                               @@change="answered[{{ $index }}] = true">
                                        <span style="font-size:14px;color:var(--text);">{{ $question['option_' . $option] }}</span>
                                    </label>
                                    @endif
                                    @endforeach
                                </div>
                            </div>

                            {{-- Navigation --}}
                            <div style="display:flex;align-items:center;justify-content:space-between;margin-top:20px;">
                                <button type="button" class="nav-btn" @@click="prevQuestion" :disabled="currentQuestion === 0">
                                    <i class="fas fa-arrow-left"></i> Previous
                                </button>
                                <template x-if="currentQuestion < totalQuestions - 1">
                                    <button type="button" class="nav-btn" @@click="nextQuestion">
                                        Next <i class="fas fa-arrow-right"></i>
                                    </button>
                                </template>
                                <template x-if="currentQuestion === totalQuestions - 1">
                                    <button type="submit" style="display:inline-flex;align-items:center;gap:8px;background:var(--crimson);color:#fff;font-weight:700;padding:10px 32px;border-radius:var(--radius-md);border:none;cursor:pointer;font-size:15px;box-shadow:var(--shadow-md);transition:all 0.15s;">
                                        <i class="fas fa-check-circle"></i> Submit Exam
                                    </button>
                                </template>
                            </div>
                        </div>
                        @endforeach
                    @else
                        {{-- All questions visible (original mode) --}}
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
                            <button type="submit" style="display:inline-flex;align-items:center;gap:8px;background:var(--crimson);color:#fff;font-weight:700;padding:14px 48px;border-radius:var(--radius-md);border:none;cursor:pointer;font-size:15px;box-shadow:var(--shadow-md);transition:all 0.15s;">
                                <i class="fas fa-check-circle"></i> Submit Exam
                            </button>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </x-student.dash-layout>

    <script>
        function examTimer(config) {
            return {
                totalTime: config.totalTime,
                perQuestionTime: config.perQuestionTime,
                totalQuestions: config.totalQuestions,
                currentQuestion: 0,
                questionTimer: config.perQuestionTime || 0,
                answered: new Array(config.totalQuestions).fill(false),
                timerInterval: null,
                seconds: 0,
                minutes: 0,

                init() {
                    if (this.perQuestionTime) {
                        this.questionTimer = this.perQuestionTime;
                    }
                    this.updateDisplay();
                    this.timerInterval = setInterval(() => {
                        if (this.perQuestionTime) {
                            this.questionTimer--;
                            if (this.questionTimer <= 0) {
                                this.autoAdvance();
                            }
                        }
                        this.totalTime--;
                        this.updateDisplay();
                        if (this.totalTime <= 0) {
                            document.getElementById('exam-form').requestSubmit();
                        }
                    }, 1000);
                },

                autoAdvance() {
                    if (this.currentQuestion < this.totalQuestions - 1) {
                        this.currentQuestion++;
                        this.questionTimer = this.perQuestionTime;
                        this.updateDisplay();
                    } else {
                        document.getElementById('exam-form').requestSubmit();
                    }
                },

                nextQuestion() {
                    if (this.currentQuestion < this.totalQuestions - 1) {
                        this.currentQuestion++;
                        if (this.perQuestionTime) this.questionTimer = this.perQuestionTime;
                        this.updateDisplay();
                    }
                },

                prevQuestion() {
                    if (this.currentQuestion > 0) {
                        this.currentQuestion--;
                        if (this.perQuestionTime) this.questionTimer = this.perQuestionTime;
                        this.updateDisplay();
                    }
                },

                updateDisplay() {
                    const t = this.perQuestionTime ? this.questionTimer : this.totalTime;
                    this.minutes = Math.floor(t / 60);
                    this.seconds = t % 60;
                },

                get timerDisplay() {
                    return String(this.minutes).padStart(2, '0') + ':' + String(this.seconds).padStart(2, '0');
                },

                get timerStyle() {
                    const t = this.perQuestionTime ? this.questionTimer : this.totalTime;
                    return t < 60 ? 'color:#dc2626;' : 'color:var(--crimson);';
                }
            };
        }
    </script>
</x-filament-panels::page>