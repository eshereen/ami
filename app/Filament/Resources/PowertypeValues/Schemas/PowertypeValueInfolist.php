<?php

namespace App\Filament\Resources\PowertypeValues\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PowertypeValueInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('powertype_id')
                    ->numeric(),
                TextEntry::make('value')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('product_id')
                    ->numeric()
                    ->placeholder('-'),
            ]);
    }
}
