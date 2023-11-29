<?php

namespace App\Filament\Resources\Product\ProductAttributeResource\Pages;

use App\Filament\Resources\Product\ProductAttributeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProductAttribute extends CreateRecord
{
    protected static string $resource = ProductAttributeResource::class;
}
