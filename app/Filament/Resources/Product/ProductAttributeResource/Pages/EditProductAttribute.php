<?php

namespace App\Filament\Resources\Product\ProductAttributeResource\Pages;

use App\Filament\Resources\Product\ProductAttributeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProductAttribute extends EditRecord
{
    protected static string $resource = ProductAttributeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
