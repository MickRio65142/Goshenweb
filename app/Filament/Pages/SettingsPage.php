<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Schemas\Schema;
use Filament\Pages\Page;
use Filament\Notifications\Notification;

class SettingsPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected string $view = 'filament.pages.settings-page';

    protected static ?string $slug = 'settings';

    public ?array $data = [];

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-cog-6-tooth';
    }

    public static function getNavigationLabel(): string
    {
        return 'Portal Settings';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'System';
    }

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    public function getTitle(): string
    {
        return 'Portal Settings';
    }

    public function mount(): void
    {
        $this->form->fill([
            'portal_open' => Setting::where('key', 'portal_open')->value('value') === 'true',
            'registration_fee' => (int) (Setting::where('key', 'registration_fee')->value('value') ?? 25000),
            'exam_portal_open' => Setting::where('key', 'exam_portal_open')->value('value') === 'true',
        ]);
    }

    public function form(Schema $form): Schema
    {
        return $form
            ->schema([
                Toggle::make('portal_open')
                    ->label('Registration Portal Open')
                    ->helperText('When disabled, students will see "Registration is currently closed" when trying to register.')
                    ->onColor('success')
                    ->offColor('danger'),
                TextInput::make('registration_fee')
                    ->label('Registration / Subscription Fee (CFA)')
                    ->numeric()
                    ->minValue(0)
                    ->required()
                    ->suffix('CFA'),
                Toggle::make('exam_portal_open')
                    ->label('Exam Portal Open')
                    ->helperText('When disabled, students will see "Exam portal is currently closed" when trying to access exams.')
                    ->onColor('success')
                    ->offColor('danger'),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        Setting::updateOrCreate(
            ['key' => 'portal_open'],
            ['value' => $this->data['portal_open'] ? 'true' : 'false']
        );
        Setting::updateOrCreate(
            ['key' => 'registration_fee'],
            ['value' => (string) ($this->data['registration_fee'] ?? 25000)]
        );
        Setting::updateOrCreate(
            ['key' => 'exam_portal_open'],
            ['value' => $this->data['exam_portal_open'] ? 'true' : 'false']
        );

        Notification::make()
            ->title('Settings saved successfully.')
            ->success()
            ->send();
    }

    public static function canAccess(): bool
    {
        return auth()->user()?->role === 'admin';
    }
}
