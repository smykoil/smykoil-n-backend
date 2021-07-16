<?php


namespace App\Traits;


use App\Models\Blog\Article;
use App\Models\Blog\Category;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Spatie\MediaLibrary\InteractsWithMedia;

trait PostTrait
{
    use InteractsWithMedia;

    /**
     * @throws Exception
     */
    public function category(): MorphToMany
    {
        if(!($this instanceof Model)){
            throw new Exception('A class that uses the App\Traits\PostTrait trait must extend the Illuminate\Database\Eloquent\Model class.');
        }

        return $this->morphedByMany(Category::class, 'posts');
    }

    /**
     * @throws Exception
     */
    public function article(): MorphOne
    {
        if(!($this instanceof Model)){
            throw new Exception('A class that uses the App\Traits\PostTrait trait must extend the Illuminate\Database\Eloquent\Model class.');
        }

        return $this->morphOne(Article::class, 'post');
    }
}
