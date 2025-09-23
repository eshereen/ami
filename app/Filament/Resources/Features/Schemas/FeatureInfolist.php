<?php

namespace App\Filament\Resources\Features\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Infolists\Components\TextEntry;

class FeatureInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('product.name'),

                TextEntry::make('name')
                    ->placeholder('-'),
                TextEntry::make('description')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
