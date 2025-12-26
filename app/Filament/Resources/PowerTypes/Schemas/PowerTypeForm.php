<?php

namespace App\Filament\Resources\PowerTypes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
class PowerTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Power Type Details')
                ->schema([
                Select::make('power_id')
                ->relationship('power', 'name')
                ->searchable()
                ->preload(),
                TextInput::make('name'),
                Textarea::make('note')
                    ->columnSpanFull(),
            ])->columns(3)->columnSpanFull(),
        ]);
    }
}
