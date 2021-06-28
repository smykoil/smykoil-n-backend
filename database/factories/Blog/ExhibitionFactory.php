<?php

namespace Database\Factories\Blog;

use App\Models\Blog\Exhibition;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ExhibitionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Exhibition::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $description = $this->faker->realText(rand(1000, 2000));
        return [
            'description' => $description,
        ];
    }
}
