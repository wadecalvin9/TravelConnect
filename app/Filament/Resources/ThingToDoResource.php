<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ThingToDoResource\Pages;
use App\Models\ThingToDo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ThingToDoResource extends Resource
{
    protected static ?string $model = ThingToDo::class;

    // 🧭 Sidebar Navigation Settings
    protected static ?string $navigationIcon = 'heroicon-o-star';
    protected static ?string $navigationLabel = 'Activity';
    protected static ?string $pluralLabel = 'Activities';
    protected static ?string $modelLabel = 'Activity';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('destination_id')
                ->label('Destination')
                ->relationship('destination', 'name')
                ->searchable()
                ->preload()
                ,

            Forms\Components\Select::make('tour_id')
                ->label('Tour')
                ->relationship('tour', 'name')
                ->searchable()
                ->preload()
                ,

            Forms\Components\TextInput::make('title')
                ->label('Activity Title')
                ->placeholder('e.g. Snorkeling Adventure')
                ->required()
                ->maxLength(255),

            Forms\Components\Textarea::make('description')
                ->label('Activity Description')
                ->placeholder('Briefly describe what this activity involves...')
                ->rows(4)
                ->required(),

            Forms\Components\TextInput::make('image')
                ->label('Image URL')
                ->placeholder('https://example.com/activity.jpg')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('destination.name')
                    ->label('Destination')
                    ->sortable()
                    ->badge()
                    ->color('info'),

                Tables\Columns\TextColumn::make('tour.name')
                    ->label('Tour')
                    ->sortable()
                    ->badge()
                    ->color('success'),

                Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
                    ->circular(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('M d, Y')
                    ->sortable()
                    ->color('gray'),
            ])
            ->filters([])

            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])

            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListThingToDos::route('/'),
            'create' => Pages\CreateThingToDo::route('/create'),
            'edit' => Pages\EditThingToDo::route('/{record}/edit'),
        ];
    }
}
