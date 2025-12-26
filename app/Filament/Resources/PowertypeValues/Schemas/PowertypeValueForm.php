<?php

namespace App\Filament\Resources\PowertypeValues\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PowertypeValueForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('powertype_id')
                    ->required()
                  ->relationship('powertype', 'name')
                  ->searchable()
                  ->preload(),
                  
                TextInput::make('value')
                    ->numeric(),
                Select::make('product_id')
                    ->relationship('product', 'ami_model')
                    ->searchable()
                    ->preload(),
            ]);
    }
}
