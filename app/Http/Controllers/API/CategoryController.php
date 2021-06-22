<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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

    public function indexAction()
    {
        $categories = $this->category->rootCategories()->toArray();
        return $this->response($categories);
    }

    public function storeAction(Request $request)
    {
        $request->validate(['title'=>'required','parent'=>'required']);

        try {
            $this->category->insert($request);
        } catch (CategoryException $e){
            Log::error($e);
            return $this->abort(500, 'Model can\'t be created');
        }

        return $this->response();
    }

    public function updateAction(Request $request, int $category_id)
    {
        try {
            $this->category->update($request,$category_id);
        } catch (CategoryException $e){
            Log::error($e);
            return $this->abort(500, 'Model can\'t be updated');
        }

        return $this->response();
    }

    public function destroyAction($id)
    {
        $category = $this->category->find($id);

        if(!$category) {
            return $this->abort(404, 'Category not found');
        }

        $category->destroy($id);

        return $this->response();
    }
}
