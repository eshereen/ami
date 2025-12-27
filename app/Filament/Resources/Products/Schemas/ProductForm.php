<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Filament\Forms\Components\WebPFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
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
                    ->label('Subcategory / Brand')
                    ->required()
                    ->relationship('subcategory', 'name')
                    ->searchable(),
                       
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
                
                Section::make('Power Type Values')
                    ->description('Add power specifications for this product (Standby/Prime KVA/KW)')
                    ->schema([
                        Repeater::make('powertype_values')
                            ->relationship('powertype_values')
                            ->schema([
                                Select::make('powertype_id')
                                    ->label('Power Type')
                                    ->required()
                                    ->relationship('powertype', 'name', function ($query) {
                                        return $query->with('power');
                                    })
                                    ->getOptionLabelFromRecordUsing(fn ($record) => "{$record->power->name} - {$record->name}")
                                    ->searchable()
                                    ->preload()
                                    ->columnSpan(1),
                                    
                                TextInput::make('value')
                                    ->label('Value')
                                    ->numeric()
                                    ->required()
                                    ->columnSpan(1),
                            ])
                            ->columns(2)
                            ->addActionLabel('Add Power Type Value')
                            ->defaultItems(0)
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => 
                                isset($state['powertype_id']) && isset($state['value']) 
                                    ? "Value: {$state['value']}" 
                                    : null
                            ),
                    ])
                    ->collapsible()
                    ->collapsed(false)
                    ->columnSpanFull(),
                
                Section::make('Product Status')
                ->schema([
                Toggle::make('status')
                    ->default('active'),
                ])->columns(3)->columnSpanFull(),
            ]);
    }
}
