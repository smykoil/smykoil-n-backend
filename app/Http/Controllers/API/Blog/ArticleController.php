<?php

namespace App\Http\Controllers\API\Blog;

use App\Http\Controllers\Controller;
use App\Http\Resources\Blog\ArticleCollection;
use App\Http\Resources\Blog\Articles\Show\ArticleResource;
use App\Models\Blog\Article;
use App\Models\Blog\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function indexAction(Request $request): JsonResponse
    {
        if($request->has('category_id')){
            $category = Category::query()
                ->find($request->input('category_id'));

            if(!$category){
                return $this->abort(404, 'Category not found');
            }

            $articles = Article::query()
                ->where('category_id', '=', $request->input('category_id'));

        }

        else {
            $articles = Article::query();
        }

        $articles = $articles->paginate(4);
        $articles = \App\Http\Resources\Blog\Articles\Index\ArticleCollection::make($articles);

        // dd($articles->jsonSerialize());

        //response($articles);
        //dd($articles->render());

        return $this->response($articles->jsonSerialize());
    }

    public function storeAction() {
        //
    }

    public function showAction(int $id): JsonResponse
    {
        $article = Article::query()
            ->with('post')
            ->find($id);

        //dd($article->getMedia('preview')->first()->getUrl());

        if(!$article) {
            return $this->abort(404, 'Article not found');
        }

        $article = ArticleResource::make($article)->jsonSerialize();

        return $this->response($article);
    }

    public function updateAction() {
        //
    }

    public function destroyAction() {
        //
    }
}
