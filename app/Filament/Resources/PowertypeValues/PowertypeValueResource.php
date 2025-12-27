<?php

namespace App\Filament\Resources\PowertypeValues;

use App\Filament\Resources\PowertypeValues\Pages\CreatePowertypeValue;
use App\Filament\Resources\PowertypeValues\Pages\EditPowertypeValue;
use App\Filament\Resources\PowertypeValues\Pages\ListPowertypeValues;
use App\Filament\Resources\PowertypeValues\Pages\ViewPowertypeValue;
use App\Filament\Resources\PowertypeValues\Schemas\PowertypeValueForm;
use App\Filament\Resources\PowertypeValues\Schemas\PowertypeValueInfolist;
use App\Filament\Resources\PowertypeValues\Tables\PowertypeValuesTable;
use App\Models\PowertypeValue;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class PowertypeValueResource extends Resource
{
    protected static ?string $model = PowertypeValue::class;

    protected static \UnitEnum|string|null $navigationGroup = 'Products Details';

    public static function form(Schema $schema): Schema
    {
        return PowertypeValueForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PowertypeValueInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PowertypeValuesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPowertypeValues::route('/'),
            'create' => CreatePowertypeValue::route('/create'),
            'view' => ViewPowertypeValue::route('/{record}'),
            'edit' => EditPowertypeValue::route('/{record}/edit'),
        ];
    }
}
