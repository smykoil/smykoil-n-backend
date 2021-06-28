<?php

namespace Database\Factories\Blog;

use App\Models\Blog\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $title = $this->faker->unique()->realText(rand(40, 80));
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->realText(rand(100, 180)),
        ];
    }
}
