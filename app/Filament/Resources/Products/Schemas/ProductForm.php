<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Filament\Forms\Components\WebPFileUpload;
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
                 Select::make('subcategory_id')
                    ->required()
                    ->relationship('subcategory', 'brand')
                    ->searchable()
                    ->preload(),
                       
                TextInput::make('name'),
                  
                TextInput::make('ami_model')
                    ->label('AMI Model'),
                TextInput::make('engine')
                    ->label('Engine')
                    ->placeholder('e.g., Perkins, Doosan'),
               
                ])->columns(4)->columnSpanFull(),
                Section::make('Product Images')
                ->schema([
                Textarea::make('description')
                    ->columnSpanFull(),
                WebPFileUpload::make('image')
                    ->thumbnail()
                    ->webpQuality(90),
                ])->columns(2)->columnSpanFull(),
                Section::make('Product Specifications')
                ->schema([
                TextInput::make('fuel_type'),
                TextInput::make('frequency'),
                ])->columns(2)->columnSpanFull(),
                Section::make('Product Status')
                ->schema([
                Toggle::make('status')
                    ->default('active'),
                ])->columns(3)->columnSpanFull(),
            ]);
    }
}
