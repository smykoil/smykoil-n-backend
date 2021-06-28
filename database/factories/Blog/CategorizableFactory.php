<?php

namespace Database\Factories\Blog;

use App\Models\Blog\Categorizable;
use App\Models\Blog\Category;
use App\Models\Blog\Document;
use App\Models\Blog\Exhibition;
use App\Models\Blog\Post;
use App\Models\Blog\Presentation;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategorizableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Categorizable::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $count = Category::query()->count();
        $type = rand(1,4);
        return [
            'category_id' => rand(1, $count),

            'title' => $this->faker->realText(rand(40, 80)),
            'excerpt' => $this->faker->realText(247) . '...',
            'is_published' => rand(0,1),

            'categorizable_id' => match ($type) {
                1 => rand(1,Document::query()->count()),
                2 => rand(1,Exhibition::query()->count()),
                3 => rand(1,Post::query()->count()),
                4 => rand(1,Presentation::query()->count()),
            },
            'categorizable_type' => match ($type) {
                1 => Document::class,
                2 => Exhibition::class,
                3 => Post::class,
                4 => Presentation::class,
            },
        ];
    }
}
