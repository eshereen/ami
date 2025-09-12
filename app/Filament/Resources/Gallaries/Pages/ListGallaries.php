<?php

namespace App\Filament\Resources\Gallaries\Pages;

use App\Filament\Resources\Gallaries\GallaryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGallaries extends ListRecords
{
    protected static string $resource = GallaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
