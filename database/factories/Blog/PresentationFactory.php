<?php

namespace Database\Factories\Blog;

use App\Models\Blog\Presentation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PresentationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Presentation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $file = rand(1,2) == 2 ? 'fp.docx' : 'km.docx';
        $file = '/storage/uploads/presentations/' . $file;
        $description = $this->faker->realText(rand(1000, 2000));
        return [
            'file_src' => $file,
            'description' => $description,
        ];
    }
}
