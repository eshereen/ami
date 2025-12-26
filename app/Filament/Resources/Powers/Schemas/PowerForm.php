<?php

namespace App\Filament\Resources\Powers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PowerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
            ]);
    }
}
