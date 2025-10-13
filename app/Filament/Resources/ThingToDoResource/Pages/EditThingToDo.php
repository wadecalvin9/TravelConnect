<?php

namespace App\Filament\Resources\ThingToDoResource\Pages;

use App\Filament\Resources\ThingToDoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditThingToDo extends EditRecord
{
    protected static string $resource = ThingToDoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
