<?php

namespace App\Filament\Resources\Products\RelationManagers;

use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Schemas\Schema;

class PowertypeValuesRelationManager extends RelationManager
{
    protected static string $relationship = 'powertype_values';

    protected static ?string $title = 'Power Type Values';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\Select::make('powertype_id')
                    ->label('Power Type')
                    ->relationship('powertype', 'name', function ($query) {
                        return $query->with('power');
                    })
                    ->getOptionLabelFromRecordUsing(fn ($record) => "{$record->power->name} - {$record->name}")
                    ->required()
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        Forms\Components\Select::make('power_id')
                            ->label('Power Category')
                            ->relationship('power', 'name')
                            ->required()
                            ->searchable()
                            ->preload(),
                        Forms\Components\TextInput::make('name')
                            ->label('Type Name (e.g., KVA, KW)')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('note')
                            ->label('Note')
                            ->columnSpanFull(),
                    ]),
                Forms\Components\TextInput::make('value')
                    ->label('Value')
                    ->numeric()
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('value')
            ->columns([
                Tables\Columns\TextColumn::make('powertype.power.name')
                    ->label('Power Category')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('powertype.name')
                    ->label('Type')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('value')
                    ->label('Value')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('powertype.power_id')
                    ->label('Power Category')
                    ->relationship('powertype.power', 'name'),
            ])
            ->headerActions([
                \Filament\Actions\CreateAction::make(),
            ])
            ->actions([
                \Filament\Actions\EditAction::make(),
                \Filament\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                \Filament\Actions\BulkActionGroup::make([
                    \Filament\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('powertype.power.name');
    }
}
