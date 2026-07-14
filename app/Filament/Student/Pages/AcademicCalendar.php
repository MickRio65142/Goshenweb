<?php

namespace App\Filament\Student\Pages;

use App\Models\Event;
use Filament\Pages\Page;
use Carbon\Carbon;

class AcademicCalendar extends Page
{
    protected string $view = 'filament.student.pages.academic-calendar';

    public ?int $currentMonth = null;

    public ?int $currentYear = null;

    public function mount(): void
    {
        $this->currentMonth = now()->month;
        $this->currentYear = now()->year;
    }

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-calendar';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Academics';
    }

    public static function getNavigationLabel(): string
    {
        return 'Academic Calendar';
    }

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    public function getTitle(): string
    {
        return 'Academic Calendar';
    }

    public function previousMonth(): void
    {
        if ($this->currentMonth === 1) {
            $this->currentMonth = 12;
            $this->currentYear--;
        } else {
            $this->currentMonth--;
        }
    }

    public function nextMonth(): void
    {
        if ($this->currentMonth === 12) {
            $this->currentMonth = 1;
            $this->currentYear++;
        } else {
            $this->currentMonth++;
        }
    }

    public function getEventsForDate(int $day): \Illuminate\Support\Collection
    {
        $date = Carbon::createFromDate($this->currentYear, $this->currentMonth, $day)->startOfDay();
        return Event::whereDate('event_date', $date)->get();
    }

    public function getMonthEvents()
    {
        return Event::whereYear('event_date', $this->currentYear)
            ->whereMonth('event_date', $this->currentMonth)
            ->orderBy('event_date')
            ->get();
    }

    public function getCalendarDays(): array
    {
        $date = Carbon::createFromDate($this->currentYear, $this->currentMonth, 1);
        $daysInMonth = $date->daysInMonth;
        $startOfWeek = $date->dayOfWeek;

        $days = [];
        for ($i = 0; $i < $startOfWeek; $i++) {
            $days[] = null;
        }
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $days[] = $day;
        }
        while (count($days) % 7 !== 0) {
            $days[] = null;
        }
        return $days;
    }

    public function getCalendarWeeks(): array
    {
        return array_chunk($this->getCalendarDays(), 7);
    }

    public function getMonthName(): string
    {
        return Carbon::createFromDate($this->currentYear, $this->currentMonth, 1)->format('F');
    }

    public function getYear(): int
    {
        return $this->currentYear;
    }

}
