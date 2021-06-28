<?php

namespace Database\Seeders;

use App\Models\Blog\Categorizable;
use App\Models\Blog\Category;
use App\Models\Blog\Document;
use App\Models\Blog\Exhibition;
use App\Models\Blog\Post;
use App\Models\Blog\Presentation;
use App\Models\User;
use Illuminate\Database\Seeder;
use PhpParser\Comment\Doc;

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

        /*Category::factory(4)
            ->has(Document::factory(10)->for(
                Categorizable::factory(10), 'categorizable'
            ))
            ->create();*/
        /*Document::factory(1)->for(
            Categorizable::factory(1)->for(
                Category::factory(1)
            )
        )->create();*/

        /*$categories = Category::factory()
            ->count(5)
            ->create();

        $docs = Document::factory()
            ->count(5);
        $pres = Presentation::factory()
            ->count(5);
        $pots = Post::factory()
            ->count(5);
        $exhs = Exhibition::factory()
            ->count(5);*/

        /*foreach ($categories as $category) {
            Categorizable::factory(5)
                ->for($category, 'category')
                ->count(5)
                ->create();
        }*/

        Category::factory()->count(40)->create();
        Document::factory()->count(40)->create();
        Exhibition::factory()->count(40)->create();
        Post::factory()->count(40)->create();
        Presentation::factory()->count(40)->create();

        Categorizable::factory()->count(160)->create();
    }
}
