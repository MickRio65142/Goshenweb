<x-filament-panels::page>
    @php
        $grades = \App\Models\Grade::where('user_id', auth()->id())->with('course')->get();
        $total = $grades->count();
        $averageTotal = $grades->whereNotNull('total_mark')->avg('total_mark');
        $highestGrade = $grades->whereNotNull('grade')->sortByDesc('total_mark')->first()?->grade ?? 'N/A';
        $countA = $grades->where('grade', 'A')->count();
    @endphp
    <div id="dash" x-data="{ search: '', mobileSidebar: false }">
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
                @if(count($grades))
                    <div class="resource-list">
                        @foreach($grades as $grade)
                            @php
                                $gradeColor = match($grade->grade) {
                                    'A', 'B' => '#16a34a',
                                    'C' => '#f5a524',
                                    'D' => '#ea580c',
                                    'F' => '#dc2626',
                                    default => '#6b7280'
                                };
                            @endphp
                            <div class="resource-item">
                                <div class="resource-item-icon" style="background:#091c3d15;color:#091c3d"><i class="fas fa-chart-bar"></i></div>
                                <div class="resource-item-body">
                                    <div class="resource-item-title">{{ $grade->course->name ?? 'N/A' }}</div>
                                    <div class="resource-item-meta">
                                        <span>{{ $grade->course->code ?? '' }}</span>
                                        <span>CA: {{ $grade->ca_mark ?? 'N/A' }}</span>
                                        <span>Exam: {{ $grade->exam_mark ?? 'N/A' }}</span>
                                        <span><strong>{{ $grade->total_mark ?? 'N/A' }}</strong></span>
                                        @if($grade->grade)
                                            <span class="resource-item-badge" style="background:{{ $gradeColor }}15;color:{{ $gradeColor }}">{{ $grade->grade }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="resource-item-action">
                                    <a href="#">View Details</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty-state"><i class="fas fa-chart-bar"></i><h3>No Grades</h3><p>No grade records found yet.</p></div>
                @endif
            </div>
        </x-student.dash-layout>
    </div>
</x-filament-panels::page>
