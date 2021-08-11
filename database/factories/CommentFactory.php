<?php

namespace Database\Factories;

use App\Models\Blog\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    #[ArrayShape([
        'user_id' => "int",
        'parent_id' => "null",
        'commentable_type' => "string",
        'commentable_id' => "int",
        'body' => "string"
    ])]
    public function definition(): array
    {
        return [
            'user_id' => rand(1, User::query()->count()),
            'parent_id' => null,
            'commentable_type' => 'article',
            'commentable_id' => rand(1, Article::query()->count()),
            'body' => $this->faker->realText(rand(50, 1000))
        ];
    }
}
