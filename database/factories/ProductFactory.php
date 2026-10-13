<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<Product> */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $name = fake()->unique()->words(3, true);

        return [
            'category_id' => Category::query()->inRandomOrder()->value('id') ?? Category::factory(),
            'created_by' => User::query()->where('role', 'admin')->value('id'),
            'name' => Str::title($name),
            'slug' => Str::slug($name) . '-' . fake()->unique()->numberBetween(100, 999999),
            'description' => fake()->sentence(12),
            'price' => fake()->numberBetween(15000, 1500000),
            'stock' => fake()->numberBetween(0, 120),
            'image_url' => null,
            'is_active' => fake()->boolean(90),
        ];
    }
}
