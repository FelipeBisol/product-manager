<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->userName,
            'slug' => $this->faker->slug,
            'type_id' => ProductType::inRandomOrder()->first()->id,
            'description' => $this->faker->text,
            'image' => $this->faker->imageUrl,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
