@php use Carbon\Carbon; @endphp
<x-filament-panels::page>
    <div id="dash" x-data="{ viewMode: 'grid', search: '', mobileSidebar: false }">
        <x-student.dash-layout title="Academic Calendar">
            <div class="dash-content space-y-6">
                <!-- Month Navigation + View Toggle -->
                <div class="stat-card" style="padding: 16px 24px; border-radius: var(--radius-lg);">
                    <div style="display: flex; align-items: center; justify-content: space-between; gap: 16px; flex-wrap: wrap;">
                        <div style="display: flex; align-items: center; gap: 12px;">
                            <button wire:click="previousMonth" class="header-btn" style="width: 36px; height: 36px; border-radius: 8px;">
                                <i class="fas fa-chevron-left" style="font-size: 12px;"></i>
                            </button>
                            <h2 style="font-size: 18px; font-weight: 700; color: var(--color-navy); min-width: 180px; text-align: center; margin: 0;">
                                {{ $this->getMonthName() }} {{ $this->getYear() }}
                            </h2>
                            <button wire:click="nextMonth" class="header-btn" style="width: 36px; height: 36px; border-radius: 8px;">
                                <i class="fas fa-chevron-right" style="font-size: 12px;"></i>
                            </button>
                        </div>
                        <div style="display: flex; gap: 4px; background: var(--bg); border-radius: var(--radius-sm); padding: 3px;">
                            <button @click="viewMode = 'grid'" :class="viewMode === 'grid' ? 'active' : ''"
                                    style="padding: 6px 14px; border-radius: 6px; font-size: 12px; font-weight: 600; border: none; cursor: pointer; transition: all .15s; font-family: inherit;"
                                    :style="viewMode === 'grid' ? 'background: var(--bg-card); box-shadow: var(--shadow-sm); color: var(--crimson);' : 'background: transparent; color: var(--text-muted);'">
                                <i class="fas fa-th-large" style="margin-right: 5px;"></i>Grid
                            </button>
                            <button @click="viewMode = 'list'" :class="viewMode === 'list' ? 'active' : ''"
                                    style="padding: 6px 14px; border-radius: 6px; font-size: 12px; font-weight: 600; border: none; cursor: pointer; transition: all .15s; font-family: inherit;"
                                    :style="viewMode === 'list' ? 'background: var(--bg-card); box-shadow: var(--shadow-sm); color: var(--crimson);' : 'background: transparent; color: var(--text-muted);'">
                                <i class="fas fa-list" style="margin-right: 5px;"></i>List
                            </button>
                        </div>
                    </div>
                </div>

                <!-- GRID VIEW -->
                <div x-show="viewMode === 'grid'" x-cloak>
                    <div class="dash-section-card" style="padding: 0; overflow: hidden;">
                        <!-- Day headers -->
                        <div style="display: grid; grid-template-columns: repeat(7, 1fr); background: var(--bg); border-bottom: 1px solid var(--border);">
                            @foreach(['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'] as $day)
                                <div style="padding: 12px 8px; text-align: center; font-size: 11px; font-weight: 700; color: var(--text-light); text-transform: uppercase; letter-spacing: .05em;">{{ $day }}</div>
                            @endforeach
                        </div>

                        <!-- Calendar weeks -->
                        @foreach($this->getCalendarWeeks() as $week)
                            <div style="display: grid; grid-template-columns: repeat(7, 1fr); border-bottom: 1px solid var(--border);">
                                @foreach($week as $day)
                                    @if($day)
                                        @php
                                            $dateEvents = $this->getEventsForDate($day);
                                            $isToday = $day === now()->day && $this->currentMonth === now()->month && $this->currentYear === now()->year;
                                        @endphp
                                        <div style="min-height: 100px; padding: 6px 8px; border-right: 1px solid var(--border); {{ $isToday ? 'background: var(--accent-light);' : '' }} {{ $loop->last ? 'border-right: none;' : '' }}"
                                             {{ $loop->parent->last && $loop->last ? 'style=min-height:100px;padding:6px 8px;' : '' }}>
                                            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 4px;">
                                                <span style="font-size: 12px; {{ $isToday ? 'font-weight: 700; color: var(--accent); width: 26px; height: 26px; border-radius: 50%; display: flex; align-items: center; justify-content: center; background: var(--accent); color: #fff;' : 'font-weight: 600; color: var(--text-muted);' }}">
                                                    {{ $day }}
                                                </span>
                                                @if($dateEvents->count() > 0)
                                                    <span style="font-size: 10px; color: var(--text-light); font-weight: 600;">{{ $dateEvents->count() }}</span>
                                                @endif
                                            </div>
                                            <div style="display: flex; flex-direction: column; gap: 2px;">
                                                @foreach($dateEvents->take(2) as $event)
                                                    <div @click="$dispatch('open-modal', { id: 'event-detail-{{ $event->id }}-grid' })"
                                                         style="font-size: 9px; line-height: 1.3; padding: 2px 6px; border-radius: 4px; cursor: pointer; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; font-weight: 600; background: {{ $event->color ?? 'var(--accent-light)' }}; color: var(--color-navy);">
                                                        {{ $event->title }}
                                                    </div>
                                                @endforeach
                                                @if($dateEvents->count() > 2)
                                                    <div style="font-size: 9px; color: var(--text-light); font-weight: 600; padding: 0 4px;">+{{ $dateEvents->count() - 2 }} more</div>
                                                @endif
                                            </div>

                                            <!-- Event detail modals -->
                                            @foreach($dateEvents as $event)
                                                <x-filament::modal id="event-detail-{{ $event->id }}-grid" width="sm">
                                                    <div style="padding: 20px;">
                                                        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                                                            <span style="font-size: 10px; font-weight: 700; text-transform: uppercase; padding: 3px 10px; border-radius: 20px;
                                                                @switch($event->event_type)
                                                                    @case('exam') background: var(--crimson-light); color: var(--crimson); @break
                                                                    @case('academic') background: var(--accent-light); color: var(--accent); @break
                                                                    @case('workshop') background: #dcfce7; color: #16a34a; @break
                                                                    @case('holiday') background: var(--gold-light); color: var(--gold); @break
                                                                    @case('graduation') background: #f3e8ff; color: #9333ea; @break
                                                                    @default background: var(--bg); color: var(--text-muted)
                                                                @endswitch
                                                            ">{{ ucfirst($event->event_type) }}</span>
                                                        </div>
                                                        <h3 style="font-size: 18px; font-weight: 700; color: var(--color-navy); margin: 0 0 12px;">{{ $event->title }}</h3>
                                                        <p style="font-size: 12px; color: var(--text-muted); margin: 0 0 12px;">
                                                            <i class="far fa-calendar" style="margin-right: 6px;"></i> {{ $event->event_date->format('M d, Y - g:i A') }}
                                                        </p>
                                                        @if($event->location)
                                                            <p style="font-size: 12px; color: var(--text-muted); margin: 0 0 12px;">
                                                                <i class="fas fa-location-dot" style="margin-right: 6px;"></i> {{ $event->location }}
                                                            </p>
                                                        @endif
                                                        @if($event->description)
                                                            <div style="margin-top: 12px; padding-top: 12px; border-top: 1px solid var(--border); font-size: 12px; color: var(--text-muted); line-height: 1.6;">{!! $event->description !!}</div>
                                                        @endif
                                                    </div>
                                                </x-filament::modal>
                                            @endforeach
                                        </div>
                                    @else
                                        <div style="min-height: 100px; background: var(--bg); border-right: 1px solid var(--border);"></div>
                                    @endif
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- LIST VIEW (Month-grouped) -->
                <div x-show="viewMode === 'list'" x-cloak>
                    @php
                        $monthEvents = $this->getMonthEvents()->groupBy(function($event) {
                            return $event->event_date->format('Y-m-d');
                        });
                    @endphp

                    @if($monthEvents->count() > 0)
                        <div style="display: flex; flex-direction: column; gap: 12px;">
                            @foreach($monthEvents as $date => $events)
                                @php $carbonDate = Carbon::parse($date); @endphp
                                <div class="dash-section-card" style="padding: 0; overflow: hidden;">
                                    <div style="display: flex; align-items: center; gap: 12px; padding: 12px 16px; background: var(--bg); border-bottom: 1px solid var(--border);">
                                        <div style="flex-shrink: 0; width: 44px; height: 44px; background: var(--color-navy); border-radius: var(--radius-sm); display: flex; flex-direction: column; align-items: center; justify-content: center; color: #fff;">
                                            <span style="font-size: 16px; font-weight: 700; line-height: 1;">{{ $carbonDate->format('d') }}</span>
                                            <span style="font-size: 8px; text-transform: uppercase; font-weight: 600;">{{ $carbonDate->format('M') }}</span>
                                        </div>
                                        <div style="flex: 1;">
                                            <span style="font-size: 14px; font-weight: 700; color: var(--text);">{{ $carbonDate->format('l') }}</span>
                                            <span style="font-size: 12px; color: var(--text-light); margin-left: 8px;">{{ $events->count() }} event{{ $events->count() > 1 ? 's' : '' }}</span>
                                        </div>
                                    </div>
                                    <div style="display: flex; flex-direction: column;">
                                        @foreach($events as $event)
                                            <div style="display: flex; align-items: center; gap: 12px; padding: 10px 16px; cursor: pointer; transition: background .15s; border-bottom: 1px solid var(--border);"
                                                 onmouseover="this.style.background='var(--bg)'" onmouseout="this.style.background='transparent'"
                                                 @click="$dispatch('open-modal', { id: 'event-detail-{{ $event->id }}-list' })">
                                                <span style="font-size: 11px; font-weight: 600; white-space: nowrap; color: var(--text-light); width: 56px; flex-shrink: 0;">{{ $event->event_date->format('g:i A') }}</span>
                                                <div style="flex: 1; min-width: 0;">
                                                    <span style="font-size: 13px; font-weight: 600; color: var(--text);">{{ $event->title }}</span>
                                                    @if($event->location)
                                                        <span style="font-size: 11px; color: var(--text-light); margin-left: 8px;"><i class="fas fa-location-dot"></i> {{ $event->location }}</span>
                                                    @endif
                                                </div>
                                                <span style="font-size: 10px; font-weight: 700; text-transform: uppercase; padding: 3px 10px; border-radius: 20px; flex-shrink: 0;
                                                    @switch($event->event_type)
                                                        @case('exam') background: var(--crimson-light); color: var(--crimson); @break
                                                        @case('academic') background: var(--accent-light); color: var(--accent); @break
                                                        @case('workshop') background: #dcfce7; color: #16a34a; @break
                                                        @case('holiday') background: var(--gold-light); color: var(--gold); @break
                                                        @case('graduation') background: #f3e8ff; color: #9333ea; @break
                                                        @default background: var(--bg); color: var(--text-muted)
                                                    @endswitch
                                                ">{{ ucfirst($event->event_type) }}</span>
                                            </div>

                                            <!-- List view event detail modal -->
                                            <x-filament::modal id="event-detail-{{ $event->id }}-list" width="sm">
                                                <div style="padding: 20px;">
                                                    <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                                                        <span style="font-size: 10px; font-weight: 700; text-transform: uppercase; padding: 3px 10px; border-radius: 20px;
                                                            @switch($event->event_type)
                                                                @case('exam') background: var(--crimson-light); color: var(--crimson); @break
                                                                @case('academic') background: var(--accent-light); color: var(--accent); @break
                                                                @case('workshop') background: #dcfce7; color: #16a34a; @break
                                                                @case('holiday') background: var(--gold-light); color: var(--gold); @break
                                                                @case('graduation') background: #f3e8ff; color: #9333ea; @break
                                                                @default background: var(--bg); color: var(--text-muted)
                                                            @endswitch
                                                        ">{{ ucfirst($event->event_type) }}</span>
                                                    </div>
                                                    <h3 style="font-size: 18px; font-weight: 700; color: var(--color-navy); margin: 0 0 12px;">{{ $event->title }}</h3>
                                                    <p style="font-size: 12px; color: var(--text-muted); margin: 0 0 12px;">
                                                        <i class="far fa-calendar" style="margin-right: 6px;"></i> {{ $event->event_date->format('M d, Y - g:i A') }}
                                                    </p>
                                                    @if($event->location)
                                                        <p style="font-size: 12px; color: var(--text-muted); margin: 0 0 12px;">
                                                            <i class="fas fa-location-dot" style="margin-right: 6px;"></i> {{ $event->location }}
                                                        </p>
                                                    @endif
                                                    @if($event->description)
                                                        <div style="margin-top: 12px; padding-top: 12px; border-top: 1px solid var(--border); font-size: 12px; color: var(--text-muted); line-height: 1.6;">{!! $event->description !!}</div>
                                                    @endif
                                                </div>
                                            </x-filament::modal>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="empty-state">
                            <i class="fas fa-calendar"></i>
                            <h3>No events this month</h3>
                            <p>Try navigating to another month or check back later.</p>
                        </div>
                    @endif
                </div>
            </div>
        </x-student.dash-layout>
    </div>
</x-filament-panels::page>
