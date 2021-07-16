<?php

declare(strict_types=1);

namespace Database\Factories\Blog;

use App\Models\Blog\Exhibition;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

class ExhibitionFactory extends Factory
{
    protected $model = Exhibition::class;

    #[ArrayShape(['description' => "string"])]
    public function definition(): array
    {
        $description = $this->faker->realText(rand(1000, 2000));
        return [
            'description' => $description,
        ];
    }
}
