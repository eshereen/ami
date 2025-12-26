<?php

namespace App\Filament\Resources\PowertypeValues\Pages;

use App\Filament\Resources\PowertypeValues\PowertypeValueResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPowertypeValues extends ListRecords
{
    protected static string $resource = PowertypeValueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
