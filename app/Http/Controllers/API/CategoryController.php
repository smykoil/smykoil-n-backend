<?php

declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laravelcity\Categories\Facade\Category;
use Laravelcity\Categories\Lib\CategoryException;

class CategoryController extends Controller
{
    protected $category;

    public function __construct() {
        $this->category = Category::newCollection('Post');
    }

    public function indexAction(): JsonResponse
    {
        $categories = $this->category->rootCategories()->toArray();
        return $this->response($categories);
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
        $category = $this->category->find($id);

        if(!$category){
            $this->abort(404, 'Category not found');
        }

        return $this->response($category->posts());
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
