<?php

namespace App\Filament\Resources\Product\ProductResource\Pages;

use App\Filament\Resources\Product\ProductResource;
use Filament\Actions;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Pages\EditRecord;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;
    protected static ?string $title = 'Editar produto';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(['default' => 1, 'sm' => 3, 'xl' => 6, '2xl' => 8])
                    ->schema([
                        TextInput::make('name')->label(__('Nome'))->columnSpan(['sm' => 2, 'xl' => 3, '2xl' => 3])
                            ->live()
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', \Str::slug($state))),
                        TextInput::make('slug')->columnSpan(['sm' => 2, 'xl' => 3, '2xl' => 3])->readOnly(),
                        Select::make('type_id')->label(__('Selecionar tipo'))->columnSpan(['sm' => 2, 'xl' => 3, '2xl' => 6])->relationship('type', 'name')->preload()->createOptionForm([TextInput::make('name')->required()])->native(false),
                        FileUpload::make('image')->label(__('Imagem'))->columnSpan(['sm' => 2, 'xl' => 3, '2xl' => 12])->image()->disk('public')->visibility('public'),
                    ]),
                MarkdownEditor::make('description')->label(__('Descrição'))->columnSpan(['sm' => 2, 'xl' => 3, '2xl' => 2]),
            ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
