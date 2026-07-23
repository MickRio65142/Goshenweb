@props(['title' => null])
@php
    $user = auth()->user();
    $userName = $user->name;
    $userAvatar = $user->avatar_url
        ? asset('storage/' . $user->avatar_url)
        : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=091c3d&color=fff&size=200';
    $pageTitle = $title ?? 'Dashboard';
    $is = fn($path) => request()->is('student' . $path);
    $recentNotifications = $user->notifications()->latest()->take(5)->get();
    $unreadCount = $user->unreadNotifications()->count();
    $notifData = $recentNotifications->map(fn($n) => [
        'id' => $n->id,
        'title' => $n->data['title'] ?? 'Notification',
        'body' => \Illuminate\Support\Str::limit($n->data['body'] ?? '', 60),
        'time' => $n->created_at->diffForHumans(),
        'read' => !is_null($n->read_at),
    ])->values()->toArray();
@endphp

<button @@click="mobileSidebar = !mobileSidebar" class="mobile-toggle" aria-label="Toggle menu"><i class="fas fa-bars"></i></button>
<div x-show="mobileSidebar" x-cloak @@click="mobileSidebar = false" class="mobile-overlay" x-transition.opacity :class="{ open: mobileSidebar }"></div>

<aside class="dash-sidebar" :class="{ 'mobile-open': mobileSidebar }" role="navigation" aria-label="Main navigation">
    <a href="{{ url('/student') }}" class="sidebar-header">
        <img src="{{ asset('images/logo.png') }}" alt="GWSA" class="sidebar-logo-img">
    </a>
    <nav class="sidebar-nav">
        <div class="sidebar-section">
            <a href="{{ url('/student') }}" class="sidebar-link {{ $is('') || $is('/student-dashboard') ? 'active' : '' }}"><i class="fas fa-th-large"></i>Dashboard</a>
        </div>
        <div class="sidebar-section">
            <div class="sidebar-section-label">Academics</div>
            <a href="{{ url('/student/academic-calendar') }}" class="sidebar-link {{ $is('/academic-calendar*') ? 'active' : '' }}"><i class="fas fa-calendar-plus"></i>Academic Calendar</a>
            <a href="{{ url('/student/enrollments') }}" class="sidebar-link {{ $is('/enrollments*') ? 'active' : '' }}"><i class="fas fa-book-open"></i>My Courses</a>
            <a href="{{ url('/student/exams') }}" class="sidebar-link {{ $is('/exams*') ? 'active' : '' }}"><i class="fas fa-pencil-alt"></i>My Exams</a>
            <a href="{{ url('/student/grades') }}" class="sidebar-link {{ $is('/grades*') ? 'active' : '' }}"><i class="fas fa-chart-bar"></i>My Grades & CA</a>
            <a href="{{ url('/student/events') }}" class="sidebar-link {{ $is('/events*') ? 'active' : '' }}"><i class="fas fa-list-alt"></i>Event Log</a>
            <a href="{{ url('/student/timetables') }}" class="sidebar-link {{ $is('/timetables*') ? 'active' : '' }}"><i class="fas fa-calendar-alt"></i>Class Timetables</a>
        </div>
        <div class="sidebar-section">
            <div class="sidebar-section-label">Communication</div>
            <a href="{{ url('/student/announcements') }}" class="sidebar-link {{ $is('/announcements*') ? 'active' : '' }}"><i class="fas fa-bullhorn"></i>Announcements</a>
            <a href="{{ url('/student/notifications') }}" class="sidebar-link {{ $is('/notifications*') ? 'active' : '' }}"><i class="fas fa-bell"></i>Notifications</a>
        </div>
        <div class="sidebar-section">
            <div class="sidebar-section-label">Resources</div>
            <a href="{{ url('/student/books') }}" class="sidebar-link {{ $is('/books*') ? 'active' : '' }}"><i class="fas fa-book"></i>Digital Library</a>
            <a href="{{ url('/student/student-documents') }}" class="sidebar-link {{ $is('/student-documents*') ? 'active' : '' }}"><i class="fas fa-file-upload"></i>My Documents</a>
        </div>
        <div class="sidebar-section">
            <div class="sidebar-section-label">Records</div>
            <a href="{{ url('/student/certificates') }}" class="sidebar-link {{ $is('/certificates*') ? 'active' : '' }}"><i class="fas fa-certificate"></i>My Certificates</a>
        </div>
        <div class="sidebar-section">
            <div class="sidebar-section-label">Live Learning</div>
            <a href="{{ url('/student/live-classes') }}" class="sidebar-link {{ $is('/live-classes*') ? 'active' : '' }}"><i class="fas fa-video"></i>Live Classes</a>
        </div>
        <div class="sidebar-section">
            <div class="sidebar-section-label">Finance</div>
            <a href="{{ url('/student/transactions') }}" class="sidebar-link {{ $is('/transactions*') ? 'active' : '' }}"><i class="fas fa-credit-card"></i>Transactions</a>
        </div>
    </nav>
