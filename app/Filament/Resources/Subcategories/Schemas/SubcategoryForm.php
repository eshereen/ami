<?php

namespace App\Filament\Resources\Subcategories\Schemas;

use App\Filament\Forms\Components\WebPFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
class SubcategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Subcategory Details')
                ->schema([
                TextInput::make('name')
                    ->label('Name')
                    ->required(),

                Select::make('category.name')
                    ->required()
                    ->relationship('category', 'name'),
                WebPFileUpload::make('image')
                    ->label('Subcategory Image')
                    ->image()
                    ->imageEditor()
                    ->disk('public')
                    ->webpQuality(90)
                    ->columnSpanFull(),
                Textarea::make('description')
                    ->columnSpanFull(),
                Textarea::make('overview')
                    ->columnSpanFull(),
                ])->columns(3)->columnSpanFull(),
                Section::make('Subcategory Status')
                ->schema([
                    Toggle::make('status')
                    ->default('active'),
                ])->columnSpanFull(),
        ]);
    }
}
