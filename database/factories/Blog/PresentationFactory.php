<?php

declare(strict_types=1);

namespace Database\Factories\Blog;

use App\Models\Blog\Presentation;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

class PresentationFactory extends Factory
{
    protected $model = Presentation::class;

    #[ArrayShape(['file_src' => "string", 'description' => "string"])]
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
