<?php

namespace App\Filament\Resources\Gallaries\Pages;

use App\Filament\Resources\Gallaries\GallaryResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewGallary extends ViewRecord
{
    protected static string $resource = GallaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
