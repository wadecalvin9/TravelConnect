<?php

namespace App\Filament\Resources\ThingToDoResource\Pages;

use App\Filament\Resources\ThingToDoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateThingToDo extends CreateRecord
{
    protected static string $resource = ThingToDoResource::class;
}
