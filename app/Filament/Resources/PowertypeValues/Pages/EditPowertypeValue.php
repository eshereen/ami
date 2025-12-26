<?php

namespace App\Filament\Resources\PowertypeValues\Pages;

use App\Filament\Resources\PowertypeValues\PowertypeValueResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPowertypeValue extends EditRecord
{
    protected static string $resource = PowertypeValueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
