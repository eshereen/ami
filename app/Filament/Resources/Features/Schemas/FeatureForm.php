<?php

namespace App\Filament\Resources\Features\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
class FeatureForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Feature Details')
                ->schema([
                Select::make('product_id')
                    ->required()
                    ->relationship('product', 'name'),
                TextInput::make('name'),
                Textarea::make('description')
                    ->columnSpanFull(),
            ])->columns(2)->columnSpanFull(),
        ]);
    }
}
