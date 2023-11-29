<?php

namespace App\Filament\Resources\Product\ProductAttributeResource\RelationManagers;

use App\Models\Attribute;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AttributesRelationManager extends RelationManager
{
    protected static string $relationship = 'attributes';
    protected static ?string $title = 'Atributos do produto';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('attribute_id')
                    ->relationship('attributes', 'name')
                    ->options(Attribute::all()->mapWithKeys(fn(Attribute $attribute) => [$attribute->id => $attribute->name])->toArray())
                    ->createOptionForm([TextInput::make('name')->required()])
                    ->native(false)
                    ->reactive()
                    ->required()
                    ->label(__("Nome do atributo")),
                Forms\Components\TextInput::make('value')
                    ->label(__("Valor do atributo"))
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                TextColumn::make('attribute.name')->label(__('Nome do atributo')),
                TextColumn::make('value')->label(__('Valor do atributo'))->limit(80),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()->label(__('Adicionar atributo ao produto')),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
