<?php

namespace App\Filament\Resources\Transactions\Pages;

use App\Filament\Resources\Transactions\TransactionResource;
use Filament\Resources\Pages\EditRecord;

class EditTransaction extends EditRecord
{
    protected static string $resource = TransactionResource::class;

    protected string $view = 'filament.admin.resources.edit-form';

    protected function afterSave(): void
    {
        $this->record->refresh();
        if ($this->record->user) {
            $this->record->user->notify(new \App\Notifications\TransactionRecorded($this->record));
        }
    }
}
