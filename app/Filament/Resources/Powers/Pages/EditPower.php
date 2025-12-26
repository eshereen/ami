<?php

namespace App\Filament\Resources\Powers\Pages;

use App\Filament\Resources\Powers\PowerResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPower extends EditRecord
{
    protected static string $resource = PowerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
