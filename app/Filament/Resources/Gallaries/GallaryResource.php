<?php

namespace App\Filament\Resources\Gallaries;

use App\Filament\Resources\Gallaries\Pages\CreateGallary;
use App\Filament\Resources\Gallaries\Pages\EditGallary;
use App\Filament\Resources\Gallaries\Pages\ListGallaries;
use App\Filament\Resources\Gallaries\Pages\ViewGallary;
use App\Filament\Resources\Gallaries\Schemas\GallaryForm;
use App\Filament\Resources\Gallaries\Schemas\GallaryInfolist;
use App\Filament\Resources\Gallaries\Tables\GallariesTable;
use App\Models\Gallary;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class GallaryResource extends Resource
{
    protected static ?string $model = Gallary::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Gallary';

    public static function form(Schema $schema): Schema
    {
        return GallaryForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return GallaryInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GallariesTable::configure($table);
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
            'index' => ListGallaries::route('/'),
            'create' => CreateGallary::route('/create'),
            'view' => ViewGallary::route('/{record}'),
            'edit' => EditGallary::route('/{record}/edit'),
        ];
    }
}
