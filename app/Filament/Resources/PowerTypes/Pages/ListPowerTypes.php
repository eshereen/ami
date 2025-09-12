<?php

namespace App\Filament\Resources\PowerTypes\Pages;

use App\Filament\Resources\PowerTypes\PowerTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPowerTypes extends ListRecords
{
    protected static string $resource = PowerTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
