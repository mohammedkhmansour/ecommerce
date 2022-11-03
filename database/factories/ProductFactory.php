<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->words(5,true);

        return [
            'name'                    => $name,
            'slug'                    => Str::slug($name),
            'description'             => $this->faker->sentence(15),
            'image'                   => $this->faker->imageUrl(400,400),
            'price'                   => $this->faker->randomFloat(1,1,499),
            'compare_price'           => $this->faker->randomFloat(1,500,999),
            'featured'                => rand(0,1),
            'category_id'             =>Category::inRandomOrder()->first()->id,
            'quantity'                => rand(1,100),

            'product_code'            => $this->faker->randomFloat(100,9999),

        ];
    }
}
