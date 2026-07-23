<x-filament-panels::page>
    @php
        $userId = auth()->id();
        $examPortalOpen = \App\Models\Setting::where('key', 'exam_portal_open')->value('value') === 'true';
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
    @php $examJson = $exams->map(fn($exam) => [
        'id' => $exam->id,
        'title' => $exam->title,
        'course' => $exam->course->name ?? 'General',
        'qcount' => $exam->questions_count,
        'duration' => $exam->duration_minutes,
        'maxAttempts' => $exam->max_attempts,
        'attemptCount' => $examAttempts->get($exam->id, collect())->count(),
        'bestScore' => ($best = $examAttempts->get($exam->id, collect())->sortByDesc('score')->first()) ? number_format($best->score, 1) : null,
        'passed' => $examAttempts->get($exam->id, collect())->where('passed', true)->isNotEmpty(),
    ])->values(); @endphp
    <div id="dash" x-data="{
        search: new URLSearchParams(window.location.search).get('search') || '',
        mobileSidebar: false,
        items: {{ $examJson }},
        get filtered() {
            if (!this.search) return this.items;
            const q = this.search.toLowerCase();
            return this.items.filter(e => e.title.toLowerCase().includes(q) || e.course.toLowerCase().includes(q));
        }
    }" x-init="items = {{ $examJson }}">
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

                    <template x-if="filtered.length === 0 && search">
                        <div class="empty-state"><i class="fas fa-search"></i><h3>No matches</h3><p>No exams match "<span x-text="search"></span>"</p></div>
                    </template>
                    @if(!$examPortalOpen)
                        <div class="empty-state"><i class="fas fa-door-closed"></i><h3>Exam Portal Closed</h3><p>The exam portal is currently closed. Please check back later when exams are open.</p></div>
                    @else
                    <template x-if="filtered.length === 0 && !search">
                        <div class="empty-state"><i class="fas fa-pencil-alt"></i><h3>No Exams Available</h3><p>There are no exams available for your enrolled courses yet. Check back later.</p></div>
                    </template>
                    @endif
                    <template x-if="filtered.length > 0">
                        <div class="resource-list">
                            <template x-for="exam in filtered" :key="exam.id">
                                <div class="resource-item">
                                    <div class="resource-item-icon" :style="'background:' + (exam.passed ? '#16a34a' : exam.attemptCount === 0 ? '#f5a524' : '#dc2626') + '15;color:' + (exam.passed ? '#16a34a' : exam.attemptCount === 0 ? '#f5a524' : '#dc2626')">
                                        <i class="fas" :class="exam.passed ? 'fa-check' : exam.attemptCount === 0 ? 'fa-play' : 'fa-rotate'"></i>
                                    </div>
                                    <div class="resource-item-body">
                                        <div class="resource-item-title" x-text="exam.title"></div>
                                        <div class="resource-item-meta">
                                            <span x-text="exam.course"></span>
                                            <span class="resource-item-badge" :style="'background:' + (exam.passed ? '#16a34a' : exam.attemptCount === 0 ? '#f5a524' : '#dc2626') + '15;color:' + (exam.passed ? '#16a34a' : exam.attemptCount === 0 ? '#f5a524' : '#dc2626')" x-text="exam.passed ? 'Passed' : exam.attemptCount === 0 ? 'Pending' : 'Failed'"></span>
                                            <span><i class="fas fa-question-circle"></i> <span x-text="exam.qcount + ' questions'"></span></span>
                                            <span><i class="fas fa-clock"></i> <span x-text="exam.duration + ' min'"></span></span>
                                            <template x-if="exam.bestScore">
                                                <span><i class="fas fa-star"></i> Score: <span x-text="exam.bestScore + '%'"></span></span>
                                            </template>
                                            <template x-if="exam.attemptCount > 0">
                                                <span x-text="'Attempts: ' + exam.attemptCount + '/' + exam.maxAttempts"></span>
                                            </template>
                                        </div>
                                    </div>
                                    <div class="resource-item-action">
                                        <template x-if="!exam.passed && exam.attemptCount < exam.maxAttempts">
                                            <a :href="'/student/exams/' + exam.id + '/start'"><i class="fas" :class="exam.attemptCount === 0 ? 'fa-play' : 'fa-rotate'" style="margin-right:4px;"></i> <span x-text="exam.attemptCount === 0 ? 'Start Exam' : 'Retry (' + (exam.maxAttempts - exam.attemptCount) + ' left)'"></span></a>
                                        </template>
                                        <template x-if="exam.passed">
                                            <span style="font-size:11px;font-weight:600;color:#16a34a;background:#16a34a10;padding:7px 14px;border-radius:8px;display:inline-flex;align-items:center;gap:4px;"><i class="fas fa-check"></i> Completed</span>
                                        </template>
                                        <template x-if="!exam.passed && exam.attemptCount >= exam.maxAttempts">
                                            <span style="font-size:11px;font-weight:600;color:#dc2626;background:#dc262610;padding:7px 14px;border-radius:8px;display:inline-flex;align-items:center;gap:4px;"><i class="fas fa-ban"></i> Max Attempts Reached</span>
                                        </template>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </template>
                </div>
            </div>
        </x-student.dash-layout>
    </div>
</x-filament-panels::page>
