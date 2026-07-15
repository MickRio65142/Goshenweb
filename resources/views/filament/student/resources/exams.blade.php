<x-filament-panels::page>
    @php
        $userId = auth()->id();
        $enrolledCourseIds = \App\Models\Enrollment::where('user_id', $userId)->pluck('course_id');

        $exams = \App\Models\Exam::whereIn('course_id', $enrolledCourseIds)
            ->where('is_active', true)
            ->withCount('questions')
            ->with('course')
            ->get();

        $examIds = $exams->pluck('id');

        $examAttempts = \App\Models\ExamAttempt::where('user_id', $userId)
            ->whereIn('exam_id', $examIds)
            ->get()
            ->groupBy('exam_id');

        $totalExams = $exams->count();
        $attempted = $examAttempts->count();
        $passed = \App\Models\ExamAttempt::where('user_id', $userId)
            ->whereIn('exam_id', $examIds)
            ->where('passed', true)
            ->distinct('exam_id')
            ->count('exam_id');
        $pending = $totalExams - $attempted;
    @endphp
    <div id="dash" x-data="{ search: '', mobileSidebar: false }">
        <x-student.dash-layout title="My Exams">
            <div class="dash-content">
                <div wire:poll.30s>
                    <div class="stats-row">
                        <div class="stat-card">
                            <div class="stat-icon" style="background:#091c3d15;color:#091c3d"><i class="fas fa-pencil-alt"></i></div>
                            <div class="stat-info">
                                <div class="stat-value">{{ $totalExams }}</div>
                                <div class="stat-label">Available Exams</div>
                            </div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-icon" style="background:#f5a52415;color:#f5a524"><i class="fas fa-hourglass-half"></i></div>
                            <div class="stat-info">
                                <div class="stat-value">{{ $pending }}</div>
                                <div class="stat-label">Pending</div>
                            </div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-icon" style="background:#7c3aed15;color:#7c3aed"><i class="fas fa-check-circle"></i></div>
                            <div class="stat-info">
                                <div class="stat-value">{{ $attempted }}</div>
                                <div class="stat-label">Attempted</div>
                            </div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-icon" style="background:#16a34a15;color:#16a34a"><i class="fas fa-trophy"></i></div>
                            <div class="stat-info">
                                <div class="stat-value">{{ $passed }}</div>
                                <div class="stat-label">Passed</div>
                            </div>
                        </div>
                    </div>

                    @if($exams->count())
                        <div class="resource-list">
                            @foreach($exams as $exam)
                                @php
                                    $attempts = $examAttempts->get($exam->id, collect());
                                    $bestAttempt = $attempts->sortByDesc('score')->first();
                                    $attemptCount = $attempts->count();
                                    $maxReached = $attemptCount >= $exam->max_attempts;
                                    $examPassed = $attempts->where('passed', true)->isNotEmpty();

                                    if (!$attemptCount) {
                                        $status = 'pending';
                                        $statusColor = '#f5a524';
                                        $actionLabel = 'Start Exam';
                                        $actionRoute = url("/student/exams/{$exam->id}/start");
                                        $actionIcon = 'fa-play';
                                    } elseif ($examPassed) {
                                        $status = 'passed';
                                        $statusColor = '#16a34a';
                                        $actionLabel = 'Completed';
                                        $actionRoute = null;
                                        $actionIcon = 'fa-check';
                                    } elseif ($maxReached) {
                                        $status = 'max attempts';
                                        $statusColor = '#dc2626';
                                        $actionLabel = 'Max Attempts Reached';
                                        $actionRoute = null;
                                        $actionIcon = 'fa-ban';
                                    } else {
                                        $status = 'failed';
                                        $statusColor = '#dc2626';
                                        $remaining = $exam->max_attempts - $attemptCount;
                                        $actionLabel = "Retry ({$remaining} left)";
                                        $actionRoute = url("/student/exams/{$exam->id}/start");
                                        $actionIcon = 'fa-rotate';
                                    }
                                @endphp
                                <div class="resource-item">
                                    <div class="resource-item-icon" style="background:{{ $statusColor }}15;color:{{ $statusColor }}"><i class="fas {{ $actionIcon }}"></i></div>
                                    <div class="resource-item-body">
                                        <div class="resource-item-title">{{ $exam->title }}</div>
                                        <div class="resource-item-meta">
                                            <span>{{ $exam->course->name ?? 'General' }}</span>
                                            <span class="resource-item-badge" style="background:{{ $statusColor }}15;color:{{ $statusColor }}">{{ ucfirst($status) }}</span>
                                            <span><i class="fas fa-question-circle"></i> {{ $exam->questions_count }} questions</span>
                                            <span><i class="fas fa-clock"></i> {{ $exam->duration_minutes }} min</span>
                                            @if($bestAttempt)
                                                <span><i class="fas fa-star"></i> Score: {{ number_format($bestAttempt->score, 1) }}%</span>
                                            @endif
                                            @if($attemptCount > 0)
                                                <span>Attempts: {{ $attemptCount }}/{{ $exam->max_attempts }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="resource-item-action">
                                        @if($actionRoute)
                                            <a href="{{ $actionRoute }}"><i class="fas {{ $actionIcon }}" style="margin-right:4px;"></i> {{ $actionLabel }}</a>
                                        @else
                                            <span style="font-size:11px;font-weight:600;color:{{ $statusColor }};background:{{ $statusColor }}10;padding:7px 14px;border-radius:8px;display:inline-flex;align-items:center;gap:4px;"><i class="fas {{ $actionIcon }}"></i> {{ $actionLabel }}</span>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="empty-state">
                            <i class="fas fa-pencil-alt"></i>
                            <h3>No Exams Available</h3>
                            <p>There are no exams available for your enrolled courses yet. Check back later.</p>
                        </div>
                    @endif
                </div>
            </div>
        </x-student.dash-layout>
    </div>
</x-filament-panels::page>
