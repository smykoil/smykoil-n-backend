<?php

namespace App\Models\Blog;

use App\Traits\CategorizableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Document extends Model
{
    use HasFactory;
    use CategorizableTrait;

    protected $guarded = [];
}
