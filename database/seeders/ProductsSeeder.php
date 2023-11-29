<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    public function run(): void
    {
        Product::query()->delete();

        Product::factory()->create(['name' => 'Do Mil ao Milhão', 'type_id' => 1]);
        Product::factory()->create(['name' => 'Carreira e Desenvolvimento Pessoal', 'type_id' => 1]);
        Product::factory()->create(['name' => 'Saúde e esportes', 'type_id' => 1]);

        Product::factory()->create(['name' => 'Combo Nigori', 'type_id' => 2]);
        Product::factory()->create(['name' => 'Combo Sayonara', 'type_id' => 2]);

        Product::factory()->create(['name' => 'Camiseta New Era', 'type_id' => 3]);
        Product::factory()->create(['name' => 'Camiseta Spurs', 'type_id' => 3]);
        Product::factory()->create(['name' => 'Camiseta Default Color', 'type_id' => 3]);
        Product::factory()->create(['name' => 'Camiseta Foto Personalizável', 'type_id' => 3]);
    }
}
