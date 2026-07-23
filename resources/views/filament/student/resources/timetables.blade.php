<x-filament-panels::page>
    @php
        $timetables = \App\Models\Timetable::orderBy('updated_at', 'desc')->get();
        $total = $timetables->count();
        $latest = $timetables->first()?->updated_at;
    @endphp
    <div id="dash" x-data="{
        search: new URLSearchParams(window.location.search).get('search') || '',
        mobileSidebar: false,
        items: {{ json_encode($timetables->map(fn($t) => [
            'title' => $t->title,
            'desc' => $t->description,
            'updated' => $t->updated_at->format('M d, Y'),
            'file' => $t->file_path ? asset('storage/' . $t->file_path) : null,
        ])) }},
        get filtered() {
            if (!this.search) return this.items;
            const q = this.search.toLowerCase();
            return this.items.filter(i => i.title.toLowerCase().includes(q) || (i.desc && i.desc.toLowerCase().includes(q)));
        }
    }">
        <x-student.dash-layout title="Class Timetables">
            <div class="dash-content">
                <div class="stats-row">
                    <div class="stat-card">
                        <div class="stat-icon" style="background:#091c3d15;color:#091c3d"><i class="fas fa-calendar-alt"></i></div>
                        <div class="stat-info">
                            <div class="stat-value">{{ $total }}</div>
                            <div class="stat-label">Total Timetables</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon" style="background:#16a34a15;color:#16a34a"><i class="fas fa-clock"></i></div>
                        <div class="stat-info">
                            <div class="stat-value">{{ $latest ? $latest->format('M d, Y') : 'N/A' }}</div>
                            <div class="stat-label">Latest Update</div>
                        </div>
                    </div>
                </div>
                <template x-if="filtered.length === 0 && search">
                    <div class="empty-state"><i class="fas fa-search"></i><h3>No matches</h3><p>No timetables match "<span x-text="search"></span>"</p></div>
                </template>
                <template x-if="filtered.length === 0 && !search">
                    <div class="empty-state"><i class="fas fa-calendar-alt"></i><h3>No Timetables</h3><p>No timetables have been uploaded yet.</p></div>
                </template>
                <template x-if="filtered.length > 0">
                    <div class="resource-list">
                        <template x-for="item in filtered" :key="item.title">
                            <div class="resource-item">
                                <div class="resource-item-icon" style="background:#091c3d15;color:#091c3d"><i class="fas fa-calendar-alt"></i></div>
                                <div class="resource-item-body">
                                    <div class="resource-item-title" x-text="item.title"></div>
                                    <div class="resource-item-meta">
                                        <span x-text="item.desc"></span>
                                        <span x-text="'Updated: ' + item.updated"></span>
                                    </div>
                                </div>
                                <div class="resource-item-action">
                                    <template x-if="item.file">
                                        <a :href="item.file" download><i class="fas fa-download"></i> Download</a>
                                    </template>
                                    <template x-if="!item.file">
                                        <span>No file</span>
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
