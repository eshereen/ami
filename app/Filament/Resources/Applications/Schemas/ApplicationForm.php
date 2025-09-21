<?php

namespace App\Filament\Resources\Applications\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
class ApplicationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Application Details')
                ->schema([
                Select::make('product.name')
                    ->required()
                    ->relationship('product', 'name'),
                TextInput::make('name'),
                Textarea::make('description')
                    ->columnSpanFull(),
            ])->columns(2)->columnSpanFull(),
        ]);

    }
}
