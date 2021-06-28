<?php

namespace Database\Factories\Blog;

use App\Models\Blog\Document;
use App\Models\Blog\Exhibition;
use App\Models\Blog\Post;
use App\Models\Blog\Presentation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DocumentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Document::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
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
