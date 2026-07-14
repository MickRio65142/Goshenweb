<?php

namespace App\Filament\Resources\Courses\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
// --- NEW IMPORT FOR MOBILE LAYOUT ---
use Filament\Tables\Columns\Layout\Stack;

class CoursesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            // --- 1. RESPONSIVE GRID LAYOUT ADDED HERE ---
            ->contentGrid([
                'default' => 1, // 1 card per row on mobile phones
                'sm' => 2,      // 2 cards per row on tablets
                'md' => 3,      // 3 cards per row on desktop
                'xl' => 4,      // 4 cards per row on large monitors
            ])
            ->columns([
                // --- 2. STACK ADDED TO ARRANGE ITEMS INSIDE THE CARD ---
                Stack::make([
                    TextColumn::make('title')
                        ->searchable()
                        ->weight('bold')
                        ->size('lg') // Makes the title slightly larger for a better card look
                        ->wrap(),    // PREVENTS TEXT FROM CUTTING OFF ON MOBILE!
                    
                    TextColumn::make('credit_hours')
                        ->numeric()
                        ->badge(),
                ])->space(3), // Adds nice breathing room between the title and the badge
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}