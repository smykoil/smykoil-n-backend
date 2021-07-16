<?php

declare(strict_types=1);

namespace Database\Factories\Blog;

use App\Models\Blog\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

class PostFactory extends Factory
{
    protected $model = Post::class;

    #[ArrayShape(['content' => "string"])]
    public function definition(): array
    {
        $content = $this->faker->realText(rand(1000, 2000));
        return [
            'content' => $content,
        ];
    }
}
