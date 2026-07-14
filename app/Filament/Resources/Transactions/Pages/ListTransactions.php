<?php

namespace App\Filament\Resources\Transactions\Pages;

use App\Filament\Resources\Transactions\TransactionResource;
use Filament\Resources\Pages\ListRecords;

class ListTransactions extends ListRecords
{
    protected static string $resource = TransactionResource::class;

    protected string $view = 'filament.admin.resources.list';

    public function getStats(): array
    {
        return [
            ['value' => \App\Models\Transaction::count(), 'label' => 'Total', 'icon' => 'fa-list', 'color' => '#6366f1'],
            ['value' => \App\Models\Transaction::where('status', 'completed')->count(), 'label' => 'Completed', 'icon' => 'fa-check', 'color' => '#22c55e'],
            ['value' => \App\Models\Transaction::where('status', 'pending')->count(), 'label' => 'Pending', 'icon' => 'fa-clock', 'color' => '#f59e0b'],
            ['value' => \App\Models\Transaction::where('status', 'failed')->count(), 'label' => 'Failed', 'icon' => 'fa-times', 'color' => '#ef4444'],
        ];
    }
}
