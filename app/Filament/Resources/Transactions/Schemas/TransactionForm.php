<?php

namespace App\Filament\Resources\Transactions\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('code')
                    ->label('Code')
                    ->required(),
                Select::make('boarding_house_id')
                    ->label('Boarding House')
                    ->relationship('boardingHouse', 'name')
                    ->required(),
                Select::make('room_id')
                    ->label('Room')
                    ->relationship('room', 'name')
                    ->required(),
                TextInput::make('name')
                    ->label('Name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required(),
                TextInput::make('phone_number')
                    ->label('Phone')
                    ->tel()
                    ->required(),
                Select::make('payment_method')
                    ->label('Payment Method')
                    ->options([
                        'down_payment' => 'Down Payment',
                        'full_payment' => 'Full Payment',
                    ])
                    ->required(),
                Select::make('payment_status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'paid' => 'Paid',
                    ])
                    ->required(),
                DatePicker::make('start_date')
                    ->label('Start Date')
                    ->date()
                    ->required(),
                TextInput::make('duration')
                    ->label('Duration (months)')
                    ->numeric()
                    ->required(),
                TextInput::make('total_amount')
                    ->label('Total Price')
                    ->prefix('Rp')
                    ->numeric()
                    ->required(),
                DatePicker::make('transaction_date')
                    ->label('Transaction Date')
                    ->date()
                    ->required(),

            ]);
    }
}
