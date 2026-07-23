<x-filament-panels::page>
    @php
        $announcements = \App\Models\Announcement::latest()->get();
        $total = $announcements->count();
        $critical = $announcements->where('priority', 'high')->count();
        $high = $announcements->where('priority', 'medium')->count();
        $normal = $announcements->where('priority', 'low')->count();
    @endphp
    <div id="dash" x-data="{
        search: new URLSearchParams(window.location.search).get('search') || '',
        mobileSidebar: false,
        items: {{ json_encode($announcements->map(fn($a) => [
            'title' => $a->title,
            'body' => Str::limit($a->content, 120),
            'priority' => $a->priority,
            'priorityColor' => match($a->priority) { 'high' => '#dc2626', 'medium' => '#f5a524', 'low' => '#16a34a', default => '#6b7280' },
            'date' => $a->created_at->format('M d, Y'),
        ])) }},
        get filtered() {
            if (!this.search) return this.items;
            const q = this.search.toLowerCase();
            return this.items.filter(i => i.title.toLowerCase().includes(q) || i.body.toLowerCase().includes(q) || i.priority.toLowerCase().includes(q));
        }
    }">
        <x-student.dash-layout title="Announcements">
            <div class="dash-content">
                <div class="stats-row">
                    <div class="stat-card">
                        <div class="stat-icon" style="background:#091c3d15;color:#091c3d"><i class="fas fa-bullhorn"></i></div>
                        <div class="stat-info">
                            <div class="stat-value">{{ $total }}</div>
                            <div class="stat-label">Total Announcements</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon" style="background:#dc262615;color:#dc2626"><i class="fas fa-exclamation-triangle"></i></div>
                        <div class="stat-info">
                            <div class="stat-value">{{ $critical }}</div>
                            <div class="stat-label">Critical</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon" style="background:#f5a52415;color:#f5a524"><i class="fas fa-exclamation-circle"></i></div>
                        <div class="stat-info">
                            <div class="stat-value">{{ $high }}</div>
                            <div class="stat-label">High Priority</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon" style="background:#16a34a15;color:#16a34a"><i class="fas fa-info-circle"></i></div>
                        <div class="stat-info">
                            <div class="stat-value">{{ $normal }}</div>
                            <div class="stat-label">Normal</div>
                        </div>
                    </div>
                </div>
                <template x-if="filtered.length === 0 && search">
                    <div class="empty-state"><i class="fas fa-search"></i><h3>No matches</h3><p>No announcements match "<span x-text="search"></span>"</p></div>
                </template>
                <template x-if="filtered.length === 0 && !search">
                    <div class="empty-state"><i class="fas fa-bullhorn"></i><h3>No Announcements</h3><p>No announcements have been posted yet.</p></div>
                </template>
                <template x-if="filtered.length > 0">
                    <div class="resource-list">
                        <template x-for="item in filtered" :key="item.title">
                            <div class="resource-item">
                                <div class="resource-item-icon" style="background:#091c3d15;color:#091c3d"><i class="fas fa-bullhorn"></i></div>
                                <div class="resource-item-body">
                                    <div class="resource-item-title" x-text="item.title"></div>
                                    <div class="resource-item-meta">
                                        <span x-text="item.body"></span>
                                        <span class="resource-item-badge" :style="'background:' + item.priorityColor + '15;color:' + item.priorityColor" x-text="item.priority.charAt(0).toUpperCase() + item.priority.slice(1)"></span>
                                        <span x-text="item.date"></span>
                                    </div>
                                </div>
                                <div class="resource-item-action">
                                    <a href="#">Read More</a>
                                </div>
                            </div>
                        </template>
                    </div>
                </template>
            </div>
        </x-student.dash-layout>
    </div>
</x-filament-panels::page>
