<x-filament-panels::page>
    @php
        $certificates = \App\Models\Certificate::where('user_id', auth()->id())->with('course')->latest()->get();
        $availableCount = $certificates->where('status', 'available')->count();
        $revokedCount = $certificates->where('status', 'revoked')->count();
    @endphp
    <div id="dash" x-data="{ search: '', mobileSidebar: false }">
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
                @if(count($certificates))
                    <div class="resource-list">
                        @foreach($certificates as $item)
                            @php
                                $badgeColor = $item->status === 'available' ? '#16a34a' : '#dc2626';
                            @endphp
                            <div class="resource-item">
                                <div class="resource-item-icon">
                                    <i class="fa-solid fa-certificate"></i>
                                </div>
                                <div class="resource-item-body">
                                    <div class="resource-item-title">{{ $item->course->name ?? 'N/A' }}</div>
                                    <div class="resource-item-meta">
                                        {{ $item->certificate_number }} &middot; {{ $item->issue_date->format('M d, Y') }}
                                    </div>
                                </div>
                                <div class="resource-item-badge" style="background: {{ $badgeColor }};">
                                    {{ ucfirst($item->status) }}
                                </div>
                                <div class="resource-item-action">
                                    @if($item->status === 'available')
                                        <a href="{{ Storage::url($item->file_path) }}" target="_blank" style="display: inline-flex; align-items: center; gap: 0.375rem; padding: 0.5rem 1rem; background: #2563eb; color: #fff; border-radius: 0.375rem; text-decoration: none; font-size: 0.875rem;">
                                            <i class="fa-solid fa-download"></i> Download
                                        </a>
                                    @else
                                        <span style="color: #dc2626; font-size: 0.875rem;">Revoked</span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty-state">
                        <i class="fa-solid fa-certificate" style="font-size: 3rem; color: #9ca3af; margin-bottom: 1rem;"></i>
                        <p>No certificates yet</p>
                    </div>
                @endif
            </div>
        </x-student.dash-layout>
    </div>
</x-filament-panels::page>
