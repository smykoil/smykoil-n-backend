<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\Blog;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ArticleRepository;
use App\Http\Requests\API\Blog\Articles\ArticleIndexRequest;
use App\Http\Resources\Blog\Articles\Index\ArticleCollection;
use App\Http\Resources\Blog\Articles\Show\ArticleResource;
use App\Models\Blog\Article;
use Illuminate\Http\JsonResponse;

class ArticleController extends Controller
{
    protected ArticleRepository $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function indexAction(ArticleIndexRequest $request): JsonResponse
    {
        //dd($request->input('per_page'));
        $articles = $this->articleRepository->paginateList(...$request->all());

        $articles = ArticleCollection::make($articles);

        return $this->response($articles->jsonSerialize());
    }

    public function storeAction()
    {
        //
    }

    public function showAction(int $id): JsonResponse
    {
        $article = $this->articleRepository->getByIdWithRelationsOrFail($id, relations: ['post', 'applications']);

        $article->increment('views_count');

        $article = ArticleResource::make($article)->jsonSerialize();

        return $this->response($article);
    }

    public function updateAction()
    {
        //
    }

    public function destroyAction()
    {
        //
    }
}
