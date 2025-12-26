<?php

namespace App\Filament\Resources\Powers\Pages;

use App\Filament\Resources\Powers\PowerResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPower extends ViewRecord
{
    protected static string $resource = PowerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
