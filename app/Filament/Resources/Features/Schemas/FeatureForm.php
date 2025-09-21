<?php

namespace App\Filament\Resources\Features\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
class FeatureForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('product.name')
                    ->required()
                    ->relationship('product', 'name'),
                TextInput::make('name'),
                Textarea::make('description')
                    ->columnSpanFull(),
            ]);
    }
}