</aside>

<main class="dash-main">
    <header class="dash-header" role="banner">
        <div class="header-left">
            <h1 class="header-title">{{ $pageTitle }}</h1>
        </div>
        <form method="GET" class="header-search">
            <i class="fas fa-search"></i>
            <input type="text" name="search" placeholder="Search..." aria-label="Search" autocomplete="off" value="{{ request('search') }}">
        </form>
        <div class="header-right">
            <div class="header-notif-btn" x-data="{
                open: false,
                unreadCount: {{ $unreadCount }},
                notifications: {{ json_encode($notifData) }},
                init() {
                    setInterval(async () => {
                        try {
                            let r = await fetch('{{ url('/student/notifications/poll') }}');
                            let data = await r.json();
                            this.unreadCount = data.unread_count;
                            this.notifications = data.notifications;
                        } catch(e) {}
                    }, 30000);
                }
            }" x-on:click.outside="open = false">
                <button @@click="open = !open" class="header-btn" aria-label="Notifications">
                    <i class="fas fa-bell"></i>
                    <span x-show="unreadCount > 0" x-cloak class="notif-badge" x-text="unreadCount > 9 ? '9+' : unreadCount"></span>
                </button>
                <div x-show="open" x-cloak x-transition.origin.top.right class="notif-dropdown">
                    <div class="notif-dropdown-header">
                        <span class="notif-dropdown-title">Notifications</span>
                        <span x-show="unreadCount > 0" x-cloak class="notif-dropdown-count" x-text="unreadCount + ' new'"></span>
                    </div>
                    <div class="notif-dropdown-body">
                        <template x-for="n in notifications" :key="n.id">
                            <a :href="'{{ url('/student/notifications') }}'" class="notif-item" :class="{ 'notif-unread': !n.read }">
                                <div class="notif-item-dot" :style="'background:' + (n.read ? 'var(--border)' : 'var(--crimson)')"></div>
                                <div class="notif-item-body">
                                    <div class="notif-item-title" x-text="n.title"></div>
                                    <div class="notif-item-meta" x-text="n.body"></div>
                                    <div class="notif-item-time" x-text="n.time"></div>
                                </div>
                            </a>
                        </template>
                        <div x-show="notifications.length === 0" x-cloak class="notif-empty">
                            <i class="fas fa-bell-slash"></i><p>No notifications yet</p>
                        </div>
                    </div>
                    <a href="{{ url('/student/notifications') }}" class="notif-view-all"><i class="fas fa-arrow-right"></i> View All Notifications</a>
                </div>
            </div>
            <div class="header-profile-btn" x-data="{ open: false }" x-on:click.outside="open = false">
                <button @@click="open = !open" class="flex items-center gap-2 px-2 py-1.5 rounded-lg hover:bg-gray-50 transition-colors cursor-pointer">
                    <img src="{{ $userAvatar }}" alt="{{ $userName }}" class="header-avatar">
                    <span class="hidden md:inline text-sm font-medium text-gray-700">{{ $userName }}</span>
                    <i class="fas fa-chevron-down text-xs text-gray-400 transition-transform" :class="{ 'rotate-180': open }"></i>
                </button>
                <div x-show="open" x-cloak x-transition.origin.top.right class="header-profile-dropdown">
                    <a href="{{ url('/student/profile') }}" class="flex items-center gap-3 px-4 py-2.5 hover:bg-gray-50 text-sm text-gray-700 rounded-lg mx-1">
                        <i class="fas fa-user w-5 text-center text-gray-400"></i>View Profile
                    </a>
                    <a href="{{ url('/student/profile') }}#settings" class="flex items-center gap-3 px-4 py-2.5 hover:bg-gray-50 text-sm text-gray-700 rounded-lg mx-1">
                        <i class="fas fa-cog w-5 text-center text-gray-400"></i>Settings
                    </a>
                    <hr class="my-1 border-gray-100 mx-3">
                    <form method="POST" action="{{ route('filament.student.auth.logout') }}" class="mx-1">@csrf<button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 hover:bg-red-50 text-sm text-red-500 rounded-lg"><i class="fas fa-sign-out-alt w-5 text-center"></i>Sign Out</button></form>
                </div>
            </div>
        </div>
    </header>
    {{ $slot }}
</main>
