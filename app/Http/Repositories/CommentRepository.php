<?php

declare(strict_types=1);

namespace App\Http\Repositories;


use App\Models\Commentable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as BaseCollection;

class CommentRepository
{
    public function getListWithFlatChildren(Commentable $commentable): Collection
    {
        $comments = $commentable->comments()
            ->where('parent_id', '=', null)
            ->with(['children', 'user'])
            ->get();

        $comments->each(function ($item) {
            $item->children = $this->flatten($item->children);
        });

        return $comments;
    }

    public function flatten(Collection|BaseCollection $collection): Collection|BaseCollection
    {
        for ($i = 0; $i < $collection->count(); $i++) {
            $item = $collection->get($i);

            $collection->push(...$item->children);

            $item->children = collect();
        }

        return $collection->values();
    }
}
