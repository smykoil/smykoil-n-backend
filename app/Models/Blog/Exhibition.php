<?php

namespace App\Models\Blog;

use App\Traits\CategorieableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exhibition extends Model
{
    use HasFactory;
    use CategorieableTrait;

    protected $guarded = ['is_published'];
}
