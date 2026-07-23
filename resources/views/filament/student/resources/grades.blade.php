<x-filament-panels::page>
    @php
        $grades = \App\Models\Grade::where('user_id', auth()->id())->with('course')->get();
        $total = $grades->count();
        $averageTotal = $grades->whereNotNull('total_mark')->avg('total_mark');
        $highestGrade = $grades->whereNotNull('grade_letter')->sortByDesc('total_mark')->first()?->grade_letter ?? 'N/A';
        $countA = $grades->where('grade_letter', 'A')->count();
    @endphp
    <div id="dash" x-data="{
        search: new URLSearchParams(window.location.search).get('search') || '',
        mobileSidebar: false,
        items: {{ json_encode($grades->map(fn($g) => [
            'course' => $g->course->name ?? 'N/A',
            'code' => $g->course->code ?? '',
            'ca' => $g->ca_mark ?? 'N/A',
            'exam' => $g->exam_mark ?? 'N/A',
            'total' => $g->total_mark ?? 'N/A',
            'grade' => $g->grade_letter ?? '',
            'gradeColor' => match($g->grade_letter) { 'A','B' => '#16a34a', 'C' => '#f5a524', 'D' => '#ea580c', 'F' => '#dc2626', default => '#6b7280' },
        ])) }},
        get filtered() {
            if (!this.search) return this.items;
            const q = this.search.toLowerCase();
            return this.items.filter(i => i.course.toLowerCase().includes(q) || i.code.toLowerCase().includes(q) || i.grade.toLowerCase().includes(q));
        }
    }">
        <x-student.dash-layout title="My Grades & CA">
            <div class="dash-content">
                <div class="stats-row">
                    <div class="stat-card">
                        <div class="stat-icon" style="background:#091c3d15;color:#091c3d"><i class="fas fa-chart-bar"></i></div>
                        <div class="stat-info">
                            <div class="stat-value">{{ $total }}</div>
                            <div class="stat-label">Total Courses</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon" style="background:#16a34a15;color:#16a34a"><i class="fas fa-percentage"></i></div>
                        <div class="stat-info">
                            <div class="stat-value">{{ $averageTotal ? number_format($averageTotal, 1) : 'N/A' }}</div>
                            <div class="stat-label">Average Mark</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon" style="background:#f5a52415;color:#f5a524"><i class="fas fa-trophy"></i></div>
                        <div class="stat-info">
                            <div class="stat-value">{{ $highestGrade }}</div>
                            <div class="stat-label">Highest Grade</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon" style="background:#091c3d15;color:#091c3d"><i class="fas fa-star"></i></div>
                        <div class="stat-info">
                            <div class="stat-value">{{ $countA }}</div>
                            <div class="stat-label">Grade A</div>
                        </div>
                    </div>
                </div>
                <template x-if="filtered.length === 0 && search">
                    <div class="empty-state"><i class="fas fa-search"></i><h3>No matches</h3><p>No grades match "<span x-text="search"></span>"</p></div>
                </template>
                <template x-if="filtered.length === 0 && !search">
                    <div class="empty-state"><i class="fas fa-chart-bar"></i><h3>No Grades</h3><p>No grade records found yet.</p></div>
                </template>
                <template x-if="filtered.length > 0">
                    <div class="resource-list">
                        <template x-for="item in filtered" :key="item.code">
                            <div class="resource-item">
                                <div class="resource-item-icon" style="background:#091c3d15;color:#091c3d"><i class="fas fa-chart-bar"></i></div>
                                <div class="resource-item-body">
                                    <div class="resource-item-title" x-text="item.course"></div>
                                    <div class="resource-item-meta">
                                        <span x-text="item.code"></span>
                                        <span x-text="'CA: ' + item.ca"></span>
                                        <span x-text="'Exam: ' + item.exam"></span>
                                        <span><strong x-text="item.total"></strong></span>
                                        <template x-if="item.grade">
                                            <span class="resource-item-badge" :style="'background:' + item.gradeColor + '15;color:' + item.gradeColor" x-text="item.grade"></span>
                                        </template>
                                    </div>
                                </div>
                                <div class="resource-item-action">
                                    <a href="#">View Details</a>
                                </div>
                            </div>
                        </template>
                    </div>
                </template>
            </div>
        </x-student.dash-layout>
    </div>
</x-filament-panels::page>
