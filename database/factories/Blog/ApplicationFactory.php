<?php

namespace Database\Factories\Blog;

use App\Models\Blog\Application;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

class ApplicationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Application::class;

    #[ArrayShape([
        'title' => "string",
        'file_src' => "string",
        'extension' => "string"
    ])]
    public function definition(): array
    {
        $type = rand(0, 2);

        return [
            'title' => match ($type) {
                0 => 'Документ какой-то',
                1 => 'Презентация какая-то',
                2 => 'Картинка какая-то',
            },
            'file_src' => match ($type) {
                0 => '/storage/applications/factory/fp.docx',
                1 => '/storage/applications/factory/fp.pptx',
                2 => '/storage/applications/factory/cert.jpg',
            },
            'extension' => match ($type) {
                0 => 'docx',
                1 => 'pptx',
                2 => 'jpg',
            },
        ];
    }
}
