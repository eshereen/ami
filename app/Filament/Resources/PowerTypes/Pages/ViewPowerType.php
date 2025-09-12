<?php

namespace App\Filament\Resources\PowerTypes\Pages;

use App\Filament\Resources\PowerTypes\PowerTypeResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPowerType extends ViewRecord
{
    protected static string $resource = PowerTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
