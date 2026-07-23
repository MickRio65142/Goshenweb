<?php

namespace App\Filament\Resources\StudentDocuments\Pages;

use App\Filament\Resources\StudentDocuments\StudentDocumentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListStudentDocuments extends ListRecords
{
    protected static string $resource = StudentDocumentResource::class;

    protected string $view = 'filament.admin.resources.list';

    public function getStats(): array
    {
        return [
            ['value' => \App\Models\StudentDocument::count(), 'label' => 'Total Documents', 'icon' => 'fa-file-alt', 'color' => '#091c3d'],
            ['value' => \App\Models\StudentDocument::where('status', 'pending')->count(), 'label' => 'Pending Review', 'icon' => 'fa-clock', 'color' => '#ca8a04'],
            ['value' => \App\Models\StudentDocument::where('status', 'approved')->count(), 'label' => 'Approved', 'icon' => 'fa-check-circle', 'color' => '#16a34a'],
            ['value' => \App\Models\StudentDocument::where('status', 'rejected')->count(), 'label' => 'Rejected', 'icon' => 'fa-times-circle', 'color' => '#dc2626'],
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->createAnother(false)
                ->icon('heroicon-o-plus-circle')
                ->color('primary'),
        ];
    }
}
