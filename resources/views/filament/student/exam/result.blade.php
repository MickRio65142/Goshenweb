<x-filament-panels::page>
    <x-student.dash-layout title="Exam Result">
        <div class="dash-content">
            <div style="max-width:640px;margin:0 auto;">
                {{-- Score Card --}}
                <div style="background:var(--bg-card);border-radius:var(--radius-lg);border:1px solid {{ $attempt->passed ? '#bbf7d0' : '#fecaca' }};padding:40px;text-align:center;margin-bottom:24px;">
                    @if($attempt->passed)
                    <div style="width:72px;height:72px;margin:0 auto 24px;background:#dcfce7;border-radius:50%;display:flex;align-items:center;justify-content:center;">
                        <i class="fas fa-check" style="color:#16a34a;font-size:28px;"></i>
                    </div>
                    <h1 style="font-size:28px;font-weight:700;color:var(--text);margin:0 0 8px;">Congratulations!</h1>
                    <p style="color:var(--text-muted);margin:0 0 24px;">You passed the exam.</p>
                    @else
                    <div style="width:72px;height:72px;margin:0 auto 24px;background:#fecaca;border-radius:50%;display:flex;align-items:center;justify-content:center;">
                        <i class="fas fa-xmark" style="color:#dc2626;font-size:28px;"></i>
                    </div>
                    <h1 style="font-size:28px;font-weight:700;color:var(--text);margin:0 0 8px;">Not This Time</h1>
                    <p style="color:var(--text-muted);margin:0 0 24px;">You didn't reach the passing score of {{ $exam->pass_score }}%.</p>
                    @endif

                    <div style="display:inline-flex;align-items:center;gap:16px;padding:12px 24px;border-radius:999px;font-weight:700;font-size:16px;{{ $attempt->passed ? 'background:#dcfce7;color:#16a34a;' : 'background:#fecaca;color:#dc2626;' }}">
                        <span>Score: {{ number_format($attempt->score, 1) }}%</span>
                        <span style="color:var(--border);">|</span>
                        <span>Pass Mark: {{ $exam->pass_score }}%</span>
                    </div>

                    @if(!$attempt->passed && $attempt->attempt_number < $exam->max_attempts)
                    <div style="margin-top:24px;">
                        <p style="font-size:13px;color:var(--text-muted);margin:0 0 12px;">You have {{ $exam->max_attempts - $attempt->attempt_number }} attempt(s) remaining.</p>
                        <a href="{{ url('/student/exams/' . $exam->id . '/start') }}" style="display:inline-block;background:var(--crimson);color:#fff;font-weight:700;padding:12px 32px;border-radius:var(--radius-md);text-decoration:none;box-shadow:var(--shadow-md);transition:all 0.15s;" onmouseover="this.style.background='var(--crimson-hover)'" onmouseout="this.style.background='var(--crimson)'">
                            <i class="fas fa-rotate" style="margin-right:8px;"></i> Retry Exam
                        </a>
                    </div>
                    @endif

                    <div style="margin-top:16px;">
                        <a href="{{ url('/student/exams') }}" style="font-size:13px;color:var(--crimson);font-weight:600;text-decoration:none;">
                            <i class="fas fa-arrow-left" style="margin-right:4px;"></i> Back to Exams
                        </a>
                    </div>
                </div>

                {{-- Reference Material --}}
                @if(!empty($referenceMaterial))
                <div class="dash-section-card">
                    <div style="display:flex;align-items:center;gap:12px;margin-bottom:24px;">
                        <div style="width:40px;height:40px;border-radius:50%;background:var(--crimson-light);display:flex;align-items:center;justify-content:center;">
                            <i class="fas fa-book-open" style="color:var(--crimson);"></i>
                        </div>
                        <h2 style="font-size:18px;font-weight:700;color:var(--text);margin:0;">Study Reference</h2>
                    </div>
                    <div style="display:flex;flex-direction:column;gap:16px;">
                        @foreach($referenceMaterial as $item)
                        <div style="border-bottom:1px solid var(--border);padding-bottom:16px;{{ $loop->last ? 'border-bottom:none;padding-bottom:0;' : '' }}">
                            <p style="font-weight:600;color:var(--text);margin:0 0 8px;">{{ $item['question'] ?? '' }}</p>
                            @if(!empty($item['answers']))
                            <ul style="margin:0;padding-left:20px;font-size:13px;color:var(--text-muted);display:flex;flex-direction:column;gap:4px;">
                                @foreach($item['answers'] as $answer)
                                <li>{{ $answer }}</li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </x-student.dash-layout>
</x-filament-panels::page>
