<x-filament-panels::page>
    @php
        $events = \App\Models\Event::orderBy('event_date')->get();
        $total = $events->count();
        $upcoming = $events->where('event_date', '>=', now())->count();
        $todayEvents = $events->filter(fn($e) => $e->event_date->isToday())->count();
        $past = $events->where('event_date', '<', now())->count();
    @endphp
    <div id="dash" x-data="{ search: '', mobileSidebar: false }">
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
                @if(count($events))
                    <div class="resource-list">
                        @foreach($events as $event)
                            @php
                                $typeColor = match($event->event_type) {
                                    'exam' => '#dc2626',
                                    'academic' => '#091c3d',
                                    'workshop' => '#16a34a',
                                    'holiday' => '#f5a524',
                                    'graduation' => '#7c3aed',
                                    default => '#6b7280'
                                };
                            @endphp
                            <div class="resource-item">
                                <div class="resource-item-icon" style="background:#091c3d15;color:#091c3d"><i class="fas fa-calendar-alt"></i></div>
                                <div class="resource-item-body">
                                    <div class="resource-item-title">{{ $event->title }}</div>
                                    <div class="resource-item-meta">
                                        <span>{{ $event->event_date->format('M d, Y - g:i A') }}</span>
                                        <span class="resource-item-badge" style="background:{{ $typeColor }}15;color:{{ $typeColor }}">{{ ucfirst($event->event_type) }}</span>
                                        <span>{{ $event->location ?? 'N/A' }}</span>
                                    </div>
                                </div>
                                <div class="resource-item-action">
                                    <a href="#">View Event</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty-state"><i class="fas fa-calendar-alt"></i><h3>No Events</h3><p>No events have been scheduled yet.</p></div>
                @endif
            </div>
        </x-student.dash-layout>
    </div>
</x-filament-panels::page>
