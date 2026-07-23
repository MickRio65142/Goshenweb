@props(['title' => null])
@php
    $user = auth()->user();
    $userName = $user->name;
    $userAvatar = $user->avatar_url
        ? asset('storage/' . $user->avatar_url)
        : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=091c3d&color=fff&size=200';
    $pageTitle = $title ?? 'Dashboard';
    $is = fn($path) => request()->is('admin' . $path);
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
    <a href="{{ url('/admin') }}" class="sidebar-header">
        <img src="{{ asset('images/logo.png') }}" alt="GWSA" class="sidebar-logo-img">
    </a>
    <nav class="sidebar-nav">
        <div class="sidebar-section">
            <a href="{{ url('/admin') }}" class="sidebar-link {{ $is('') || $is('/dashboard') ? 'active' : '' }}">
                <i class="fas fa-th-large"></i>Dashboard
            </a>
        </div>
        <div class="sidebar-section">
            <div class="sidebar-section-label">Academics</div>
            <a href="{{ url('/admin/courses') }}" class="sidebar-link {{ $is('/courses*') ? 'active' : '' }}"><i class="fas fa-book"></i>Courses</a>
            <a href="{{ url('/admin/grades') }}" class="sidebar-link {{ $is('/grades*') ? 'active' : '' }}"><i class="fas fa-chart-bar"></i>Grades</a>
            <a href="{{ url('/admin/events') }}" class="sidebar-link {{ $is('/events*') ? 'active' : '' }}"><i class="fas fa-calendar-check"></i>Events</a>
            <a href="{{ url('/admin/exams') }}" class="sidebar-link {{ $is('/exams*') ? 'active' : '' }}"><i class="fas fa-pencil-alt"></i>Exams</a>
            <a href="{{ url('/admin/exam-results') }}" class="sidebar-link {{ $is('/exam-results*') ? 'active' : '' }}"><i class="fas fa-chart-simple"></i>Exam Results</a>
        </div>
        <div class="sidebar-section">
            <div class="sidebar-section-label">Student Records</div>
            <a href="{{ url('/admin/users') }}" class="sidebar-link {{ $is('/users*') ? 'active' : '' }}"><i class="fas fa-users"></i>Users</a>
            <a href="{{ url('/admin/enrollments') }}" class="sidebar-link {{ $is('/enrollments*') ? 'active' : '' }}"><i class="fas fa-user-graduate"></i>Enrollments</a>
            <a href="{{ url('/admin/student-documents') }}" class="sidebar-link {{ $is('/student-documents*') ? 'active' : '' }}"><i class="fas fa-file-upload"></i>Student Documents</a>
        </div>
        <div class="sidebar-section">
            <div class="sidebar-section-label">Live Learning</div>
            <a href="{{ url('/admin/class-events') }}" class="sidebar-link {{ $is('/class-events*') ? 'active' : '' }}"><i class="fas fa-video"></i>Live Classes</a>
        </div>
        <div class="sidebar-section">
            <div class="sidebar-section-label">Communication</div>
            <a href="{{ url('/admin/announcements') }}" class="sidebar-link {{ $is('/announcements*') ? 'active' : '' }}"><i class="fas fa-bullhorn"></i>Announcements</a>
        </div>
        <div class="sidebar-section">
            <div class="sidebar-section-label">Records</div>
            <a href="{{ url('/admin/certificates') }}" class="sidebar-link {{ $is('/certificates*') ? 'active' : '' }}"><i class="fas fa-certificate"></i>Certificates</a>
        </div>
        <div class="sidebar-section">
            <div class="sidebar-section-label">Finance</div>
            <a href="{{ url('/admin/transactions') }}" class="sidebar-link {{ $is('/transactions*') ? 'active' : '' }}"><i class="fas fa-credit-card"></i>Transactions</a>
        </div>
        <div class="sidebar-section">
            <div class="sidebar-section-label">System</div>
            <a href="{{ url('/admin/settings') }}" class="sidebar-link {{ $is('/settings*') ? 'active' : '' }}"><i class="fas fa-cog"></i>Portal Settings</a>
        </div>
    </nav>
</aside>

<main class="dash-main">
    <header class="dash-header" role="banner">
        <div class="header-left">
            <h1 class="header-title">{{ $pageTitle }}</h1>
        </div>
        <div class="header-right">
            <div class="header-notif-btn" x-data="{
                open: false,
                unreadCount: {{ $unreadCount }},
                notifications: {{ json_encode($notifData) }},
                init() {
                    setInterval(async () => {
                        try {
                            let r = await fetch('{{ url('/admin/notifications/poll') }}');
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
                            <a href="{{ url('/admin') }}" class="notif-item" :class="{ 'notif-unread': !n.read }">
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
                    <a href="{{ url('/admin') }}" class="notif-view-all"><i class="fas fa-arrow-right"></i> View All Notifications</a>
                </div>
            </div>
            <div class="header-profile-btn" x-data="{ open: false }" x-on:click.outside="open = false">
                <button @@click="open = !open" class="flex items-center gap-2 px-2 py-1.5 rounded-lg hover:bg-gray-50 transition-colors cursor-pointer">
                    <img src="{{ $userAvatar }}" alt="{{ $userName }}" class="header-avatar">
                    <span class="hidden md:inline text-sm font-medium text-gray-700">{{ $userName }}</span>
                    <i class="fas fa-chevron-down text-xs text-gray-400 transition-transform" :class="{ 'rotate-180': open }"></i>
                </button>
                <div x-show="open" x-cloak x-transition.origin.top.right class="header-profile-dropdown">
                    <a href="{{ url('/admin/profile') }}" class="flex items-center gap-3 px-4 py-2.5 hover:bg-gray-50 text-sm text-gray-700 rounded-lg mx-1">
                        <i class="fas fa-user w-5 text-center text-gray-400"></i>View Profile
                    </a>
                    <hr class="my-1 border-gray-100 mx-3">
                    <form method="POST" action="{{ route('filament.admin.auth.logout') }}" class="mx-1">@csrf<button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 hover:bg-red-50 text-sm text-red-500 rounded-lg"><i class="fas fa-sign-out-alt w-5 text-center"></i>Sign Out</button></form>
                </div>
            </div>
        </div>
    </header>
    {{ $slot }}
</main>
