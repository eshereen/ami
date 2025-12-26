<?php

namespace App\Filament\Resources\PowertypeValues\Pages;

use App\Filament\Resources\PowertypeValues\PowertypeValueResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPowertypeValue extends ViewRecord
{
    protected static string $resource = PowertypeValueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
