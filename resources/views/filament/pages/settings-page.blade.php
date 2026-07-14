<x-filament-panels::page>
    <div id="dash" x-data="{ mobileSidebar: false }">
        <x-admin.dash-layout title="Portal Settings">
            <div class="dash-content">
                <div class="dash-section-card" style="max-width: 600px;">
                    <form wire:submit="save">
                        {{ $this->form }}
                        <div style="display: flex; gap: 12px; margin-top: 20px; padding-top: 16px; border-top: 1px solid var(--border);">
                            <x-filament::button type="submit" color="primary">
                                Save Settings
                            </x-filament::button>
                        </div>
                    </form>
                </div>
            </div>
        </x-admin.dash-layout>
    </div>
</x-filament-panels::page>
