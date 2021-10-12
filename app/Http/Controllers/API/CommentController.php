<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Repositories\CommentRepository;
use App\Http\Resources\CommentResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Relations\Relation;

class CommentController extends Controller
{
    public array $counts;

    public CommentRepository $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function indexAction($commentable_type, $commentable_id): JsonResponse
    {
        if(!isset(Relation::$morphMap[$commentable_type])){
            return $this->abort(404, "Publications of the \"$commentable_type\" type not found");
        }

        // See AppServiceProvider
        $commentable = new Relation::$morphMap[$commentable_type]();

        $commentable = $commentable::query()->find($commentable_id);

        if(!$commentable) {
            return $this->abort(404, "Commentable model not found");
        }

        $comments = $this->commentRepository->getListWithFlatChildren($commentable);

        $comments = CommentResource::collection($comments);

        return $this->response($comments->jsonSerialize());
    }
}
