<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Category Details')

    ->schema([
                TextInput::make('name')
                    ->required(),
               
            ])->columns(2)->columnSpanFull(),
        ]);
    }
}
