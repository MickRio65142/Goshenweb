<x-filament-panels::page>
    @php
        $timetables = \App\Models\Timetable::orderBy('updated_at', 'desc')->get();
        $total = $timetables->count();
        $latest = $timetables->first()?->updated_at;
    @endphp
    <div id="dash" x-data="{ search: '', mobileSidebar: false }">
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
                @if(count($timetables))
                    <div class="resource-list">
                        @foreach($timetables as $timetable)
                            <div class="resource-item">
                                <div class="resource-item-icon" style="background:#091c3d15;color:#091c3d"><i class="fas fa-calendar-alt"></i></div>
                                <div class="resource-item-body">
                                    <div class="resource-item-title">{{ $timetable->title }}</div>
                                    <div class="resource-item-meta">
                                        <span>{{ $timetable->description }}</span>
                                        <span>Updated: {{ $timetable->updated_at->format('M d, Y') }}</span>
                                    </div>
                                </div>
                                <div class="resource-item-action">
                                    @if($timetable->file_path)
                                        <a href="{{ asset('storage/' . $timetable->file_path) }}" download><i class="fas fa-download"></i> Download</a>
                                    @else
                                        <span>No file</span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty-state"><i class="fas fa-calendar-alt"></i><h3>No Timetables</h3><p>No timetables have been uploaded yet.</p></div>
                @endif
            </div>
        </x-student.dash-layout>
    </div>
</x-filament-panels::page>
