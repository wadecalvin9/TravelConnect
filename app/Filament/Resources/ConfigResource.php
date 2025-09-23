<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConfigResource\Pages;
use App\Models\Config;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ConfigResource extends Resource
{
    protected static ?string $model = Config::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('General Information')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('sitename')
                            ->label('Site Name')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('email')
                            ->label('Contact Email')
                            ->email()
                            ->required(),

                        Forms\Components\TextInput::make('phone')
                            ->label('Phone Number')
                            ->required(),

                        Forms\Components\TextInput::make('address')
                            ->label('Address')
                            ->required(),
                    ]),

                Forms\Components\Section::make('Social Media Links')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('facebook')
                            ->label('Facebook URL')
                            ->url()
                            ->nullable(),

                        Forms\Components\TextInput::make('twitter')
                            ->label('Twitter URL')
                            ->url()
                            ->nullable(),

                        Forms\Components\TextInput::make('instagram')
                            ->label('Instagram URL')
                            ->url()
                            ->nullable(),

                        Forms\Components\TextInput::make('youtube')
                            ->label('YouTube URL')
                            ->url()
                            ->nullable(),
                    ]),

                Forms\Components\Section::make('Hero Section')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('hero_image')
                            ->label('Hero Image URL')
                            ->required(),

                        Forms\Components\TextInput::make('hero_title')
                            ->label('Hero Title')
                            ->required(),

                        Forms\Components\Textarea::make('hero_description')
                            ->label('Hero Description')
                            ->rows(3)
                            ->required(),
                    ]),

                Forms\Components\Section::make('About Section')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('about_title')
                            ->label('About Title')
                            ->required(),

                        Forms\Components\TextInput::make('about_description')
                            ->label('About Description')
                            ->required(),

                        Forms\Components\Textarea::make('mission')
                            ->label('Mission Statement')
                            ->rows(3)
                            ->required(),

                        Textarea::make('vision')
                            ->label('Vision Statement')
                            ->rows(3)
                            ->required(),

                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sitename')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('email')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('phone'),
            ])
            ->filters([])
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListConfigs::route('/'),
            'create' => Pages\CreateConfig::route('/create'),
            'edit' => Pages\EditConfig::route('/{record}/edit'),
        ];
    }
}
