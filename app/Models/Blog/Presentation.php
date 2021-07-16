<?php

namespace App\Models\Blog;

use App\Traits\PostTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presentation extends Model
{
    use HasFactory;
    use PostTrait;

    protected $guarded = [];
}
