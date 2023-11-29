<?php

namespace Database\Seeders;

use App\Models\ProductType;
use Illuminate\Database\Seeder;

class ProductTypesSeeder extends Seeder
{
    public function run(): void
    {
        ProductType::query()->delete();

        ProductType::factory(1)->create(['name' => 'Curso']);
        ProductType::factory(1)->create(['name' => 'Combinado Sushi']);
        ProductType::factory(1)->create(['name' => 'Camiseta Oversized']);
    }
}
