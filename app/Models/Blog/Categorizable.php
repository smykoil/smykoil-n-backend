<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Categorizable extends Model
{
    use HasFactory;

    protected $guarded = ['is_published'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function categorizable(): MorphTo
    {
        return $this->morphTo();
    }
}
