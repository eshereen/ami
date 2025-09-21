<?php

namespace App\Filament\Resources\Subcategories\Schemas;

use Filament\Forms\Components\FileUpload;
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
                    ->required(),

                Select::make('category.name')
                    ->required()
                    ->relationship('category', 'name'),
                FileUpload::make('image')
                    ->image()->imageEditor()->disk('public')->columnSpanFull(),
                Textarea::make('description')
                    ->columnSpanFull(),
                Textarea::make('overview')
                    ->columnSpanFull(),
                    Toggle::make('status')
                    ->default('active'),
            ])->columns(2)->columnSpanFull(),
        ]);
    }
}
