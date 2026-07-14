<x-filament-panels::page>
    @php
        $classes = \App\Models\LiveClass::whereHas('course.enrollments', fn($q) => $q->where('user_id', auth()->id()))->with('course')->orderBy('scheduled_at')->get();
        $now = now();
        $upcomingCount = $classes->where('scheduled_at', '>', $now)->count();
        $todayCount = $classes->filter(fn($c) => $c->scheduled_at->isToday())->count();
        $pastCount = $classes->where('scheduled_at', '<', $now)->count();
        $platformColors = [
            'Zoom' => '#1e3a5f',
            'Google Meet' => '#16a34a',
            'WhatsApp' => '#f5a524',
            'On-Campus' => '#6b7280',
        ];
    @endphp
    <div id="dash" x-data="{ search: '', mobileSidebar: false }">
        <x-student.dash-layout title="Live Classes">
            <div class="dash-content">
                <div class="stats-row">
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fa-solid fa-video"></i></div>
                        <div class="stat-info">
                            <div class="stat-value">{{ $classes->count() }}</div>
                            <div class="stat-label">Total</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fa-solid fa-calendar-day"></i></div>
                        <div class="stat-info">
                            <div class="stat-value">{{ $todayCount }}</div>
                            <div class="stat-label">Today</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fa-solid fa-clock"></i></div>
                        <div class="stat-info">
                            <div class="stat-value">{{ $upcomingCount }}</div>
                            <div class="stat-label">Upcoming</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fa-solid fa-history"></i></div>
                        <div class="stat-info">
                            <div class="stat-value">{{ $pastCount }}</div>
                            <div class="stat-label">Past</div>
                        </div>
                    </div>
                </div>
                @if(count($classes))
                    <div class="resource-list">
                        @foreach($classes as $item)
                            @php
                                $platformColor = $platformColors[$item->platform] ?? '#6b7280';
                            @endphp
                            <div class="resource-item">
                                <div class="resource-item-icon">
                                    <i class="fa-solid fa-video"></i>
                                </div>
                                <div class="resource-item-body">
                                    <div class="resource-item-title">{{ $item->course->name ?? 'N/A' }}</div>
                                    <div class="resource-item-meta">
                                        {{ $item->scheduled_at->format('M d, Y g:i A') }} &middot; {{ $item->scheduled_at->diffForHumans() }}
                                    </div>
                                </div>
                                <div class="resource-item-badge" style="background: {{ $platformColor }};">
                                    {{ $item->platform }}
                                </div>
                                <div class="resource-item-action">
                                    @if($item->join_url)
                                        <a href="{{ $item->join_url }}" target="_blank" style="display: inline-flex; align-items: center; gap: 0.375rem; padding: 0.5rem 1rem; background: #2563eb; color: #fff; border-radius: 0.375rem; text-decoration: none; font-size: 0.875rem;">
                                            <i class="fa-solid fa-arrow-up-right-from-square"></i> Join
                                        </a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty-state">
                        <i class="fa-solid fa-video" style="font-size: 3rem; color: #9ca3af; margin-bottom: 1rem;"></i>
                        <p>No live classes scheduled</p>
                    </div>
                @endif
            </div>
        </x-student.dash-layout>
    </div>
</x-filament-panels::page>
