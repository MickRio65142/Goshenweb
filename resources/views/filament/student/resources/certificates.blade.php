<x-filament-panels::page>
    @php
        $certificates = \App\Models\Certificate::where('user_id', auth()->id())->with('course')->latest()->get();
        $availableCount = $certificates->where('status', 'available')->count();
        $revokedCount = $certificates->where('status', 'revoked')->count();
    @endphp
    <div id="dash" x-data="{
        search: new URLSearchParams(window.location.search).get('search') || '',
        mobileSidebar: false,
        items: {{ json_encode($certificates->map(fn($c) => [
            'course' => $c->course->name ?? 'N/A',
            'number' => $c->certificate_number,
            'date' => $c->issue_date->format('M d, Y'),
            'status' => $c->status,
            'badgeColor' => $c->status === 'available' ? '#16a34a' : '#dc2626',
            'fileUrl' => $c->status === 'available' && $c->file_path ? Storage::url($c->file_path) : null,
        ])) }},
        get filtered() {
            if (!this.search) return this.items;
            const q = this.search.toLowerCase();
            return this.items.filter(i => i.course.toLowerCase().includes(q) || i.number.toLowerCase().includes(q) || i.status.toLowerCase().includes(q));
        }
    }">
        <x-student.dash-layout title="My Certificates">
            <div class="dash-content">
                <div class="stats-row">
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fa-solid fa-certificate"></i></div>
                        <div class="stat-info">
                            <div class="stat-value">{{ $certificates->count() }}</div>
                            <div class="stat-label">Total</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fa-solid fa-check-circle"></i></div>
                        <div class="stat-info">
                            <div class="stat-value">{{ $availableCount }}</div>
                            <div class="stat-label">Available</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fa-solid fa-ban"></i></div>
                        <div class="stat-info">
                            <div class="stat-value">{{ $revokedCount }}</div>
                            <div class="stat-label">Revoked</div>
                        </div>
                    </div>
                </div>
                <template x-if="filtered.length === 0 && search">
                    <div class="empty-state"><i class="fa-solid fa-search"></i><h3>No matches</h3><p>No certificates match "<span x-text="search"></span>"</p></div>
                </template>
                <template x-if="filtered.length === 0 && !search">
                    <div class="empty-state"><i class="fa-solid fa-certificate" style="font-size: 3rem; color: #9ca3af; margin-bottom: 1rem;"></i><p>No certificates yet</p></div>
                </template>
                <template x-if="filtered.length > 0">
                    <div class="resource-list">
                        <template x-for="item in filtered" :key="item.number">
                            <div class="resource-item">
                                <div class="resource-item-icon"><i class="fa-solid fa-certificate"></i></div>
                                <div class="resource-item-body">
                                    <div class="resource-item-title" x-text="item.course"></div>
                                    <div class="resource-item-meta" x-text="item.number + ' · ' + item.date"></div>
                                </div>
                                <div class="resource-item-badge" :style="'background: ' + item.badgeColor + ';'" x-text="item.status.charAt(0).toUpperCase() + item.status.slice(1)"></div>
                                <div class="resource-item-action">
                                    <template x-if="item.fileUrl">
                                        <a :href="item.fileUrl" target="_blank" style="display: inline-flex; align-items: center; gap: 0.375rem; padding: 0.5rem 1rem; background: #2563eb; color: #fff; border-radius: 0.375rem; text-decoration: none; font-size: 0.875rem;">
                                            <i class="fa-solid fa-download"></i> Download
                                        </a>
                                    </template>
                                    <template x-if="!item.fileUrl">
                                        <span style="color: #dc2626; font-size: 0.875rem;">Revoked</span>
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
