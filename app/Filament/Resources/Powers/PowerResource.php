<?php

namespace App\Filament\Resources\Powers;

use App\Filament\Resources\Powers\Pages\CreatePower;
use App\Filament\Resources\Powers\Pages\EditPower;
use App\Filament\Resources\Powers\Pages\ListPowers;
use App\Filament\Resources\Powers\Pages\ViewPower;
use App\Filament\Resources\Powers\Schemas\PowerForm;
use App\Filament\Resources\Powers\Schemas\PowerInfolist;
use App\Filament\Resources\Powers\Tables\PowersTable;
use App\Models\Power;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class PowerResource extends Resource
{
    protected static ?string $model = Power::class;

    protected static \UnitEnum|string|null $navigationGroup = 'Products Details';

    public static function form(Schema $schema): Schema
    {
        return PowerForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PowerInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PowersTable::configure($table);
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
            'index' => ListPowers::route('/'),
            'create' => CreatePower::route('/create'),
            'view' => ViewPower::route('/{record}'),
            'edit' => EditPower::route('/{record}/edit'),
        ];
    }
}
