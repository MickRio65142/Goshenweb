<x-filament-panels::page>
    @php
        $books = \App\Models\Book::all();
        $categories = $books->groupBy('category')->map->count();
    @endphp
    <div id="dash" x-data="{ search: '', mobileSidebar: false }">
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
                @if(count($books))
                    <div class="resource-list">
                        @foreach($books as $item)
                            <div class="resource-item">
                                <div class="resource-item-icon">
                                    <i class="fa-solid fa-book"></i>
                                </div>
                                <div class="resource-item-body">
                                    <div class="resource-item-title"><strong>{{ $item->title }}</strong></div>
                                    <div class="resource-item-meta">{{ $item->author }}</div>
                                    <div style="font-size: 0.8rem; color: #6b7280; margin-top: 0.25rem;">
                                        {{ \Illuminate\Support\Str::limit($item->description, 80) }}
                                    </div>
                                </div>
                                <div class="resource-item-badge" style="background: #091c3d;">
                                    {{ $item->category }}
                                </div>
                                <div class="resource-item-action">
                                    <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank" style="display: inline-flex; align-items: center; gap: 0.375rem; padding: 0.5rem 1rem; background: #2563eb; color: #fff; border-radius: 0.375rem; text-decoration: none; font-size: 0.875rem;">
                                        <i class="fa-solid fa-download"></i> Download PDF
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty-state">
                        <i class="fa-solid fa-book" style="font-size: 3rem; color: #9ca3af; margin-bottom: 1rem;"></i>
                        <p>No books available</p>
                    </div>
                @endif
            </div>
        </x-student.dash-layout>
    </div>
</x-filament-panels::page>
