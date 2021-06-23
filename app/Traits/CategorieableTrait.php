<?php


namespace App\Traits;


use App\Models\Blog\Category;
use Illuminate\Database\Eloquent\Model;

trait CategorieableTrait
{
    public function categories()
    {
        if(!$this instanceof Model){
            throw new \Exception('A class that uses the App\Traits\Categoriaeble trait must extend the Illuminate\Database\Eloquent\Model class.');
        }

        return $this->morphToMany(Category::class, 'categorieable');
    }
}
