<?php

namespace App\Filament\Resources\StudentDocuments\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class StudentDocumentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required()
                    ->searchable()
                    ->label('Student'),
                TextInput::make('document_name')
                    ->required()
                    ->placeholder('e.g., Birth Certificate, ID Card, Transcript'),
                FileUpload::make('file_path')
                    ->label('Upload File (PDF, Images, Excel, Word)')
                    ->directory('student-documents')
                    ->preserveFilenames()
                    ->acceptedFileTypes([
                        'application/pdf',
                        'image/png', 'image/jpeg', 'image/jpg', 'image/gif',
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                        'application/vnd.ms-excel',
                        'application/msword',
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    ])
                    ->maxSize(20480)
                    ->columnSpanFull(),
                Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ])
                    ->default('pending')
                    ->required(),
                Textarea::make('admin_feedback')
                    ->placeholder('Feedback for the student about this document')
                    ->columnSpanFull(),
            ]);
    }
}
