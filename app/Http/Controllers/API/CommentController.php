<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Commentable;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function indexAction($commentable_type, $commentable_id) {
        if(!isset(Relation::$morphMap[$commentable_type])){
            return $this->abort(404, "Publications of the \"$commentable_type\" type not found");
        }

        // See AppServiceProvider
        $commentable = new Relation::$morphMap[$commentable_type]();

        if(!($commentable instanceof Commentable)){
            return $this->abort(500, "This publication is not commented on");
        }

        $commentable = $commentable::query()->find($commentable_id);

        if(!$commentable) {
            return $this->abort(404, "Commentable model not found");
        }

        $comments = $commentable->comments()->get()->groupBy('parent_id');

        return $this->response($comments->toArray());
    }
}
