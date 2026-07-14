<?php

namespace App\Filament\Student\Resources\StudentDocuments;

use App\Filament\Student\Resources\StudentDocuments\Pages;
use App\Models\StudentDocument;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use UnitEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Filament\Schemas\Schema;

class StudentDocumentResource extends Resource
{
    protected static ?string $model = StudentDocument::class;

    protected static ?int $navigationSort = 2;
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-document-arrow-up';
    protected static ?string $navigationLabel = 'My Documents';
    protected static ?string $modelLabel = 'Student Document';

    public static function getNavigationGroup(): string | UnitEnum | null
    {
        return 'Resources';
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', Auth::id());
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('document_name')
                    ->label('Document Title')
                    ->placeholder('e.g., National ID Card, High School Diploma')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('file_path')
                    ->label('Upload File (PDF, PNG, JPG)')
                    ->directory('student-documents')
                    ->preserveFilenames()
                    ->required()
                    ->maxSize(10240), // 10MB limit
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('document_name')
                    ->label('Document Title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'approved' => 'success',
                        'rejected' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => ucfirst($state)),
                Tables\Columns\TextColumn::make('admin_feedback')
                    ->label('Admin Feedback')
                    ->placeholder('No feedback left yet')
                    ->wrap(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Uploaded At')
                    ->dateTime('M d, Y h:i A'),
            ])
            ->filters([])
            ->actions([
                \Filament\Actions\ViewAction::make(),
                \Filament\Actions\EditAction::make()
                    ->visible(fn (StudentDocument $record): bool => $record->status === 'pending'),
                \Filament\Actions\DeleteAction::make()
                    ->visible(fn (StudentDocument $record): bool => $record->status === 'pending'),
            ])
            ->bulkActions([]);
    }

    public static function getPages(): array
{
    return [
        'index' => Pages\ManageStudentDocuments::route('/'),
    ];
}
}