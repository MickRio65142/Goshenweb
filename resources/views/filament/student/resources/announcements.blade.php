<x-filament-panels::page>
    @php
        $announcements = \App\Models\Announcement::latest()->get();
        $total = $announcements->count();
        $critical = $announcements->where('priority', 'critical')->count();
        $high = $announcements->where('priority', 'high')->count();
        $normal = $announcements->where('priority', 'normal')->count();
    @endphp
    <div id="dash" x-data="{ search: '', mobileSidebar: false }">
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
                @if(count($announcements))
                    <div class="resource-list">
                        @foreach($announcements as $announcement)
                            @php
                                $priorityColor = match($announcement->priority) {
                                    'critical' => '#dc2626',
                                    'high' => '#f5a524',
                                    'normal' => '#16a34a',
                                    default => '#6b7280'
                                };
                            @endphp
                            <div class="resource-item">
                                <div class="resource-item-icon" style="background:#091c3d15;color:#091c3d"><i class="fas fa-bullhorn"></i></div>
                                <div class="resource-item-body">
                                    <div class="resource-item-title">{{ $announcement->title }}</div>
                                    <div class="resource-item-meta">
                                        <span>{{ Str::limit($announcement->content, 120) }}</span>
                                        <span class="resource-item-badge" style="background:{{ $priorityColor }}15;color:{{ $priorityColor }}">{{ ucfirst($announcement->priority) }}</span>
                                        <span>{{ $announcement->created_at->format('M d, Y') }}</span>
                                    </div>
                                </div>
                                <div class="resource-item-action">
                                    <a href="#">Read More</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty-state"><i class="fas fa-bullhorn"></i><h3>No Announcements</h3><p>No announcements have been posted yet.</p></div>
                @endif
            </div>
        </x-student.dash-layout>
    </div>
</x-filament-panels::page>
