<x-filament-panels::page>
    @php
        $notifications = auth()->user()->notifications()->latest()->get();
        $unreadCount = $notifications->where('read_at', null)->count();
        $readCount = $notifications->where('read_at', '!=', null)->count();
    @endphp
    <div id="dash" x-data="{ search: '', mobileSidebar: false }">
        <x-student.dash-layout title="Notifications">
            <div class="dash-content">
                <div class="stats-row">
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fa-regular fa-bell"></i></div>
                        <div class="stat-info">
                            <div class="stat-value">{{ $notifications->count() }}</div>
                            <div class="stat-label">Total</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fa-regular fa-bell-exclamation"></i></div>
                        <div class="stat-info">
                            <div class="stat-value">{{ $unreadCount }}</div>
                            <div class="stat-label">Unread</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fa-regular fa-bell-check"></i></div>
                        <div class="stat-info">
                            <div class="stat-value">{{ $readCount }}</div>
                            <div class="stat-label">Read</div>
                        </div>
                    </div>
                </div>
                @if(count($notifications))
                    <div class="resource-list">
                        @foreach($notifications as $item)
                            <div class="resource-item" @if(!$item->read_at) style="border-left: 3px solid #dc2626;" @endif>
                                <div class="resource-item-icon" @if($item->read_at) style="color: #9ca3af;" @else style="color: #dc2626;" @endif>
                                    <i class="fa-regular fa-bell"></i>
                                </div>
                                <div class="resource-item-body">
                                    <div class="resource-item-title">{{ $item->data['title'] ?? $item->data['body'] ?? 'Notification' }}</div>
                                    <div class="resource-item-meta">{{ $item->created_at->diffForHumans() }}</div>
                                </div>
                                <div class="resource-item-badge" @if($item->read_at) style="background: #9ca3af;" @else style="background: #f5a524;" @endif>
                                    {{ $item->read_at ? 'Read' : 'Unread' }}
                                </div>
                                <div class="resource-item-action">
                                    @if(!$item->read_at)
                                        <a href="{{ route('student.notifications.mark-as-read', $item) }}" style="color: #2563eb; text-decoration: none; font-size: 0.875rem;">Mark as Read</a>
                                    @else
                                        <span style="color: #9ca3af; font-size: 0.875rem;">Done</span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty-state">
                        <i class="fa-regular fa-bell" style="font-size: 3rem; color: #9ca3af; margin-bottom: 1rem;"></i>
                        <p>No notifications yet</p>
                    </div>
                @endif
            </div>
        </x-student.dash-layout>
    </div>
</x-filament-panels::page>
