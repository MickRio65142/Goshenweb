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
    $nav = [
        ['label' => 'Academics', 'items' => [
            ['label' => 'Courses', 'icon' => 'fa-book', 'url' => '/admin/courses', 'pattern' => '/courses*'],
            ['label' => 'Grades', 'icon' => 'fa-chart-bar', 'url' => '/admin/grades', 'pattern' => '/grades*'],
            ['label' => 'Events', 'icon' => 'fa-calendar-check', 'url' => '/admin/events', 'pattern' => '/events*'],
            ['label' => 'Exams', 'icon' => 'fa-pencil-alt', 'url' => '/admin/exams', 'pattern' => '/exams*'],
            ['label' => 'Exam Results', 'icon' => 'fa-chart-simple', 'url' => '/admin/exam-results', 'pattern' => '/exam-results*'],
            ['label' => 'Bulk Import', 'icon' => 'fa-file-upload', 'url' => '/admin/bulk-import-questions', 'pattern' => '/bulk-import-questions*'],
        ]],
        ['label' => 'Student Records', 'items' => [
            ['label' => 'Users', 'icon' => 'fa-users', 'url' => '/admin/users', 'pattern' => '/users*'],
            ['label' => 'Enrollments', 'icon' => 'fa-user-graduate', 'url' => '/admin/enrollments', 'pattern' => '/enrollments*'],
            ['label' => 'Student Documents', 'icon' => 'fa-file-upload', 'url' => '/admin/student-documents', 'pattern' => '/student-documents*'],
        ]],
        ['label' => 'Live Learning', 'items' => [
            ['label' => 'Live Classes', 'icon' => 'fa-video', 'url' => '/admin/class-events', 'pattern' => '/class-events*'],
        ]],
        ['label' => 'Communication', 'items' => [
            ['label' => 'Announcements', 'icon' => 'fa-bullhorn', 'url' => '/admin/announcements', 'pattern' => '/announcements*'],
        ]],
        ['label' => 'Records', 'items' => [
            ['label' => 'Certificates', 'icon' => 'fa-certificate', 'url' => '/admin/certificates', 'pattern' => '/certificates*'],
            ['label' => 'Certificate Templates', 'icon' => 'fa-file-image', 'url' => '/admin/certificate-templates', 'pattern' => '/certificate-templates*'],
        ]],
        ['label' => 'Finance', 'items' => [
            ['label' => 'Transactions', 'icon' => 'fa-credit-card', 'url' => '/admin/transactions', 'pattern' => '/transactions*'],
        ]],
        ['label' => 'System', 'items' => [
            ['label' => 'Portal Settings', 'icon' => 'fa-cog', 'url' => '/admin/settings', 'pattern' => '/settings*'],
        ]],
    ];
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
        @foreach($nav as $section)
        <div class="sidebar-section">
            <div class="sidebar-section-label">{{ $section['label'] }}</div>
            @foreach($section['items'] as $item)
            <a href="{{ url($item['url']) }}" class="sidebar-link {{ $is($item['pattern']) ? 'active' : '' }}">
                <i class="fas {{ $item['icon'] }}"></i>{{ $item['label'] }}
            </a>
            @endforeach
        </div>
        @endforeach
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
