<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                FileUpload::make('avatar_url')
                    ->label('Profile Photo')
                    ->image()
                    ->imageEditor()
                    ->avatar()
                    ->directory('avatars')
                    ->columnSpanFull(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->email()
                    ->required(),
                TextInput::make('password')
                    ->password()
                    ->required(fn (string $context): bool => $context === 'create')
                    ->dehydrated(fn ($state) => filled($state)),
                Select::make('role')
                    ->options([
                        'admin' => 'Admin',
                        'student' => 'Student',
                    ])
                    ->default('student')
                    ->required(),
                TextInput::make('phone_number'),
                DatePicker::make('date_of_birth')
                    ->label('Date of Birth'),
                Select::make('gender')
                    ->options([
                        'male' => 'Male',
                        'female' => 'Female',
                        'other' => 'Other',
                    ]),
                TextInput::make('nationality'),
                Textarea::make('address')
                    ->columnSpanFull(),
                TextInput::make('emergency_contact_name')
                    ->label('Emergency Contact Name'),
                TextInput::make('emergency_contact_phone')
                    ->label('Emergency Contact Phone'),
                Select::make('education_level')
                    ->label('Education Level')
                    ->options([
                        'high_school' => 'High School',
                        'bachelor' => 'Bachelor\'s Degree',
                        'master' => 'Master\'s Degree',
                        'doctorate' => 'Doctorate',
                        'other' => 'Other',
                    ]),
                TextInput::make('heard_about_us')
                    ->label('How did you hear about us?'),
                Select::make('campus')
                    ->options([
                        'douala' => 'Douala Main Campus',
                        'limbe' => 'Limbe Campus',
                    ]),
            ]);
    }
}
