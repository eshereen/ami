<?php

namespace App\Filament\Resources\Products\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),

                TextColumn::make('ami_model')
                    ->label('AMI Model')
                    ->searchable(),
                TextColumn::make('engine')
                    ->label('Engine')
                    ->searchable()
                    ->default('N/A'),
                TextColumn::make('subcategory.name')

                    ->sortable(),
                ImageColumn::make('image')
                    ->disk('public')
                    ->width(80),
                TextColumn::make('fuel_type')
                    ->searchable(),
                TextColumn::make('frequency')
                    ->searchable(),
                BadgeColumn::make('status')
                    ->colors([
                        'success' => 1,
                        'danger' => 0,
                    ])
                    ->formatStateUsing(fn ($state): string => $state ? 'Active' : 'Inactive')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
