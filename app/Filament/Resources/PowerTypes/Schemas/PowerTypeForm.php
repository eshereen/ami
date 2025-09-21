<?php

namespace App\Filament\Resources\PowerTypes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
class PowerTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('product.name')
                    ->required()
                    ->relationship('product', 'name'),
                TextInput::make('name'),
                TextInput::make('value'),
                Textarea::make('note')
                    ->columnSpanFull(),
            ]);
    }
}
