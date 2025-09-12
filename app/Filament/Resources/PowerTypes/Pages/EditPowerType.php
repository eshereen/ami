<?php

namespace App\Filament\Resources\PowerTypes\Pages;

use App\Filament\Resources\PowerTypes\PowerTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPowerType extends EditRecord
{
    protected static string $resource = PowerTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
