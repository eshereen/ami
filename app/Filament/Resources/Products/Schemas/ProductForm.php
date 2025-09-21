<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Product Details')
                ->schema([
                TextInput::make('name')
                    ->required(),
                TextInput::make('model_name')
                    ->required(),
                Select::make('subcategory.name')
                    ->required()
                    ->relationship('subcategory', 'name'),
                Textarea::make('description')
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->image(),
                TextInput::make('fuel_type'),
                TextInput::make('frequency'),
                Toggle::make('status')
                    ->default('active'),
            ])->columns(3)->columnSpanFull(),
        ]);
    }
}
