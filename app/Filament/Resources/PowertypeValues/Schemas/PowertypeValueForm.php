<?php

namespace App\Filament\Resources\PowertypeValues\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PowertypeValueForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                
                Select::make('powertype_id')
                    ->label('Power Type')
                    ->required()
                    ->relationship('powertype', 'name', function ($query) {
                        return $query->with('power');
                    })
                    ->getOptionLabelFromRecordUsing(fn ($record) => "{$record->power->name} - {$record->name}")
                    ->searchable()
                    ->preload()
                    ->helperText('Select the power category (Standby/Prime) and type (KVA/KW)'),
                  
                TextInput::make('value')
                    ->label('Value')
                    ->numeric()
                    ->required()
                    ->helperText('Enter the numeric value for this power type'),
                Select::make('product_id')
                    ->label('Product')
                    ->relationship('product', 'ami_model')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->helperText('Select the product this power value belongs to'),
            ]);
    }
}
