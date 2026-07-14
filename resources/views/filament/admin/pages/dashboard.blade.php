<x-filament-panels::page>
    @php
        $stats = $this->getStats();
        $quickActions = $this->getQuickActions();
        $recentEnrollments = $this->getRecentEnrollments();
        $pendingDocuments = $this->getPendingDocuments();
        $todayEvents = $this->getTodayEvents();
        $todayClasses = $this->getTodayClasses();
        $recentGrades = $this->getRecentGrades();
        $adminName = $this->getAdminName();
        $adminAvatar = $this->getAdminAvatar();
    @endphp

    <style>
        .admin-hero { background: var(--bg-card); border: 1px solid var(--border); border-radius: var(--radius-lg); padding: 24px; margin-bottom: 24px; display: flex; align-items: center; justify-content: space-between; gap: 24px; flex-wrap: wrap; }
        .admin-hero-text h1 { font-size: 22px; font-weight: 700; color: var(--text); margin: 0 0 4px; }
        .admin-hero-text p { font-size: 14px; color: var(--text-muted); margin: 0; }
        .action-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; margin-bottom: 24px; }
        @media (min-width: 768px) { .action-grid { grid-template-columns: repeat(4, 1fr); } }
        .action-card { background: var(--bg-card); border: 1px solid var(--border); border-radius: var(--radius-md); padding: 20px; text-decoration: none; display: block; transition: all .2s; }
        .action-card:hover { border-color: var(--accent); box-shadow: var(--shadow-md); transform: translateY(-2px); }
        .action-icon { width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 12px; font-size: 18px; }
        .action-label { font-size: 13px; font-weight: 600; color: var(--text); margin: 0 0 4px; }
        .action-desc { font-size: 12px; color: var(--text-muted); margin: 0; }
        .admin-two-col { display: grid; grid-template-columns: 1fr; gap: 24px; }
        @media (min-width: 1024px) { .admin-two-col { grid-template-columns: 1fr 1fr; } }
        .info-bar { display: flex; flex-wrap: wrap; gap: 12px; margin-bottom: 24px; }
        .info-card { background: var(--bg-card); border: 1px solid var(--border); border-radius: var(--radius-md); padding: 14px 20px; display: flex; align-items: center; gap: 14px; flex: 1; min-width: 200px; transition: all .2s; }
        .info-card:hover { border-color: var(--accent); box-shadow: var(--shadow-sm); }
        .info-icon { width: 40px; height: 40px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 16px; flex-shrink: 0; }
        .info-value { font-size: 16px; font-weight: 700; color: var(--text); line-height: 1.2; }
        .info-label { font-size: 11px; color: var(--text-muted); margin-top: 1px; }
    </style>

    <div id="dash" x-data="{ mobileSidebar: false }">
        <x-admin.dash-layout title="Dashboard">
            <div class="dash-content">
                <!-- Hero Section -->
                <section class="admin-hero" aria-labelledby="admin-hero-title">
                    <div class="admin-hero-text">
                        <h1 id="admin-hero-title">Welcome back, {{ $adminName }}</h1>
                        <p>Goshen Admin Portal — Manage your institution from one place</p>
                    </div>
                    <img src="{{ $adminAvatar }}" alt="{{ $adminName }}" style="width: 48px; height: 48px; border-radius: 50%; border: 2px solid var(--border); object-fit: cover;">
                </section>

                <!-- Stats Row -->
                <div class="stats-row">
                    @foreach($stats as $stat)
                        <div class="stat-card">
                            <div class="stat-icon" style="background: {{ $stat['color'] }}15; color: {{ $stat['color'] }}">
                                <i class="fas {{ $stat['icon'] }}"></i>
                            </div>
                            <div class="stat-info">
                                <div class="stat-value">{{ $stat['value'] }}</div>
                                <div class="stat-label">{{ $stat['label'] }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Info Bar (Today's stats) -->
                <div class="info-bar">
                    <div class="info-card">
                        <div class="info-icon" style="background:#c1121f15;color:#c1121f"><i class="fas fa-calendar-day"></i></div>
                        <div>
                            <div class="info-value">{{ $todayClasses->count() + $todayEvents->count() }}</div>
                            <div class="info-label">Today's Activities</div>
                        </div>
                    </div>
                    <div class="info-card">
                        <div class="info-icon" style="background:#16a34a15;color:#16a34a"><i class="fas fa-chart-line"></i></div>
                        <div>
                            <div class="info-value">{{ $recentGrades->count() }}</div>
                            <div class="info-label">Recent Grade Entries</div>
                        </div>
                    </div>
                    <div class="info-card">
                        <div class="info-icon" style="background:#f5a52415;color:#f5a524"><i class="fas fa-bullhorn"></i></div>
                        <div>
                            <div class="info-value">{{ \App\Models\Announcement::whereDate('created_at', today())->count() }}</div>
                            <div class="info-label">Announcements Today</div>
                        </div>
                    </div>
                </div>

                <!-- Quick Action Cards -->
                <section aria-labelledby="actions-title">
                    <div class="section-header">
                        <h2 id="actions-title" class="section-title">Quick Actions</h2>
                    </div>
                    <div class="action-grid" role="list">
                        @foreach($quickActions as $action)
                            <a href="{{ $action['route'] }}" class="action-card" role="listitem">
                                <div class="action-icon" style="background: {{ $action['color'] }}15; color: {{ $action['color'] }}">
                                    <i class="fas {{ $action['icon'] }}"></i>
                                </div>
                                <p class="action-label">{{ $action['label'] }}</p>
                                <p class="action-desc">{{ $action['desc'] }}</p>
                            </a>
                        @endforeach
                    </div>
                </section>

                <!-- Two Column Layout -->
                <div class="admin-two-col">
                    <!-- Left: Recent Enrollments -->
                    <div class="dash-section-card">
                        <section wire:poll.30s>
                            <div class="section-header">
                                <h2 class="section-title">Recent Enrollments</h2>
                                <a href="{{ url('/admin/enrollments') }}" class="section-link">View all &rarr;</a>
                            </div>
                            @if($recentEnrollments->count())
                                <div class="resource-list">
                                    @foreach($recentEnrollments as $enrollment)
                                        <div class="resource-item" style="padding: 12px 14px;">
                                            <div class="resource-item-icon" style="width: 36px; height: 36px; font-size: 14px; background:#091c3d15;color:#091c3d"><i class="fas fa-user-graduate"></i></div>
                                            <div class="resource-item-body">
                                                <div class="resource-item-title" style="font-size: 13px;">{{ $enrollment->user->name ?? 'N/A' }}</div>
                                                <div class="resource-item-meta" style="font-size: 11px;">
                                                    <span>{{ $enrollment->course->title ?? 'N/A' }}</span>
                                                    <span class="resource-item-badge" style="background: {{ match($enrollment->status) { 'active' => '#16a34a', 'completed' => '#091c3d', default => '#f5a524' } }}15; color: {{ match($enrollment->status) { 'active' => '#16a34a', 'completed' => '#091c3d', default => '#f5a524' } }};">
                                                        {{ ucfirst($enrollment->status) }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="resource-item-action">
                                                <a href="{{ url('/admin/enrollments/' . $enrollment->id . '/edit') }}">View</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="empty-state"><i class="fas fa-user-graduate"></i><h3>No enrollments yet</h3></div>
                            @endif
                        </section>
                    </div>

                    <!-- Right: Pending Documents -->
                    <div class="dash-section-card">
                        <section wire:poll.30s>
                            <div class="section-header">
                                <h2 class="section-title">Pending Documents</h2>
                                <a href="{{ url('/admin/student-documents') }}" class="section-link">View all &rarr;</a>
                            </div>
                            @if($pendingDocuments->count())
                                <div class="resource-list">
                                    @foreach($pendingDocuments as $doc)
                                        <div class="resource-item" style="padding: 12px 14px;">
                                            <div class="resource-item-icon" style="width: 36px; height: 36px; font-size: 14px; background:#c1121f15;color:#c1121f"><i class="fas fa-file"></i></div>
                                            <div class="resource-item-body">
                                                <div class="resource-item-title" style="font-size: 13px;">{{ $doc->user->name ?? 'N/A' }}</div>
                                                <div class="resource-item-meta" style="font-size: 11px;">
                                                    <span>{{ $doc->document_name ?? 'Document' }}</span>
                                                    <span>{{ $doc->created_at->format('M d, Y') }}</span>
                                                </div>
                                            </div>
                                            <div class="resource-item-action">
                                                <a href="{{ url('/admin/student-documents/' . $doc->id . '/edit') }}">Review</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="empty-state"><i class="fas fa-file"></i><h3>No pending documents</h3></div>
                            @endif
                        </section>
                    </div>
                </div>

                <!-- Bottom Section: Today's Schedule + Recent Grades -->
                <div class="admin-two-col" style="margin-top: 24px;">
                    <!-- Today's Schedule -->
                    <div class="dash-section-card">
                        <section wire:poll.30s>
                            <div class="section-header">
                                <h2 class="section-title">Today's Schedule</h2>
                            </div>
                            @if($todayClasses->count() > 0 || $todayEvents->count() > 0)
                                <div style="display: flex; flex-direction: column; gap: 8px;">
                                    @foreach($todayClasses as $tc)
                                        <div style="background: var(--bg-card); border: 1px solid var(--border); border-radius: var(--radius-md); padding: 12px 16px; display: flex; align-items: center; gap: 12px;">
                                            <div style="width: 36px; height: 36px; border-radius: 10px; background: var(--crimson-light); color: var(--crimson); display: flex; align-items: center; justify-content: center; font-size: 14px; flex-shrink: 0;"><i class="fas fa-video"></i></div>
                                            <div style="flex: 1; min-width: 0;">
                                                <div style="font-size: 13px; font-weight: 600; color: var(--text);">{{ $tc->course->name }} · {{ $tc->scheduled_at->format('g:i A') }}</div>
                                                <div style="font-size: 11px; color: var(--text-muted);">{{ $tc->platform }}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @foreach($todayEvents as $te)
                                        <div style="background: var(--bg-card); border: 1px solid var(--border); border-radius: var(--radius-md); padding: 12px 16px; display: flex; align-items: center; gap: 12px;">
                                            <div style="width: 36px; height: 36px; border-radius: 10px; background: #091c3d15; color: #091c3d; display: flex; align-items: center; justify-content: center; font-size: 14px; flex-shrink: 0;"><i class="fas {{ $te->event_type === 'exam' ? 'fa-pencil-alt' : 'fa-calendar-check' }}"></i></div>
                                            <div style="flex: 1; min-width: 0;">
                                                <div style="font-size: 13px; font-weight: 600; color: var(--text);">{{ $te->title }}</div>
                                                <div style="font-size: 11px; color: var(--text-muted);">{{ $te->event_date->format('g:i A') }} · {{ ucfirst($te->event_type) }}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="empty-state"><i class="fas fa-calendar-day"></i><h3>No activities today</h3><p>Schedule a live class or event to get started.</p></div>
                            @endif
                        </section>
                    </div>

                    <!-- Recent Grades -->
                    <div class="dash-section-card">
                        <section wire:poll.30s>
                            <div class="section-header">
                                <h2 class="section-title">Recent Grade Entries</h2>
                                <a href="{{ url('/admin/grades') }}" class="section-link">View all &rarr;</a>
                            </div>
                            @if($recentGrades->count())
                                <div class="resource-list">
                                    @foreach($recentGrades as $grade)
                                        <div class="resource-item" style="padding: 12px 14px;">
                                            <div class="resource-item-icon" style="width: 36px; height: 36px; font-size: 14px; background:#16a34a15;color:#16a34a"><i class="fas fa-chart-bar"></i></div>
                                            <div class="resource-item-body">
                                                <div class="resource-item-title" style="font-size: 13px;">{{ $grade->user->name ?? 'N/A' }}</div>
                                                <div class="resource-item-meta" style="font-size: 11px;">
                                                    <span>{{ $grade->course->title ?? 'N/A' }}</span>
                                                    <span><strong>CA:</strong> {{ $grade->ca_mark ?? 'N/A' }}</span>
                                                    <span><strong>Exam:</strong> {{ $grade->exam_mark ?? 'N/A' }}</span>
                                                    <span><strong>Total:</strong> {{ $grade->total_mark ?? 'N/A' }}</span>
                                                    <span class="resource-item-badge" style="background: {{ match($grade->grade_letter) { 'A', 'B' => '#16a34a', 'C' => '#f5a524', 'F' => '#c1121f', default => '#64748b' } }}15; color: {{ match($grade->grade_letter) { 'A', 'B' => '#16a34a', 'C' => '#f5a524', 'F' => '#c1121f', default => '#64748b' } }};">
                                                        {{ $grade->grade_letter ?? '-' }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="empty-state"><i class="fas fa-chart-bar"></i><h3>No grades entered yet</h3></div>
                            @endif
                        </section>
                    </div>
                </div>
            </div>
        </x-admin.dash-layout>
    </div>
</x-filament-panels::page>
