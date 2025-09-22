<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Dom\Text;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('email')->email()->required(),
                TextInput::make('password')->required()->password(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('email')->sortable()->searchable(),
                TextColumn::make('created_at')->dateTime(),
                TextColumn::make('updated_at')->dateTime(),
                TextColumn::make('roles.name')
                    ->label('Roles')
                    ->badge()
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),

                // Row action: assign role to a single user
                Tables\Actions\Action::make('assignRole')
                    ->label('Assign Role')
                    ->icon('heroicon-o-key')
                    ->form([
                        Select::make('role')
                            ->label('Role')
                            ->options(\Spatie\Permission\Models\Role::pluck('name', 'id'))
                            ->required(),
                    ])
                    ->action(function ($record, $data) {
                        $role = \Spatie\Permission\Models\Role::findById($data['role']);
                        $record->syncRoles([$role->name]); // replace old roles
                        // Or use ->assignRole($role->name) to add without removing
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),

                    // Bulk action: assign role to multiple users
                    Tables\Actions\BulkAction::make('assignRole')
                        ->label('Assign Role')
                        ->icon('heroicon-o-key')
                        ->form([
                            Select::make('role')
                                ->label('Role')
                                ->options(\Spatie\Permission\Models\Role::pluck('name', 'id'))
                                ->required(),
                        ])
                        ->action(function ($records, $data) {
                            $role = \Spatie\Permission\Models\Role::findById($data['role']);
                            foreach ($records as $user) {
                                $user->syncRoles([$role->name]);
                                // Or $user->assignRole($role->name);
                            }
                        }),
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
            'index'  => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit'   => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
