<x-filament-panels::page>
    @php
        $events = \App\Models\Event::orderBy('event_date')->get();
        $total = $events->count();
        $upcoming = $events->where('event_date', '>=', now())->count();
        $todayEvents = $events->filter(fn($e) => $e->event_date->isToday())->count();
        $past = $events->where('event_date', '<', now())->count();
    @endphp
    <div id="dash" x-data="{
        search: new URLSearchParams(window.location.search).get('search') || '',
        mobileSidebar: false,
        items: {{ json_encode($events->map(fn($e) => [
            'title' => $e->title,
            'date' => $e->event_date->format('M d, Y - g:i A'),
            'type' => $e->event_type,
            'typeColor' => match($e->event_type) { 'exam' => '#dc2626', 'academic' => '#091c3d', 'workshop' => '#16a34a', 'holiday' => '#f5a524', 'graduation' => '#7c3aed', default => '#6b7280' },
            'location' => $e->location ?? 'N/A',
        ])) }},
        get filtered() {
            if (!this.search) return this.items;
            const q = this.search.toLowerCase();
            return this.items.filter(i => i.title.toLowerCase().includes(q) || i.type.toLowerCase().includes(q) || i.location.toLowerCase().includes(q));
        }
    }">
        <x-student.dash-layout title="Event Log">
            <div class="dash-content">
                <div class="stats-row">
                    <div class="stat-card">
                        <div class="stat-icon" style="background:#091c3d15;color:#091c3d"><i class="fas fa-list"></i></div>
                        <div class="stat-info">
                            <div class="stat-value">{{ $total }}</div>
                            <div class="stat-label">Total Events</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon" style="background:#16a34a15;color:#16a34a"><i class="fas fa-clock"></i></div>
                        <div class="stat-info">
                            <div class="stat-value">{{ $upcoming }}</div>
                            <div class="stat-label">Upcoming</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon" style="background:#f5a52415;color:#f5a524"><i class="fas fa-calendar-day"></i></div>
                        <div class="stat-info">
                            <div class="stat-value">{{ $todayEvents }}</div>
                            <div class="stat-label">Today</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon" style="background:#6b728015;color:#6b7280"><i class="fas fa-history"></i></div>
                        <div class="stat-info">
                            <div class="stat-value">{{ $past }}</div>
                            <div class="stat-label">Past</div>
                        </div>
                    </div>
                </div>
                <template x-if="filtered.length === 0 && search">
                    <div class="empty-state"><i class="fas fa-search"></i><h3>No matches</h3><p>No events match "<span x-text="search"></span>"</p></div>
                </template>
                <template x-if="filtered.length === 0 && !search">
                    <div class="empty-state"><i class="fas fa-calendar-alt"></i><h3>No Events</h3><p>No events have been scheduled yet.</p></div>
                </template>
                <template x-if="filtered.length > 0">
                    <div class="resource-list">
                        <template x-for="item in filtered" :key="item.title + item.date">
                            <div class="resource-item">
                                <div class="resource-item-icon" style="background:#091c3d15;color:#091c3d"><i class="fas fa-calendar-alt"></i></div>
                                <div class="resource-item-body">
                                    <div class="resource-item-title" x-text="item.title"></div>
                                    <div class="resource-item-meta">
                                        <span x-text="item.date"></span>
                                        <span class="resource-item-badge" :style="'background:' + item.typeColor + '15;color:' + item.typeColor" x-text="item.type.charAt(0).toUpperCase() + item.type.slice(1)"></span>
                                        <span x-text="item.location"></span>
                                    </div>
                                </div>
                                <div class="resource-item-action">
                                    <a href="#">View Event</a>
                                </div>
                            </div>
                        </template>
                    </div>
                </template>
            </div>
        </x-student.dash-layout>
    </div>
</x-filament-panels::page>
