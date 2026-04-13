<?php

namespace App\Filament\Resources\Transactions\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Table;

class TransactionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')->label('Code')->searchable(),
                TextColumn::make('boardingHouse.name')->label('Boarding House')->searchable(),
                TextColumn::make('room.name')->label('Room')->searchable(),
                TextColumn::make('name')->label('Name')->searchable(),
                TextColumn::make('email')->label('Email')->searchable(),
                TextColumn::make('phone_number')->searchable(),
                TextColumn::make('payment_method')
                    ->label('Payment Method')
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'down_payment' => 'Down Payment',
                        'full_payment' => 'Full Payment',
                        default => $state,
                    })
                    ->searchable(),
                TextColumn::make('payment_status')
                    ->label('Status')
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'pending' => 'Pending',
                        'paid' => 'Success',
                        'cancelled' => 'Cancelled',
                        default => $state,
                    })
                    ->color(fn(string $state): string => match ($state) {
                        'pending' => 'warning',
                        'paid' => 'success',
                        'cancelled' => 'danger',
                        default => 'gray', // pake gray kalo default, secondary kadang error di versi lama
                    })
                    ->searchable(),
                TextColumn::make('start_date')->label('Start Date')->date(),
                TextColumn::make('duration')->label('Duration (months)'),
                TextColumn::make('total_amount')->label('Total Price')->money('IDR'),
                TextColumn::make('transaction_date')->label('Transaction Date')->date(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
                ViewAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
