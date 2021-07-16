<?php

declare(strict_types=1);

namespace Database\Factories\Blog;

use App\Models\Blog\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\ArrayShape;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    #[ArrayShape([
        'title' => "string",
        'slug' => "string",
        'description' => "string"
    ])]
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
