<?php

namespace Database\Seeders;

use App\Models\Blog\Article;
use App\Models\Blog\Category;
use App\Models\Blog\Document;
use App\Models\Blog\Exhibition;
use App\Models\Blog\Post;
use App\Models\Blog\Presentation;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PhpParser\Comment\Doc;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();

        Category::factory()->count(5)->create();
        Document::factory()->count(5)->create();
        Exhibition::factory()->count(5)->create();
        Post::factory()->count(5)->create();
        Presentation::factory()->count(5)->create();

        Article::factory()->count(160)->create();

        $articles = Article::all();
        foreach ($articles as $article){
            try {
                $article->addMedia($this->makeTemporaryImage())
                    ->toMediaCollection('preview');
            } catch (FileDoesNotExist | FileIsTooBig $e) {
                Log::error($e);
            }
        }

        $exhibitions = Exhibition::all();
        foreach ($exhibitions as $exhibition) {
            for ($i = 0; $i < 15; $i++) {
                try {
                    $exhibition->addMedia($this->makeTemporaryImage())
                        ->toMediaCollection('files');
                } catch (FileDoesNotExist | FileIsTooBig $e) {
                    Log::error($e);
                }
            }
        }
    }

    public function makeTemporaryImage(int $width = 1920, int $height = 1080): string
    {
        $dir = storage_path('app/public/temp');
        $path = $dir.Str::random(64).'.jpg';


        if(realpath($dir)){
            mkdir($dir);
        }

        $image = file_get_contents("https://picsum.photos/{$width}/{$height}");
        file_put_contents($path, $image);

        return $path;
    }
}
