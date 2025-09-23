<?php

namespace App\Filament\Resources\Blogs\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
class BlogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Blog Details')
                ->schema([
                Select::make('user.name')
                    ->required()
                    ->relationship('user', 'name'),
                TextInput::make('title')
                    ->required(),
                Textarea::make('content')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->image()->imageEditor()->disk('public')->columnSpanFull(),
                ])->columns(2)->columnSpanFull(),
                Section::make('Blog Status')
                ->schema([
                Toggle::make('status')
                    ->required(),
                ])->columnSpanFull(),
            ]);
    }
}
