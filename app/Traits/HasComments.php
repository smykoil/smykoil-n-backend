<?php


namespace App\Traits;


use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Exception;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasComments
{
    /**
     * @throws Exception
     */
    public function comments(): MorphMany
    {
        if(!($this instanceof Model)){
            throw new Exception("The \"HasComments\" trait can only be added to the model");
        }

        return $this->morphMany(Comment::class, 'commentable');
    }
}
