<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InquiryResource\Pages;
use App\Models\inquiry;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;

class InquiryResource extends Resource
{
    protected static ?string $model = inquiry::class;

    protected static ?string $navigationIcon = 'heroicon-o-paper-airplane';

    // ---------------- FORM ----------------
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('fullname')->required(),
                TextInput::make('email')->email()->required(),
                TextInput::make('phone')->required(),
                TextInput::make('people')->numeric()->required(),
                TextInput::make('message')->nullable(),
                TextInput::make('date')->required(),

                // Destination relationship
                Select::make('destination_id')
                    ->relationship('destination', 'name')
                    ->required(),

                // Tour relationship
                Select::make('tour_id')
                    ->relationship('tour', 'name')
                    ->required(),

                // Only super admins can reassign inquiries
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->label('Submitted By')
                    ->searchable()
                    ->visible(fn () => auth()->user()?->hasRole('super_admin')),
            ]);
    }

    // ---------------- TABLE ----------------
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('fullname')->sortable()->searchable(),
                TextColumn::make('email')->sortable()->searchable(),
                TextColumn::make('phone')->sortable()->searchable(),
                TextColumn::make('people')->sortable()->searchable(),
                TextColumn::make('message')->limit(50)->sortable()->searchable(),
                TextColumn::make('date')->sortable()->searchable(),
                TextColumn::make('destination.name')->label('Destination')->sortable()->searchable(),
                TextColumn::make('tour.name')->label('Tour')->sortable()->searchable(),

                // Only visible for super admins
                TextColumn::make('user.name')
                    ->label('Submitted By')
                    ->sortable()
                    ->searchable()
                    ->visible(fn () => auth()->user()?->hasRole('super_admin')),
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


    // ---------------- DATA VISIBILITY ----------------
    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        // If not super_admin, only show user's inquiries
        if (!auth()->user()?->hasRole('super_admin')) {
            $query->where('user_id', auth()->id());
        }

        return $query;
    }

    public static function getRelations(): array
    {
        return [];
    }

    // ---------------- PAGES ----------------
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInquiries::route('/'),
            'create' => Pages\CreateInquiry::route('/create'),
            'edit' => Pages\EditInquiry::route('/{record}/edit'),
        ];
    }
}
