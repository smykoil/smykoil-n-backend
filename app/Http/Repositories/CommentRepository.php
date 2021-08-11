<?php


namespace App\Http\Repositories;


use Illuminate\Database\Eloquent\Model;

class CommentRepository
{
    public function getTreeForModel(Model $model) {
        // $model->comments()->with('children')->get();
    }
}
