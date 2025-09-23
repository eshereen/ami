<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ProductInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('slug'),
                TextEntry::make('model_name'),
                TextEntry::make('subcategory.name'),


                TextEntry::make('description')
                    ->placeholder('-')
                    ->columnSpanFull(),
                ImageEntry::make('image')
                    ->disk('public')

                    ->placeholder('-'),
                TextEntry::make('fuel_type')
                    ->placeholder('-'),
                TextEntry::make('frequency')
                    ->placeholder('-'),
                TextEntry::make('status'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
