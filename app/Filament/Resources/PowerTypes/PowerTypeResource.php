<?php

namespace App\Filament\Resources\PowerTypes;

use App\Filament\Resources\PowerTypes\Pages\CreatePowerType;
use App\Filament\Resources\PowerTypes\Pages\EditPowerType;
use App\Filament\Resources\PowerTypes\Pages\ListPowerTypes;
use App\Filament\Resources\PowerTypes\Pages\ViewPowerType;
use App\Filament\Resources\PowerTypes\Schemas\PowerTypeForm;
use App\Filament\Resources\PowerTypes\Schemas\PowerTypeInfolist;
use App\Filament\Resources\PowerTypes\Tables\PowerTypesTable;
use App\Models\PowerType;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PowerTypeResource extends Resource
{
    protected static ?string $model = PowerType::class;
    protected static string | UnitEnum   | null $navigationGroup = 'Products Details';



    public static function form(Schema $schema): Schema
    {
        return PowerTypeForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PowerTypeInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PowerTypesTable::configure($table);
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
            'index' => ListPowerTypes::route('/'),
            'create' => CreatePowerType::route('/create'),
            'view' => ViewPowerType::route('/{record}'),
            'edit' => EditPowerType::route('/{record}/edit'),
        ];
    }
}
