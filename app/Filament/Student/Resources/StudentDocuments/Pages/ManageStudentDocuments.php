<?php

namespace App\Filament\Student\Resources\StudentDocuments\Pages;

use App\Filament\Student\Resources\StudentDocuments\StudentDocumentResource;
use App\Models\User;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Support\Facades\Notification;

class ManageStudentDocuments extends ManageRecords
{
    protected static string $resource = StudentDocumentResource::class;
    protected string $view = 'filament.student.resources.documents';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->after(function ($record) {
                    $admins = User::where('role', 'admin')->get();
                    Notification::send($admins, new \App\Notifications\DocumentUploaded($record));
                }),
        ];
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    
    {
        $data['user_id'] = auth()->id();
        return $data;
    }
}

