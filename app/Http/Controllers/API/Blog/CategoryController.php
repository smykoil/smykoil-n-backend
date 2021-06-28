<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laravelcity\Categories\Lib\CategoryException;

class CategoryController extends Controller
{
    protected $category;

    public function __construct() {
        $this->category = (new Category())->query();
    }

    public function indexAction(): JsonResponse
    {
        $categories = $this->category->get();
        return $this->response($categories->toArray());
    }

    public function storeAction(Request $request): JsonResponse
    {
        $request->validate(['title'=>'required','parent'=>'required']);

        try {
            $this->category->insert($request);
        } catch (CategoryException $e){
            Log::error($e);
            return $this->abort(500, 'Category can\'t be created');
        }

        return $this->response();
    }

    public function showAction(int $id): JsonResponse
    {
        $category = Category::query()->find($id);

        if(!$category){
            return $this->abort(404, 'Category not found');
        }

        return $this->response($category->toArray());
    }

    public function updateAction(Request $request, int $category_id): JsonResponse
    {
        try {
            $this->category->update($request,$category_id);
        } catch (CategoryException $e){
            Log::error($e);
            return $this->abort(500, 'Category can\'t be updated');
        }

        return $this->response();
    }

    public function destroyAction($id): JsonResponse
    {
        $category = $this->category->find($id);

        if(!$category) {
            return $this->abort(404, 'Category not found');
        }

        $category->destroy($id);

        return $this->response();
    }
}
