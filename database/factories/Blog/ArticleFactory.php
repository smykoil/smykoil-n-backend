<?php

declare(strict_types=1);

namespace Database\Factories\Blog;

use App\Models\Blog\Article;
use App\Models\Blog\Category;
use App\Models\Blog\Document;
use App\Models\Blog\Exhibition;
use App\Models\Blog\Post;
use App\Models\Blog\Presentation;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    #[ArrayShape([
        'category_id' => "int",
        'title' => "string",
        'excerpt' => "string",
        'is_published' => "int",
        'post_id' => "int",
        'post_type' => "string"
    ])]
    public function definition(): array
    {
        $count = Category::query()->count();
        $type = rand(1,4);
        return [
            'category_id' => rand(1, $count),

            'title' => $this->faker->realText(rand(40, 80)),
            'excerpt' => $this->faker->realText(247) . '...',
            'is_published' => rand(0,1),

            'post_id' => match ($type) {
                1 => rand(1,Document::query()->count()),
                2 => rand(1,Exhibition::query()->count()),
                3 => rand(1,Post::query()->count()),
                4 => rand(1,Presentation::query()->count()),
            },
            'post_type' => match ($type) {
                1 => Document::class,
                2 => Exhibition::class,
                3 => Post::class,
                4 => Presentation::class,
            },
        ];
    }
}
