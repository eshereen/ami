<?php

namespace App\Filament\Resources\Powers\Pages;

use App\Filament\Resources\Powers\PowerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPowers extends ListRecords
{
    protected static string $resource = PowerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
