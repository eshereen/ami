<?php

namespace App\Filament\Resources\Gallaries\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Toggle;
class GallaryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('product.name')
                    ->required()
                    ->relationship('product', 'name'),
                TextInput::make('name'),
                TextInput::make('description'),
                FileUpload::make('image')
                    ->image()
                    ->imageEditor()
                    ->disk('public')
                    ->required(),
                Toggle::make('status')
                    ->default('active'),
            ]);
    }
}
