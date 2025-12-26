<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use App\Filament\Forms\Components\WebPFileUpload;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Category Details')
                ->schema([
                    TextInput::make('name')
                        ->required(),
                    WebPFileUpload::make('image')
                        ->label('Category Image')
                        ->image()
                        ->imageEditor()
                        ->disk('public')
                        ->webpQuality(90)
                        ->columnSpanFull(),
                ])->columns(2)->columnSpanFull(),
        ]);
    }
}
