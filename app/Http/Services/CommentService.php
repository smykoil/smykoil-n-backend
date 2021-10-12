<?php


namespace App\Http\Services;


use App\Models\Comment;
use App\Models\Commentable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as BaseCollection;

class CommentService
{
    public Comment $model;

    public function __construct(Comment $model)
    {
        $this->model = $model;
    }
}
