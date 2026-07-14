<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected string $view = 'filament.admin.resources.create-form';

    protected function afterCreate(): void
    {
        if ($this->record && $this->record->role === 'student') {
            $this->record->notify(new \App\Notifications\AccountCreated($this->record));
        }
    }
}
