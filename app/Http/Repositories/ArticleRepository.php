<?php

declare(strict_types=1);

namespace App\Http\Repositories;

use App\Models\Blog\Article;
use App\Models\Blog\Category;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class ArticleRepository
{
    private Article $articleModel;

    public function __construct(Article $model)
    {
        $this->articleModel = $model;
    }

    public function paginateList(
        int $category_id = null,
        int $is_published = 1,
        string $sort_by = 'created_at',
        string $sort_direction = 'desc',
        int $per_page = 12,
    ): LengthAwarePaginator
    {
        if ($category_id) {
            Category::query()->find($category_id)->increment('views_count');
        }

        $collection = $this->articleModel->query()->with(relations: 'category:id,title');

        if ($category_id) {
            $collection = $collection->where(column: 'category_id', operator: '=', value: $category_id);
        }

        $collection = $collection->where(column: 'is_published', operator: '=', value: $is_published);

        $collection = $collection->orderBy(column: $sort_by, direction: $sort_direction);

        return $collection->paginate($per_page);
    }

    public function getByIdWithRelationsOrFail(int $id, array|string $relations): Article|Collection|Builder|array|null
    {
        return $this->articleModel->query()->with($relations)->findOrFail($id);
    }

    public function getByIdOrFail($id): Article|Collection|Builder|array|null
    {
        return $this->articleModel->query()->findOrFail($id);
    }
}
