<x-filament-panels::page>
    @php
        $enrollments = \App\Models\Enrollment::where('user_id', auth()->id())->with('course')->get();
        $total = $enrollments->count();
        $active = $enrollments->where('status', 'active')->count();
        $completed = $enrollments->where('status', 'completed')->count();
        $suspended = $enrollments->where('status', 'suspended')->count();
    @endphp
    <div id="dash" x-data="{ search: '', mobileSidebar: false }">
        <x-student.dash-layout title="My Courses">
            <div class="dash-content">
                <div class="stats-row">
                    <div class="stat-card">
                        <div class="stat-icon" style="background:#091c3d15;color:#091c3d"><i class="fas fa-graduation-cap"></i></div>
                        <div class="stat-info">
                            <div class="stat-value">{{ $total }}</div>
                            <div class="stat-label">Total Enrollments</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon" style="background:#16a34a15;color:#16a34a"><i class="fas fa-play"></i></div>
                        <div class="stat-info">
                            <div class="stat-value">{{ $active }}</div>
                            <div class="stat-label">Active</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon" style="background:#091c3d15;color:#091c3d"><i class="fas fa-check-circle"></i></div>
                        <div class="stat-info">
                            <div class="stat-value">{{ $completed }}</div>
                            <div class="stat-label">Completed</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon" style="background:#dc262615;color:#dc2626"><i class="fas fa-pause-circle"></i></div>
                        <div class="stat-info">
                            <div class="stat-value">{{ $suspended }}</div>
                            <div class="stat-label">Suspended</div>
                        </div>
                    </div>
                </div>
                @if(count($enrollments))
                    <div class="resource-list">
                        @foreach($enrollments as $enrollment)
                            @php
                                $statusColor = match($enrollment->status) {
                                    'active' => '#16a34a',
                                    'completed' => '#091c3d',
                                    'suspended' => '#dc2626',
                                    default => '#091c3d'
                                };
                            @endphp
                            <div class="resource-item">
                                <div class="resource-item-icon" style="background:#091c3d15;color:#091c3d"><i class="fas fa-book-open"></i></div>
                                <div class="resource-item-body">
                                    <div class="resource-item-title">{{ $enrollment->course->name ?? 'N/A' }}</div>
                                    <div class="resource-item-meta">
                                        <span>{{ $enrollment->course->code ?? '' }}</span>
                                        <span class="resource-item-badge" style="background:{{ $statusColor }}15;color:{{ $statusColor }}">{{ ucfirst($enrollment->status) }}</span>
                                        <span>{{ $enrollment->enrolled_date ? $enrollment->enrolled_date->format('M d, Y') : 'N/A' }}</span>
                                        <span>{{ $enrollment->progress ?? '0' }}%</span>
                                    </div>
                                </div>
                                <div class="resource-item-action">
                                    <a href="#">View Course</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty-state"><i class="fas fa-book-open"></i><h3>No Enrollments</h3><p>You are not enrolled in any courses yet.</p></div>
                @endif
            </div>
        </x-student.dash-layout>
    </div>
</x-filament-panels::page>
