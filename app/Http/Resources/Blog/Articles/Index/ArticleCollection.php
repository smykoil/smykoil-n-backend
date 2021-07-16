<?php

namespace App\Http\Resources\Blog\Articles\Index;

use App\Http\Resources\Resource;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\ArrayShape;

class ArticleCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     * @return array
     */
    #[ArrayShape(['articles' => "\Illuminate\Support\Collection", 'pagination' => "array"])]
    public function toArray($request): array
    {
        return [
            'articles' => ArticleResource::collection($this->collection),
            'pagination' => $this->pagination()
        ];
    }
}
