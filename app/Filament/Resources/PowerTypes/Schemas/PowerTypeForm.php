<?php

namespace App\Filament\Resources\PowerTypes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PowerTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('product_id')
                    ->required()
                    ->numeric(),
                TextInput::make('name'),
                TextInput::make('value'),
                Textarea::make('note')
                    ->columnSpanFull(),
            ]);
    }
}
