<?php

namespace App\Filament\Resources\Services\Schemas;

use App\Models\Service;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\FileUpload;

class ServicesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Services Details')
                ->schema([
                TextInput::make('name')
                    ->required(),

                Textarea::make('description')
                    ->required(),
                FileUpload::make('image')
                    ->image()
                    ->imageEditor()
                    ->disk('public'),
                Toggle::make('status')
                ->options([
                    Service::STATUS_ACTIVE => 'Active',
                    Service::STATUS_INACTIVE => 'Inactive',
                ])
                    ->required(),
            ])->columns(2)->columnSpanFull(),
        ]);
    }
}
