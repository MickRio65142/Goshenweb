<x-filament-panels::page>
    @php
        $resourceName = class_basename($this->getResource());
        $recordCount = method_exists($this, 'getAllRecordCount') ? $this->getAllRecordCount() : null;
        if (!$recordCount) {
            $modelClass = $this->getResource()::getModel();
            $recordCount = $modelClass ? $modelClass::count() : 0;
        }
        $pageTitle = str_replace('List ', '', $this->getTitle() ?? $resourceName);
        $stats = method_exists($this, 'getStats') ? $this->getStats() : [];
    @endphp
    <style>
        .res-header { display: flex; align-items: center; justify-content: space-between; gap: 16px; flex-wrap: wrap; margin-bottom: 20px; }
        .res-header-left { display: flex; align-items: center; gap: 14px; }
        .res-header-icon { width: 44px; height: 44px; border-radius: 12px; background: var(--accent-light); color: var(--accent); display: flex; align-items: center; justify-content: center; font-size: 18px; flex-shrink: 0; }
        .res-header-text h1 { font-size: 18px; font-weight: 700; color: var(--text); margin: 0; }
        .res-header-text p { font-size: 12px; color: var(--text-muted); margin: 2px 0 0; }
        .res-header-actions { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }
        .res-header-actions .fi-btn { margin: 0 !important; }
        .res-action-bar { display: flex; flex-wrap: wrap; gap: 10px; margin-bottom: 20px; }
        .res-action-item { display: flex; align-items: center; gap: 8px; padding: 10px 16px; background: var(--bg-card); border: 1px solid var(--border); border-radius: var(--radius-md); font-size: 12px; font-weight: 600; color: var(--text-muted); text-decoration: none; transition: all .2s; cursor: pointer; }
        .res-action-item:hover { border-color: var(--accent); color: var(--accent); box-shadow: var(--shadow-sm); }
        .res-action-item i { font-size: 13px; }
        .res-table-wrapper { background: var(--bg-card); border: 1px solid var(--border); border-radius: var(--radius-lg); padding: 4px; overflow: hidden; transition: box-shadow .2s; }
        .res-table-wrapper:hover { box-shadow: var(--shadow-sm); }
    </style>
    <div id="dash" x-data="{ mobileSidebar: false }">
        <x-admin.dash-layout :title="$pageTitle">
            <div class="dash-content">
                {{-- Page Header --}}
                <div class="res-header">
                    <div class="res-header-left">
                        <div class="res-header-icon">
                            <i class="fas fa-database"></i>
                        </div>
                        <div class="res-header-text">
                            <h1>{{ $pageTitle }}</h1>
                            <p>{{ $recordCount }} total {{ \Illuminate\Support\Str::plural(lcfirst($resourceName), $recordCount) }}</p>
                        </div>
                    </div>
                    <div class="res-header-actions">
                        @foreach($this->getCachedHeaderActions() as $action)
                            {{ $action }}
                        @endforeach
                    </div>
                </div>

                {{-- Stats Row --}}
                @if(count($stats))
                    <div class="stats-row">
                        @foreach($stats as $stat)
                            <div class="stat-card">
                                <div class="stat-icon" style="background: {{ $stat['color'] }}15; color: {{ $stat['color'] }}">
                                    <i class="fas {{ $stat['icon'] }}"></i>
                                </div>
                                <div class="stat-info">
                                    <div class="stat-value">{{ $stat['value'] }}</div>
                                    <div class="stat-label">{{ $stat['label'] }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                {{-- Table --}}
                <div class="res-table-wrapper" wire:poll.30s>
                    {{ $this->content }}
                </div>
            </div>
        </x-admin.dash-layout>
    </div>
</x-filament-panels::page>
