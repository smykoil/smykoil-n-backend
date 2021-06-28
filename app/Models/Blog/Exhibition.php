<?php

namespace App\Models\Blog;

use App\Traits\CategorizableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exhibition extends Model
{
    use HasFactory;
    use CategorizableTrait;

    protected $guarded = [];
}
