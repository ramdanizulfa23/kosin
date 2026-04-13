<?php

namespace App\Filament\Resources\BoardingHouses\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Table;

class BoardingHousesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('city.name')->label('Kota'),
                TextColumn::make('category.name')->label('Kategori'),
                TextColumn::make('price')
                    ->label('Harga per Bulan')
                    ->money('idr', true),
                ImageColumn::make('thumbnail')
                    ->label('Thumbnail')
                    ->disk('public')
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                ViewAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
