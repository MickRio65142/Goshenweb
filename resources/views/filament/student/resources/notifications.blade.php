<x-filament-panels::page>
    @php
        $notifications = auth()->user()->notifications()->latest()->get();
        $unreadCount = $notifications->where('read_at', null)->count();
        $readCount = $notifications->where('read_at', '!=', null)->count();
    @endphp
    <div id="dash" x-data="{
        search: new URLSearchParams(window.location.search).get('search') || '',
        mobileSidebar: false,
        items: {{ json_encode($notifications->map(fn($n) => [
            'id' => $n->id,
            'title' => $n->data['title'] ?? $n->data['body'] ?? 'Notification',
            'time' => $n->created_at->diffForHumans(),
            'unread' => !$n->read_at,
        ])) }},
        get filtered() {
            if (!this.search) return this.items;
            const q = this.search.toLowerCase();
            return this.items.filter(i => i.title.toLowerCase().includes(q));
        }
    }">
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
                <template x-if="filtered.length === 0 && search">
                    <div class="empty-state"><i class="fa-regular fa-search"></i><h3>No matches</h3><p>No notifications match "<span x-text="search"></span>"</p></div>
                </template>
                <template x-if="filtered.length === 0 && !search">
                    <div class="empty-state"><i class="fa-regular fa-bell" style="font-size: 3rem; color: #9ca3af; margin-bottom: 1rem;"></i><p>No notifications yet</p></div>
                </template>
                <template x-if="filtered.length > 0">
                    <div class="resource-list">
                        <template x-for="item in filtered" :key="item.id">
                            <div class="resource-item" :style="item.unread ? 'border-left: 3px solid #dc2626;' : ''">
                                <div class="resource-item-icon" :style="item.unread ? 'color: #dc2626;' : 'color: #9ca3af;'">
                                    <i class="fa-regular fa-bell"></i>
                                </div>
                                <div class="resource-item-body">
                                    <div class="resource-item-title" x-text="item.title"></div>
                                    <div class="resource-item-meta" x-text="item.time"></div>
                                </div>
                                <div class="resource-item-badge" :style="item.unread ? 'background: #f5a524;' : 'background: #9ca3af;'">
                                    <span x-text="item.unread ? 'Unread' : 'Read'"></span>
                                </div>
                                <div class="resource-item-action">
                                    <template x-if="item.unread">
                                        <a :href="'/student/notifications/' + item.id + '/mark-as-read'" style="color: #2563eb; text-decoration: none; font-size: 0.875rem;">Mark as Read</a>
                                    </template>
                                    <template x-if="!item.unread">
                                        <span style="color: #9ca3af; font-size: 0.875rem;">Done</span>
                                    </template>
                                </div>
                            </div>
                        </template>
                    </div>
                </template>
            </div>
        </x-student.dash-layout>
    </div>
</x-filament-panels::page>
