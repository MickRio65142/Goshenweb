<x-filament-panels::page>
    <div id="dash" x-data="{ mobileSidebar: false }">
        <x-student.dash-layout>
            <div class="dash-content">
                {{ $this->table }}
            </div>
        </x-student.dash-layout>
    </div>
</x-filament-panels::page>
