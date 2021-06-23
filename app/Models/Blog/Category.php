<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Laravelcity\Categories\Models\Categories;

class Category extends Categories
{
    use HasFactory;

    protected $guarded = [];

    public function categorieable(){
        return $this->morphTo();
    }

    public function posts(): MorphToMany
    {
        return $this->morphedByMany(Post::class, 'categorieable');
    }

    public function presentations(): MorphToMany
    {
        return $this->morphedByMany(Presentation::class, 'categorieable');
    }

    public function documents(): MorphToMany
    {
        return $this->morphedByMany(Document::class, 'categorieable');
    }

    public function exhibitions(): MorphToMany
    {
        return $this->morphedByMany(Exhibition::class, 'categorieable');
    }
}
