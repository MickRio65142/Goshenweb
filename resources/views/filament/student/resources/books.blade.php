<x-filament-panels::page>
    @php
        $books = \App\Models\Book::all();
        $categories = $books->groupBy('category')->map->count();
    @endphp
    <div id="dash" x-data="{
        search: new URLSearchParams(window.location.search).get('search') || '',
        mobileSidebar: false,
        items: {{ json_encode($books->map(fn($b) => [
            'title' => $b->title,
            'author' => $b->author,
            'desc' => Str::limit($b->description, 80),
            'category' => $b->category,
            'fileUrl' => $b->file_path ? asset('storage/' . $b->file_path) : null,
        ])) }},
        get filtered() {
            if (!this.search) return this.items;
            const q = this.search.toLowerCase();
            return this.items.filter(i => i.title.toLowerCase().includes(q) || i.author.toLowerCase().includes(q) || i.category.toLowerCase().includes(q) || i.desc.toLowerCase().includes(q));
        }
    }">
        <x-student.dash-layout title="Digital Library">
            <div class="dash-content">
                <div class="stats-row">
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fa-solid fa-book"></i></div>
                        <div class="stat-info">
                            <div class="stat-value">{{ $books->count() }}</div>
                            <div class="stat-label">Total Books</div>
                        </div>
                    </div>
                    @foreach($categories as $category => $count)
                        <div class="stat-card">
                            <div class="stat-icon"><i class="fa-solid fa-tag"></i></div>
                            <div class="stat-info">
                                <div class="stat-value">{{ $count }}</div>
                                <div class="stat-label">{{ $category }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <template x-if="filtered.length === 0 && search">
                    <div class="empty-state"><i class="fa-solid fa-search"></i><h3>No matches</h3><p>No books match "<span x-text="search"></span>"</p></div>
                </template>
                <template x-if="filtered.length === 0 && !search">
                    <div class="empty-state"><i class="fa-solid fa-book" style="font-size: 3rem; color: #9ca3af; margin-bottom: 1rem;"></i><p>No books available</p></div>
                </template>
                <template x-if="filtered.length > 0">
                    <div class="resource-list">
                        <template x-for="item in filtered" :key="item.title">
                            <div class="resource-item">
                                <div class="resource-item-icon"><i class="fa-solid fa-book"></i></div>
                                <div class="resource-item-body">
                                    <div class="resource-item-title"><strong x-text="item.title"></strong></div>
                                    <div class="resource-item-meta" x-text="item.author"></div>
                                    <div style="font-size: 0.8rem; color: #6b7280; margin-top: 0.25rem;" x-text="item.desc"></div>
                                </div>
                                <div class="resource-item-badge" style="background: #091c3d;" x-text="item.category"></div>
                                <div class="resource-item-action">
                                    <template x-if="item.fileUrl">
                                        <a :href="item.fileUrl" target="_blank" style="display: inline-flex; align-items: center; gap: 0.375rem; padding: 0.5rem 1rem; background: #2563eb; color: #fff; border-radius: 0.375rem; text-decoration: none; font-size: 0.875rem;">
                                            <i class="fa-solid fa-download"></i> Download PDF
                                        </a>
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
