<?php

namespace App\Filament\Resources\Gallaries\Schemas;

use App\Filament\Forms\Components\WebPFileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
class GallaryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Gallary Details')
                ->schema([
                Select::make('product.name')
                    ->required()
                    ->relationship('product', 'name'),
                TextInput::make('name'),

                TextInput::make('description'),

                WebPFileUpload::make('image')
                    ->gallery()
                    ->webpQuality(85)
                    ->required(),
                Toggle::make('status')
                    ->default('active'),
            ])->columns(2)->columnSpanFull(),
        ]);

    }
}
