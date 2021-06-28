<?php

namespace App\Http\Controllers\API\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog\Categorizable;
use App\Models\Blog\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategorizableController extends Controller
{
    public function indexAction(Request $request): JsonResponse
    {
        if($request->has('category_id')){
            $category = Category::query()
                ->with('categorizables')
                ->find($request->input('category_id'));

            if(!$category){
                return $this->abort(404, 'Category not found');
            }

            $categorizables = $category->categorizables;
        }

        else {
            $categorizables = Categorizable::query()->get();
        }

        return $this->response($categorizables->toArray());
    }

    public function storeAction() {
        //
    }

    public function showAction(int $id): JsonResponse
    {
        $categorizable = Categorizable::query()
            ->with('categorizable')
            ->find($id);

        if(!$categorizable) {
            return $this->abort(404, 'Categorizable not found');
        }

        return $this->response($categorizable->toArray());
    }

    public function updateAction() {
        //
    }

    public function destroyAction() {
        //
    }
}
