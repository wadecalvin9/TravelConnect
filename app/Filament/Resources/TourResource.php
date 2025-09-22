<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TourResource\Pages;
use App\Models\Tour;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class TourResource extends Resource
{
    protected static ?string $model = Tour::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Tour Details')
                    ->schema([
                        Select::make('destination_id')
                            ->label('Destination')
                            ->relationship('destination', 'name')
                            ->required(),
                        TextInput::make('name')
                            ->label('Tour Name')
                            ->required(),
                        TextInput::make('description')
                            ->label('Description')
                            ->required(),
                        TextInput::make('image')
                            ->label('Main Image URL')
                            ->required(),
                        TextInput::make('price')
                            ->label('Price'),
                        TextInput::make('duration')
                            ->label('Duration'),
                        Checkbox::make('special')
                            ->label('Special Tour'),
                        Checkbox::make('popular')
                            ->label('Popular Tour'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Itinerary')
                    ->schema([
                        Repeater::make('itenary')
                            ->label('Daily Schedule')
                            ->schema([
                                TextInput::make('Day')->required(),
                                TextInput::make('Activity')->required(),
                            ])
                            ->columns(2)
                            ->createItemButtonLabel('Add Day'),
                    ]),

                Forms\Components\Section::make('Gallery')
                    ->schema([
                        Repeater::make('images')
                            ->label('Gallery Images')
                            ->schema([
                                TextInput::make('image')
                                    ->label('Image URL')
                                    ->required(),
                            ])
                            ->columns(1)
                            ->createItemButtonLabel('Add Image'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('destination.name')
                    ->label('Destination')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('name')
                    ->label('Tour Name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('price')
                    ->label('Price'),
                TextColumn::make('duration')
                    ->label('Duration'),
                TextColumn::make('special')
                    ->label('Special'),
                TextColumn::make('popular')
                    ->label('Popular'),
                ImageColumn::make('image')
                    ->label('Main Image'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTours::route('/'),
            'create' => Pages\CreateTour::route('/create'),
            'edit' => Pages\EditTour::route('/{record}/edit'),
        ];
    }
}
