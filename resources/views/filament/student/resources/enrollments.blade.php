<x-filament-panels::page>
    @php
        $enrollments = \App\Models\Enrollment::where('user_id', auth()->id())->with('course')->get();
        $total = $enrollments->count();
        $active = $enrollments->where('status', 'active')->count();
        $completed = $enrollments->where('status', 'completed')->count();
        $suspended = $enrollments->where('status', 'suspended')->count();
    @endphp
    <div id="dash" x-data="{
        search: new URLSearchParams(window.location.search).get('search') || '',
        mobileSidebar: false,
        items: {{ json_encode($enrollments->map(fn($e) => [
            'name' => $e->course->name ?? 'N/A',
            'code' => $e->course->code ?? '',
            'status' => $e->status,
            'statusColor' => match($e->status) { 'active' => '#16a34a', 'completed' => '#091c3d', 'suspended' => '#dc2626', default => '#091c3d' },
            'date' => $e->enrolled_date ? $e->enrolled_date->format('M d, Y') : 'N/A',
            'progress' => $e->progress ?? '0',
        ])) }},
        get filtered() {
            if (!this.search) return this.items;
            const q = this.search.toLowerCase();
            return this.items.filter(i => i.name.toLowerCase().includes(q) || i.code.toLowerCase().includes(q) || i.status.toLowerCase().includes(q));
        }
    }">
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
                <template x-if="filtered.length === 0 && search">
                    <div class="empty-state"><i class="fas fa-search"></i><h3>No matches</h3><p>No courses match "<span x-text="search"></span>"</p></div>
                </template>
                <template x-if="filtered.length === 0 && !search">
                    <div class="empty-state"><i class="fas fa-book-open"></i><h3>No Enrollments</h3><p>You are not enrolled in any courses yet.</p></div>
                </template>
                <template x-if="filtered.length > 0">
                    <div class="resource-list">
                        <template x-for="item in filtered" :key="item.code">
                            <div class="resource-item">
                                <div class="resource-item-icon" style="background:#091c3d15;color:#091c3d"><i class="fas fa-book-open"></i></div>
                                <div class="resource-item-body">
                                    <div class="resource-item-title" x-text="item.name"></div>
                                    <div class="resource-item-meta">
                                        <span x-text="item.code"></span>
                                        <span class="resource-item-badge" :style="'background:' + item.statusColor + '15;color:' + item.statusColor" x-text="item.status.charAt(0).toUpperCase() + item.status.slice(1)"></span>
                                        <span x-text="item.date"></span>
                                        <span x-text="item.progress + '%'"></span>
                                    </div>
                                </div>
                                <div class="resource-item-action">
                                    <a href="#">View Course</a>
                                </div>
                            </div>
                        </template>
                    </div>
                </template>
            </div>
        </x-student.dash-layout>
    </div>
</x-filament-panels::page>
