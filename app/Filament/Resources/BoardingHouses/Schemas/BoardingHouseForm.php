<?php

namespace App\Filament\Resources\BoardingHouses\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextArea;
use Filament\Forms\Components\Toggle;
use Illuminate\Support\Str;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class BoardingHouseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Tabs')
                    ->tabs([
                        Tab::make('Informasi Umum')
                            ->schema([
                                FileUpload::make('thumbnail')
                                    ->image()
                                    ->directory('boarding-houses')
                                    ->required()
                                    ->columnSpan(2),
                                TextInput::make('name')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->reactive()
                                    ->debounce(500)
                                    ->afterStateUpdated(function ($state, callable $set) {
                                        $set('slug', Str::slug($state));
                                    }),
                                TextInput::make('slug')
                                    ->required()
                                    ->live(onBlur: true),
                                Select::make('city_id')
                                    ->relationship('city', 'name')
                                    ->required()
                                    ->columnSpan(2),
                                Select::make('category_id')
                                    ->relationship('category', 'name')
                                    ->required()
                                    ->columnSpan(2),
                                RichEditor::make('description')
                                    ->required()
                                    ->columnSpan(2),
                                TextInput::make('price')
                                    ->required()
                                    ->numeric()
                                    ->prefix('IDR')
                                    ->columnSpan(2),
                                TextArea::make('address')
                                    ->required()
                                    ->columnSpan(2),
                            ]),
                        Tab::make('Bonus Fasilitas')
                            ->schema([
                                Repeater::make('bonuses')
                                    ->relationship('bonuses')
                                    ->schema([
                                        FileUpload::make('image')
                                            ->image()
                                            ->directory('bonuses')
                                            ->required()
                                            ->columnSpan(2),
                                        TextInput::make('name')
                                            ->required()
                                            ->columnSpan(2),
                                        TextInput::make('description')
                                            ->required()
                                            ->columnSpan(2),
                                    ])
                            ]),
                        Tab::make('Kamar')
                            ->schema([
                                Repeater::make('rooms')
                                    ->relationship('rooms')
                                    ->schema([
                                        FileUpload::make('image')
                                            ->image()
                                            ->directory('rooms')
                                            ->required()
                                            ->columnSpan(2),
                                        TextInput::make('name')
                                            ->required()
                                            ->columnSpan(2),
                                        TextInput::make('room_type')
                                            ->required()
                                            ->columnSpan(2),
                                        TextInput::make('square_feet')
                                            ->required()
                                            ->numeric()
                                            ->prefix('m²')
                                            ->columnSpan(2),
                                        TextInput::make('capacity')
                                            ->required()
                                            ->numeric()
                                            ->suffix('orang')
                                            ->columnSpan(2),
                                        TextInput::make('price')
                                            ->label('Harga per Bulan')
                                            ->required()
                                            ->numeric()
                                            ->prefix('IDR')
                                            ->columnSpan(2),
                                        Toggle::make('is_available')
                                            ->label('Tersedia')
                                            ->required()
                                            ->columnSpan(2),
                                        Repeater::make('images')
                                            ->relationship('images')
                                            ->schema([
                                                FileUpload::make('image')
                                                    ->image()
                                                    ->directory('room-images')
                                                    ->required()
                                                    ->columnSpan(2),
                                            ]),
                                    ]),
                            ]),
                    ])
                    ->columnSpan(2),
            ]);
    }
}
