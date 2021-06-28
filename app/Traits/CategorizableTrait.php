<?php


namespace App\Traits;


use App\Models\Blog\Categorizable;
use App\Models\Blog\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait CategorizableTrait
{
    public function category(): MorphToMany
    {
        if(!($this instanceof Model)){
            throw new \Exception('A class that uses the App\Traits\Categoriaeble trait must extend the Illuminate\Database\Eloquent\Model class.');
        }

        return $this->morphedByMany(Category::class, 'categorizable');
    }

    public function categorizable(): MorphMany
    {
        if(!($this instanceof Model)){
            throw new \Exception('A class that uses the App\Traits\Categoriaeble trait must extend the Illuminate\Database\Eloquent\Model class.');
        }

        return $this->morphMany(Categorizable::class, 'categorizable');
    }
}
