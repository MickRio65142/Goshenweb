<?php

namespace App\Filament\Student\Resources\Books\Pages;

use App\Filament\Student\Resources\Books\BookResource;
use Filament\Resources\Pages\ManageRecords;

class ManageBooks extends ManageRecords
{
    protected static string $resource = BookResource::class;
    protected string $view = 'filament.student.resources.books';

    protected function getHeaderActions(): array
    {
        return [];
    }
}
