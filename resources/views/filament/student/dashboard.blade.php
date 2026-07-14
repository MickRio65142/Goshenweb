<x-filament-panels::page>
    @php
        $stats = $this->getStats();
        $userName = $this->getStudentName();
        $userAvatar = $this->getUserAvatar();
        $userProgram = $this->getStudentProgram();
        $liveClasses = $this->getLiveClasses();
        $announcements = $this->getAnnouncements();
        $overallProgress = $this->getOverallProgress();
        $continueCourse = $this->getContinueCourse();
        $todayEvents = \App\Models\Event::whereDate('event_date', now()->format('Y-m-d'))->orderBy('event_date')->get();
        $todayClasses = \App\Models\LiveClass::whereHas('course.enrollments', fn($q) => $q->where('user_id', auth()->id()))->whereDate('scheduled_at', now()->format('Y-m-d'))->orderBy('scheduled_at')->with('course')->get();
        $nextDeadline = \App\Models\Event::where('event_date', '>=', now())->orderBy('event_date')->first();
        $outstandingBalance = \App\Models\Enrollment::where('user_id', auth()->id())->where('status', 'active')->where('outstanding_balance', '>', 0)->sum('outstanding_balance');
        $recentGrades = \App\Models\Grade::where('user_id', auth()->id())->with('course')->latest()->take(5)->get();
    @endphp

    <style>
        .hero { background: var(--bg-card); border: 1px solid var(--border); border-radius: var(--radius-lg); padding: 24px; margin-bottom: 24px; display: flex; align-items: center; justify-content: space-between; gap: 24px; flex-wrap: wrap; }
        .hero-text h1 { font-size: 22px; font-weight: 700; color: var(--text); margin: 0 0 4px; }
        .hero-text p { font-size: 14px; color: var(--text-muted); margin: 0; }
        .hero-progress { display: flex; align-items: center; gap: 16px; flex-shrink: 0; }
        .progress-ring { width: 72px; height: 72px; transform: rotate(-90deg); }
        .progress-ring-bg { fill: none; stroke: var(--border); stroke-width: 6; }
        .progress-ring-fill { fill: none; stroke: var(--crimson); stroke-width: 6; stroke-linecap: round; transition: stroke-dashoffset .6s ease; }
        .hero-cta { background: var(--crimson); color: #fff; font-weight: 600; font-size: 13px; padding: 10px 20px; border-radius: var(--radius-md); border: none; cursor: pointer; transition: all .15s; white-space: nowrap; }
        .hero-cta:hover { background: var(--crimson-hover); box-shadow: var(--shadow-md); }
        .cat-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; margin-bottom: 24px; }
        @media (min-width: 768px) { .cat-grid { grid-template-columns: repeat(4, 1fr); } }
        .cat-card { background: var(--bg-card); border: 1px solid var(--border); border-radius: var(--radius-md); padding: 20px; text-decoration: none; display: block; transition: all .2s; }
        .cat-card:hover { border-color: var(--accent); box-shadow: var(--shadow-md); transform: translateY(-2px); }
        .cat-icon { width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 12px; font-size: 18px; }
        .cat-label { font-size: 13px; font-weight: 600; color: var(--text); margin: 0 0 4px; }
        .cat-desc { font-size: 12px; color: var(--text-muted); margin: 0 0 10px; }
        .cat-count { display: inline-flex; align-items: center; gap: 6px; font-size: 11px; font-weight: 600; padding: 4px 10px; border-radius: 999px; }
        .course-grid { display: grid; grid-template-columns: 1fr; gap: 16px; }
        @media (min-width: 640px) { .course-grid { grid-template-columns: repeat(2, 1fr); } }
        @media (min-width: 1024px) { .course-grid { grid-template-columns: repeat(3, 1fr); } }
        @media (min-width: 1400px) { .course-grid { grid-template-columns: repeat(4, 1fr); } }
        .course-card { background: var(--bg-card); border: 1px solid var(--border); border-radius: var(--radius-lg); overflow: hidden; cursor: pointer; transition: all .2s; display: flex; flex-direction: column; }
        .course-card:hover { border-color: var(--accent); box-shadow: var(--shadow-lg); transform: translateY(-4px); }
        .course-image { position: relative; aspect-ratio: 16/10; background: var(--bg); overflow: hidden; }
        .course-image img { width: 100%; height: 100%; object-fit: cover; transition: transform .4s ease; }
        .course-card:hover .course-image img { transform: scale(1.05); }
        .course-badge { position: absolute; top: 10px; left: 10px; font-size: 10px; font-weight: 600; padding: 4px 8px; border-radius: 6px; color: #fff; text-transform: capitalize; }
        .course-status { position: absolute; top: 10px; right: 10px; font-size: 9px; font-weight: 600; padding: 3px 7px; border-radius: 4px; color: #fff; text-transform: capitalize; }
        .course-body { padding: 16px; display: flex; flex-direction: column; flex: 1; }
        .course-title { font-size: 14px; font-weight: 600; color: var(--text); margin: 0 0 6px; line-height: 1.3; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
        .course-meta { display: flex; align-items: center; gap: 10px; font-size: 11px; color: var(--text-muted); margin-bottom: 10px; flex-wrap: wrap; }
        .course-meta span { display: flex; align-items: center; gap: 4px; }
        .course-progress { margin-top: auto; padding-top: 12px; border-top: 1px solid var(--border); }
        .progress-header { display: flex; justify-content: space-between; font-size: 11px; margin-bottom: 6px; }
        .progress-label { color: var(--text-muted); }
        .progress-value { font-weight: 600; color: var(--crimson); }
        .progress-bar { height: 6px; background: var(--bg); border-radius: 3px; overflow: hidden; }
        .progress-fill { height: 100%; background: var(--crimson); border-radius: 3px; transition: width .6s ease; }
        .course-footer { display: flex; align-items: center; justify-content: space-between; padding-top: 12px; margin-top: 12px; border-top: 1px solid var(--border); font-size: 11px; }
        .course-payment { color: var(--text-muted); display: flex; align-items: center; gap: 4px; }
        .course-action { font-weight: 600; color: var(--crimson); display: flex; align-items: center; gap: 4px; }
        .live-card { background: var(--bg-card); border: 1px solid var(--border); border-radius: var(--radius-md); padding: 14px 16px; display: flex; align-items: center; gap: 14px; transition: all .15s; }
        .live-card:hover { border-color: var(--accent); box-shadow: var(--shadow-sm); }
        .live-icon { width: 44px; height: 44px; border-radius: 12px; background: var(--crimson-light); color: var(--crimson); display: flex; align-items: center; justify-content: center; font-size: 16px; flex-shrink: 0; }
        .live-info { flex: 1; min-width: 0; }
        .live-title { font-size: 13px; font-weight: 600; color: var(--text); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .live-meta { font-size: 11px; color: var(--text-muted); display: flex; align-items: center; gap: 8px; margin-top: 2px; flex-wrap: wrap; }
        .live-btn { background: var(--crimson); color: #fff; font-size: 11px; font-weight: 600; padding: 7px 14px; border-radius: 8px; border: none; cursor: pointer; white-space: nowrap; transition: all .15s; flex-shrink: 0; }
        .live-btn:hover { background: var(--crimson-hover); }
        .live-empty { text-align: center; padding: 32px; color: var(--text-light); }
        .live-empty i { font-size: 28px; margin-bottom: 8px; display: block; }
        .ann-card { background: var(--bg-card); border: 1px solid var(--border); border-radius: var(--radius-md); padding: 14px 16px; transition: all .15s; }
        .ann-card:hover { border-color: var(--accent); box-shadow: var(--shadow-sm); }
        .ann-header { display: flex; align-items: flex-start; gap: 10px; margin-bottom: 8px; }
        .ann-dot { width: 8px; height: 8px; border-radius: 50%; margin-top: 4px; flex-shrink: 0; }
        .ann-title { font-size: 13px; font-weight: 600; color: var(--text); line-height: 1.3; }
        .ann-body { font-size: 12px; color: var(--text-muted); line-height: 1.4; margin-bottom: 8px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
        .ann-time { font-size: 10px; color: var(--text-light); }
        .dash-two-col { display: grid; grid-template-columns: 1fr; gap: 24px; }
        @media (min-width: 1024px) { .dash-two-col { grid-template-columns: 1fr 360px; } }
        .panel-overlay { position: fixed; inset: 0; background: rgba(15,23,42,.35); z-index: 55; backdrop-filter: blur(2px); display: none; }
        .panel-overlay.open { display: block; }
        .panel { position: fixed; top: 0; right: 0; height: 100%; width: 100%; max-width: 420px; background: var(--bg-card); box-shadow: -16px 0 48px rgba(15,23,42,.15); z-index: 60; overflow-y: auto; transform: translateX(100%); transition: transform .3s cubic-bezier(.16,1,.3,1); }
        .panel.open { transform: translateX(0); }
        .panel-header { position: relative; height: 180px; overflow: hidden; }
        .panel-header img { width: 100%; height: 100%; object-fit: cover; }
        .panel-header-overlay { position: absolute; inset: 0; background: linear-gradient(180deg, transparent 40%, rgba(15,23,42,.8)); }
        .panel-close { position: absolute; top: 14px; right: 14px; width: 36px; height: 36px; background: rgba(255,255,255,.95); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--text); border: none; cursor: pointer; backdrop-filter: blur(8px); box-shadow: var(--shadow-md); }
        .panel-meta { position: absolute; bottom: 14px; left: 16px; right: 16px; color: #fff; }
        .panel-category { font-size: 11px; font-weight: 600; background: rgba(255,255,255,.2); padding: 3px 8px; border-radius: 4px; display: inline-block; margin-bottom: 6px; }
        .panel-title { font-size: 18px; font-weight: 700; margin: 0; }
        .panel-body { padding: 20px; }
        .panel-section { margin-bottom: 20px; }
        .panel-section-title { font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: .05em; color: var(--text-light); margin: 0 0 12px; }
        .panel-progress { margin-bottom: 16px; }
        .panel-progress-header { display: flex; justify-content: space-between; font-size: 12px; margin-bottom: 6px; }
        .panel-progress-bar { height: 8px; background: var(--bg); border-radius: 4px; overflow: hidden; }
        .panel-progress-fill { height: 100%; background: var(--crimson); border-radius: 4px; transition: width .6s ease; }
        .panel-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 16px; }
        .panel-stat { background: var(--bg); border-radius: 10px; padding: 12px; text-align: center; }
        .panel-stat-value { font-size: 18px; font-weight: 700; color: var(--text); }
        .panel-stat-label { font-size: 10px; color: var(--text-muted); margin-top: 2px; }
        .panel-module { display: flex; align-items: center; gap: 10px; padding: 10px 12px; background: var(--bg); border-radius: 8px; margin-bottom: 6px; font-size: 12px; }
        .panel-module-num { width: 26px; height: 26px; border-radius: 6px; background: var(--accent-light); color: var(--accent); display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 11px; flex-shrink: 0; }
        .panel-live { background: #fef7f0; border: 1px solid #fed7aa; border-radius: 10px; padding: 14px; }
        .panel-live-title { font-size: 12px; font-weight: 600; color: var(--text); margin: 0 0 8px; }
        .panel-live-meta { font-size: 11px; color: var(--text-muted); margin-bottom: 10px; }
        .panel-live-btn { background: #ea580c; color: #fff; font-size: 11px; font-weight: 600; padding: 8px 16px; border-radius: 8px; border: none; cursor: pointer; width: 100%; }
        .panel-event { display: flex; align-items: center; gap: 10px; padding: 10px; background: #fffbeb; border: 1px solid #fde68a; border-radius: 8px; margin-bottom: 8px; }
        .panel-event-dot { width: 6px; height: 6px; border-radius: 50%; background: #f59e0b; flex-shrink: 0; }
        .panel-event-title { font-size: 12px; font-weight: 600; color: var(--text); }
        .panel-event-meta { font-size: 10px; color: var(--text-muted); }
        .panel-desc { font-size: 12px; color: var(--text-muted); line-height: 1.6; }
    </style>

    <div id="dash" x-data="{
        courses: {{ $this->getEnrolledCoursesJson() }},
        continueCourse: {{ json_encode($continueCourse) }},
        search: '',
        selected: null,
        panelOpen: false,
        mobileSidebar: false,
        openPanel(course) { this.selected = course; this.panelOpen = true; document.body.style.overflow = 'hidden'; },
        closePanel() { this.panelOpen = false; document.body.style.overflow = ''; setTimeout(() => this.selected = null, 300); },
        get filtered() {
            if (!this.search) return this.courses;
            const q = this.search.toLowerCase();
            return this.courses.filter(c => c.title.toLowerCase().includes(q) || c.category.toLowerCase().includes(q));
        },
        get overallProgress() { return {{ $overallProgress }}; }
    }">
        {{-- Panel Overlay --}}
        <div x-show="panelOpen" x-cloak @@click="closePanel" class="panel-overlay" x-transition.opacity :class="{ open: panelOpen }"></div>

        {{-- Slide-in Panel --}}
        <div x-show="panelOpen" x-cloak x-transition:enter="transition-transform duration-300 ease-out" x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition-transform duration-250 ease-in" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full" class="panel" :class="{ open: panelOpen }">
            <template x-if="selected">
                <div class="panel-header">
                    <img :src="selected.image" alt="" class="w-full h-full object-cover" @@error="$event.target.src='https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&q=80&w=600'">
                    <div class="panel-header-overlay"></div>
                    <button @@click="closePanel" class="panel-close"><i class="fas fa-times text-sm"></i></button>
                    <div class="panel-meta">
                        <span class="panel-category" x-text="selected.category"></span>
                        <h2 class="panel-title" x-text="selected.title"></h2>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-2.5 py-1 rounded text-xs font-semibold" :class="selected.status === 'active' ? 'bg-emerald-50 text-emerald-700' : selected.status === 'completed' ? 'bg-blue-50 text-blue-700' : 'bg-amber-50 text-amber-700'" x-text="selected.status.charAt(0).toUpperCase() + selected.status.slice(1)"></span>
                        <span class="px-2.5 py-1 rounded text-xs font-semibold bg-gray-100 text-gray-600" x-text="selected.paymentStatus"></span>
                        <template x-if="selected.outstandingBalance > 0 && selected.outstandingBalance !== '0'"><span class="px-2.5 py-1 rounded text-xs font-semibold bg-red-50 text-red-600" x-text="'₦' + selected.outstandingBalance + ' outstanding'"></span></template>
                    </div>
                    <div class="panel-progress">
                        <div class="panel-progress-header"><span class="progress-label">Progress</span><span class="progress-value" x-text="selected.progress + '%'"></span></div>
                        <div class="panel-progress-bar"><div class="panel-progress-fill" :style="'width:' + selected.progress + '%'"></div></div>
                    </div>
                    <div class="panel-grid">
                        <template x-if="selected.grade"><div class="panel-stat"><div class="panel-stat-value" x-text="selected.grade"></div><div class="panel-stat-label">Grade</div></div></template>
                        <template x-if="selected.totalMark"><div class="panel-stat"><div class="panel-stat-value" x-text="selected.totalMark"></div><div class="panel-stat-label">Total Mark</div></div></template>
                        <template x-if="selected.packagePrice"><div class="panel-stat"><div class="panel-stat-value" x-text="'₦' + String(selected.packagePrice).replace(/[₦,]/g, '')"></div><div class="panel-stat-label">Price</div></div></template>
                        <template x-if="selected.duration"><div class="panel-stat"><div class="panel-stat-value" x-text="selected.duration"></div><div class="panel-stat-label">Duration</div></div></template>
                    </div>
                    <template x-if="selected.modules && selected.modules.length">
                        <div class="panel-section"><h4 class="panel-section-title">Modules</h4>
                            <div><template x-for="(m, i) in selected.modules" :key="i"><div class="panel-module"><span class="panel-module-num" x-text="i+1"></span><span x-text="m.title"></span></div></template></div></div>
                    </template>
                    <template x-if="selected.nextLiveClass">
                        <div class="panel-section"><h4 class="panel-section-title">Next Live Class</h4>
                            <div class="panel-live"><p class="panel-live-title" x-text="selected.nextLiveClass.title"></p><p class="panel-live-meta"><i class="far fa-calendar mr-1.5"></i><span x-text="selected.nextLiveClass.scheduledAt"></span> · <i class="fas fa-globe mr-1.5"></i><span x-text="selected.nextLiveClass.platform"></span></p><template x-if="selected.nextLiveClass.joinUrl"><a :href="selected.nextLiveClass.joinUrl" target="_blank" class="panel-live-btn"><i class="fas fa-door-open mr-1.5"></i>Join Live Class</a></template></div></div>
                    </template>
                    <template x-if="selected.upcomingEvents && selected.upcomingEvents.length">
                        <div class="panel-section"><h4 class="panel-section-title">Upcoming Events</h4>
                            <div><template x-for="(e, i) in selected.upcomingEvents" :key="i"><div class="panel-event"><div class="panel-event-dot"></div><div><p class="panel-event-title" x-text="e.title"></p><p class="panel-event-meta"><span x-text="e.date"></span> · <span class="bg-amber-100 text-amber-700 px-2 py-0.5 rounded text-[9px] font-medium" x-text="e.type"></span></p></div></div></template></div></div>
                    </template>
                    <template x-if="selected.description">
                        <div class="panel-section"><h4 class="panel-section-title">About This Course</h4><p class="panel-desc" x-text="selected.description"></p></div>
                    </template>
                </div>
            </template>
        </div>

        <x-student.dash-layout title="Dashboard">
            <div class="dash-content">
                {{-- Hero Section --}}
                <section class="hero" aria-labelledby="hero-title">
                    <div class="hero-text">
                        <h1 id="hero-title">Welcome back, {{ $userName }}</h1>
                        <p>Pick up where you left off</p>
                    </div>
                    <div class="hero-progress">
                        <svg class="progress-ring" viewBox="0 0 72 72" aria-hidden="true">
                            <circle class="progress-ring-bg" cx="36" cy="36" r="30"></circle>
                            <circle class="progress-ring-fill" cx="36" cy="36" r="30" :style="'stroke-dasharray: ' + (188.5) + '; stroke-dashoffset: ' + (188.5 * (100 - overallProgress) / 100)"></circle>
                        </svg>
                        <div style="text-align:center;">
                            <div style="font-size:18px;font-weight:700;color:var(--text);" x-text="overallProgress + '%'"></div>
                            <div style="font-size:11px;color:var(--text-muted);">Overall Progress</div>
                        </div>
                    </div>
                    <button class="hero-cta" @@click="continueCourse?.slug ? window.location.href = '/courses/' + continueCourse.slug : window.location.href = '/student/enrollments'" aria-label="Continue learning"><i class="fas fa-play mr-2"></i>Continue Learning</button>
                </section>

                {{-- Info Bar --}}
                <div class="stats-row" style="margin-bottom:20px;">
                    @if($outstandingBalance > 0)
                        <div class="stat-card" style="border-color:#fde68a;background:#fffbeb;">
                            <div class="stat-icon" style="background:#f5a52420;color:#f5a524"><i class="fas fa-exclamation-triangle"></i></div>
                            <div class="stat-info">
                                <div class="stat-value" style="color:#d97706;font-size:16px;">{{ number_format($outstandingBalance, 0, ',', ' ') }} XAF</div>
                                <div class="stat-label" style="color:#b45309;">Outstanding Balance</div>
                            </div>
                        </div>
                    @endif
                    @if($nextDeadline)
                        <div class="stat-card">
                            <div class="stat-icon" style="background:#c1121f15;color:#c1121f"><i class="fas fa-hourglass-half"></i></div>
                            <div class="stat-info">
                                <div class="stat-value" style="font-size:16px;">{{ $nextDeadline->event_date->format('M d') }}</div>
                                <div class="stat-label">{{ \Illuminate\Support\Str::limit($nextDeadline->title, 30) }}</div>
                            </div>
                        </div>
                    @endif
                    <div class="stat-card">
                        <div class="stat-icon" style="background:#091c3d15;color:#091c3d"><i class="fas fa-calendar-day"></i></div>
                        <div class="stat-info">
                            <div class="stat-value" style="font-size:16px;">{{ $todayEvents->count() + $todayClasses->count() }}</div>
                            <div class="stat-label">Today's Activities</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon" style="background:#16a34a15;color:#16a34a"><i class="fas fa-star"></i></div>
                        <div class="stat-info">
                            <div class="stat-value" style="font-size:16px;">{{ $recentGrades->count() }}</div>
                            <div class="stat-label">Recent Grades</div>
                        </div>
                    </div>
                </div>

                {{-- Category Cards --}}
                <section aria-labelledby="categories-title">
                    <div class="section-header">
                        <h2 id="categories-title" class="section-title">Quick Access</h2>
                    </div>
                    <div class="cat-grid" role="list">
                        @php
                            $categories = [
                                ['label' => 'Enrolled Courses', 'desc' => 'Browse all your courses', 'icon' => 'fa-graduation-cap', 'color' => '#091c3d', 'route' => url('/student/enrollments'), 'count' => \App\Models\Enrollment::where('user_id', auth()->id())->count()],
                                ['label' => 'Results', 'desc' => 'View grades and progress', 'icon' => 'fa-chart-bar', 'color' => '#c1121f', 'route' => url('/student/grades'), 'count' => \App\Models\Grade::where('user_id', auth()->id())->count()],
                                ['label' => 'Upcoming', 'desc' => 'Events & live classes', 'icon' => 'fa-calendar-check', 'color' => '#f5a524', 'route' => url('/student/events'), 'count' => \App\Models\Event::where('event_date', '>=', now())->count()],
                                ['label' => 'Records', 'desc' => 'Certificates & documents', 'icon' => 'fa-folder-open', 'color' => '#7c3aed', 'route' => url('/student/student-documents'), 'count' => \App\Models\StudentDocument::where('user_id', auth()->id())->where('status', 'pending')->count()],
                                ['label' => 'Exams', 'desc' => 'Take course exams', 'icon' => 'fa-pencil', 'color' => '#c1121f', 'route' => url('/student/exams'), 'count' => \App\Models\Exam::whereIn('course_id', \App\Models\Enrollment::where('user_id', auth()->id())->pluck('course_id'))->where('is_active', true)->count()],
                            ];
                        @endphp
                        @foreach($categories as $cat)
                            <a href="{{ $cat['route'] }}" class="cat-card" role="listitem">
                                <div class="cat-icon" style="background: {{ $cat['color'] }}15; color: {{ $cat['color'] }}"><i class="fas {{ $cat['icon'] }}"></i></div>
                                <p class="cat-label">{{ $cat['label'] }}</p>
                                <p class="cat-desc">{{ $cat['desc'] }}</p>
                                <span class="cat-count" style="background: {{ $cat['color'] }}15; color: {{ $cat['color'] }}">{{ $cat['count'] }} items</span>
                            </a>
                        @endforeach
                    </div>
                </section>

                {{-- Two Column Layout --}}
                <div class="dash-two-col">
                    {{-- Left: Courses --}}
                    <div class="dash-section-card">
                    <section aria-labelledby="courses-title">
                        <div class="section-header">
                            <h2 id="courses-title" class="section-title">My Enrolled Courses</h2>
                            <a href="{{ url('/student/enrollments') }}" class="section-link">See all →</a>
                        </div>
                        <div x-show="filtered.length === 0 && search" x-cloak class="empty-state"><i class="fas fa-search"></i><h3>No matches</h3><p>No courses match "<span x-text="search"></span>"</p></div>
                        <div x-show="courses.length === 0 && !search" x-cloak class="empty-state"><i class="fas fa-book-open"></i><h3>No courses yet</h3><p>Enroll in a course to start learning</p></div>
                        <div class="course-grid" role="list">
                            <template x-for="c in filtered" :key="c.id">
                                <article class="course-card" @@click="openPanel(c)" role="listitem" tabindex="0" @keydown.enter="openPanel(c)" @keydown.space.prevent="openPanel(c)">
                                    <div class="course-image">
                                        <img :src="c.image" :alt="c.title" loading="lazy" @@error="$event.target.src='https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&q=80&w=400'">
                                        <span class="course-badge" :style="'background:' + (c.status === 'completed' ? '#16a34a' : c.status === 'active' ? '#091c3d' : '#d97706')" x-text="c.category"></span>
                                        <span class="course-status" :style="'background:' + (c.status === 'completed' ? '#16a34a' : c.status === 'active' ? '#091c3d' : '#d97706')" x-text="c.status.charAt(0).toUpperCase() + c.status.slice(1)"></span>
                                    </div>
                                    <div class="course-body">
                                        <h3 class="course-title" x-text="c.title"></h3>
                                        <div class="course-meta">
                                            <span><i class="fas fa-clock"></i> <span x-text="c.duration"></span></span>
                                            <span><i class="fas fa-layer-group"></i> <span x-text="c.modules?.length + ' modules' || '—'"></span></span>
                                        </div>
                                        <div class="course-progress">
                                            <div class="progress-header"><span class="progress-label">Progress</span><span class="progress-value" x-text="c.progress + '%'"></span></div>
                                            <div class="progress-bar"><div class="progress-fill" :style="'width:' + c.progress + '%'"></div></div>
                                        </div>
                                        <div class="course-footer">
                                            <span class="course-payment"><i class="fas fa-credit-card"></i> <span x-text="c.paymentStatus"></span></span>
                                            <span class="course-action"><i class="fas fa-chevron-right"></i> Details</span>
                                        </div>
                                    </div>
                                </article>
                            </template>
                        </div>
                    </section>
                    </div>

                    {{-- Right Sidebar --}}
                    <aside aria-labelledby="sidebar-title" class="flex flex-col">
                        {{-- Live Learning --}}
                        <div class="dash-section-card">
                        <section wire:poll.30s>
                            <div class="section-header">
                                <h2 id="live-title" class="section-title">Live Learning</h2>
                                <a href="{{ url('/student/live-classes') }}" class="section-link">See all</a>
                            </div>
                            @if(count($liveClasses))
                                @foreach(array_slice($liveClasses, 0, 3) as $lc)
                                    <div class="live-card">
                                        <div class="live-icon"><i class="fas fa-video"></i></div>
                                        <div class="live-info">
                                            <p class="live-title">{{ $lc['courseName'] }}</p>
                                            <p class="live-meta">{{ $lc['platform'] }} · {{ $lc['scheduledAt'] }}</p>
                                        </div>
                                        @if($lc['joinUrl'])
                                            <a href="{{ $lc['joinUrl'] }}" target="_blank" class="live-btn"><i class="fas fa-door-open mr-1"></i>Join</a>
                                        @endif
                                    </div>
                                @endforeach
                            @else
                                <div class="live-empty"><i class="fas fa-video"></i><p>No upcoming classes</p></div>
                            @endif
                        </section>
                        </div>

                        {{-- Announcements --}}
                        <div class="dash-section-card">
                        <section wire:poll.30s>
                            <div class="section-header">
                                <h2 id="ann-title" class="section-title">Announcements</h2>
                                <a href="{{ url('/student/announcements') }}" class="section-link">See all</a>
                            </div>
@if(count($announcements))
    @foreach(array_slice($announcements, 0, 4) as $a)
        @php
            $priorityClass = match($a['priority']) {
                'critical' => 'bg-red-500',
                'high' => 'bg-amber-500',
                default => 'bg-slate-500',
            };
        @endphp
        <article class="ann-card">
            <div class="ann-header">
                <div class="ann-dot {{ $priorityClass }}"></div>
                <h3 class="ann-title">{{ $a['title'] }}</h3>
            </div>
            <p class="ann-body">{{ $a['body'] }}</p>
            <time class="ann-time">{{ $a['time'] }}</time>
        </article>
    @endforeach
@else
    <div class="empty-state"><i class="fas fa-bullhorn"></i><h3>No announcements</h3><p>Check back later</p></div>
@endif
                        </section>
                        </div>

                        {{-- Today's Schedule --}}
                        @if($todayClasses->count() > 0 || $todayEvents->count() > 0)
                        <div class="dash-section-card">
                        <section wire:poll.30s>
                            <div class="section-header">
                                <h2 class="section-title">Today's Schedule</h2>
                            </div>
                            @foreach($todayClasses as $tc)
                                <div class="live-card">
                                    <div class="live-icon" style="background:#c1121f15;color:#c1121f"><i class="fas fa-video"></i></div>
                                    <div class="live-info">
                                        <p class="live-title">{{ $tc->course->name }} · {{ $tc->scheduled_at->format('g:i A') }}</p>
                                        <p class="live-meta">{{ $tc->platform }}</p>
                                    </div>
                                    @if($tc->join_url)
                                        <a href="{{ $tc->join_url }}" target="_blank" class="live-btn"><i class="fas fa-door-open mr-1"></i>Join</a>
                                    @endif
                                </div>
                            @endforeach
                            @foreach($todayEvents as $te)
                                <div class="live-card">
                                    <div class="live-icon" style="background:#091c3d15;color:#091c3d"><i class="fas {{ $te->event_type === 'exam' ? 'fa-pencil-alt' : 'fa-calendar-check' }}"></i></div>
                                    <div class="live-info">
                                        <p class="live-title">{{ $te->title }}</p>
                                        <p class="live-meta">{{ $te->event_date->format('g:i A') }} · {{ ucfirst($te->event_type) }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </section>
                        </div>
                        @endif

                        {{-- Recent Grades --}}
                        @if($recentGrades->count() > 0)
                        <div class="dash-section-card">
                        <section wire:poll.30s>
                            <div class="section-header">
                                <h2 class="section-title">Recent Grades</h2>
                                <a href="{{ url('/student/grades') }}" class="section-link">See all</a>
                            </div>
                            @foreach($recentGrades as $rg)
                                <div class="ann-card" style="margin-bottom:8px;">
                                    <div class="ann-header">
                                        <div class="ann-dot {{ $rg->grade_letter === 'A' ? 'bg-emerald-500' : ($rg->grade_letter === 'F' ? 'bg-red-500' : 'bg-amber-500') }}"></div>
                                        <h3 class="ann-title">{{ $rg->course->name }}</h3>
                                    </div>
                                    <div class="course-meta" style="margin-bottom:4px;">
                                        <span><i class="fas fa-chart-bar mr-1"></i>Total: <strong>{{ $rg->total_mark ?? 'N/A' }}</strong></span>
                                        <span>·</span>
                                        <span>Grade: <strong>{{ $rg->grade_letter ?? '-' }}</strong></span>
                                    </div>
                                </div>
                            @endforeach
                        </section>
                        </div>
                        @endif
                    </aside>
                </div>
            </div>
        </x-student.dash-layout>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('dashData', {
                userName: '{{ addslashes($userName) }}',
                userAvatar: '{{ addslashes($userAvatar) }}',
                userProgram: '{{ addslashes($userProgram) }}',
                courses: {{ $this->getEnrolledCoursesJson() }},
                liveClasses: {{ json_encode(array_slice($liveClasses, 0, 3)) }},
                announcements: {{ json_encode(array_slice($announcements, 0, 4)) }},
                overallProgress: {{ $overallProgress }},
                continueCourse: {{ $continueCourse ? json_encode($continueCourse) : 'null' }},
            });
        });
    </script>
</x-filament-panels::page>
