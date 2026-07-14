<x-filament-panels::page>
    @php
        $resourceName = class_basename($this->getResource());
        $pageTitle = $this->getTitle() ?? 'New ' . \Illuminate\Support\Str::singular($resourceName);
    @endphp
    <style>
        .form-header { display: flex; align-items: center; justify-content: space-between; gap: 16px; flex-wrap: wrap; margin-bottom: 20px; }
        .form-header-left { display: flex; align-items: center; gap: 12px; }
        .form-back-btn { width: 38px; height: 38px; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: var(--text-muted); background: var(--bg-card); border: 1px solid var(--border); text-decoration: none; transition: all .15s; flex-shrink: 0; }
        .form-back-btn:hover { border-color: var(--accent); color: var(--accent); }
        .form-header-icon { width: 38px; height: 38px; border-radius: 10px; background: var(--accent-light); color: var(--accent); display: flex; align-items: center; justify-content: center; font-size: 16px; flex-shrink: 0; }
        .form-header-text h1 { font-size: 18px; font-weight: 700; color: var(--text); margin: 0; }
        .form-card { background: var(--bg-card); border: 1px solid var(--border); border-radius: var(--radius-lg); padding: 28px; max-width: 860px; transition: box-shadow .2s; }
        .form-card:hover { box-shadow: var(--shadow-sm); }
    </style>
    <div id="dash" x-data="{ mobileSidebar: false }">
        <x-admin.dash-layout :title="$pageTitle">
            <div class="dash-content">
                {{-- Page Header --}}
                <div class="form-header">
                    <div class="form-header-left">
                        <a href="{{ url()->previous() }}" class="form-back-btn" title="Back">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                        <div class="form-header-icon">
                            <i class="fas fa-plus"></i>
                        </div>
                        <div class="form-header-text">
                            <h1>{{ $pageTitle }}</h1>
                        </div>
                    </div>
                </div>

                {{-- Form Card --}}
                <div class="form-card">
                    {{ $this->content }}
                </div>
            </div>
        </x-admin.dash-layout>
    </div>
</x-filament-panels::page>
