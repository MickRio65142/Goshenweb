<?php

namespace App\Filament\Student\Resources\Transactions\Pages;

use App\Filament\Student\Resources\Transactions\TransactionResource;
use Filament\Resources\Pages\ManageRecords;

class ManageTransactions extends ManageRecords
{
    protected static string $resource = TransactionResource::class;
    protected string $view = 'filament.student.resources.transactions';

    protected function getHeaderActions(): array
    {
        return [];
    }
}
