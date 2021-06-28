<?php

namespace Database\Factories\Blog;

use App\Models\Blog\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $content = $this->faker->realText(rand(1000, 2000));
        return [
            'content' => $content,
        ];
    }
}
