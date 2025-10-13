<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DestinationResource\Pages;
use App\Models\destination;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;

class DestinationResource extends Resource
{
    protected static ?string $model = destination::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-europe-africa';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                Textarea::make('description')->required(),
                TextInput::make('image')->required(),
                Select::make('category')
                    ->options([
                        'Beach Safari' => 'Beach Safari',
                        'Bush Safari' => 'Bush Safari',
                        'Day trips and excursions' => 'Day trips and excursions',
                    ])
                    ->required(),

                Section::make('Itinerary')
                    ->schema([
                        Repeater::make('itenerary')
                            ->label('Daily Schedule')
                            ->schema([
                                TextInput::make('Day'),
                                TextInput::make('Activity')
                            ])
                            ->columns(2)
                            ->createItemButtonLabel('Add Day'),
                    ]),

                Section::make('Gallery')
                    ->schema([
                        Repeater::make('gallery')
                            ->label('Gallery Images')
                            ->schema([
                                TextInput::make('image')
                                    ->label('Image URL')

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
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('description')->limit(10),
                ImageColumn::make('image'),
                TextColumn::make('category')->sortable()->searchable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),

                // 🟩 DUPLICATE ACTION
                Tables\Actions\Action::make('duplicate')
    ->label('Duplicate')
    ->icon('heroicon-o-document-duplicate')
    ->color('success')
    ->requiresConfirmation()
    ->action(function (destination $record, Tables\Actions\Action $action) {
        $new = $record->replicate();
        $new->name = $record->name . ' (Copy)';
        $new->save();

        return redirect()->route('filament.admin.resources.destinations.edit', $new);
    })
    ->successNotificationTitle('Destination duplicated and opened for editing!')
,
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
            'index' => Pages\ListDestinations::route('/'),
            'create' => Pages\CreateDestination::route('/create'),
            'edit' => Pages\EditDestination::route('/{record}/edit'),
        ];
    }
}
