<?php

declare(strict_types=1);

namespace Database\Factories\Blog;

use App\Models\Blog\Document;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

class DocumentFactory extends Factory
{
    protected $model = Document::class;

    #[ArrayShape(['file_src' => "string", 'description' => "string"])]
    public function definition(): array
    {
        $file = rand(1,2) == 2 ? 'fp.docx' : 'kt.docx';
        $file = '/storage/uploads/documents/' . $file;
        $description = $this->faker->realText(rand(1000, 2000));
        return [
            'file_src' => $file,
            'description' => $description,
        ];
    }
}
