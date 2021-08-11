<?php

namespace App\Http\Resources\Blog\Articles\Index;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'category' => [
                'id' => $this->category->id,
                'title' => $this->category->title
            ],
            'preview' => $this->getMedia('preview')->first()->getUrl('thumb'),
            'title' => $this->title,
            'excerpt' => $this->excerpt,
            'created_at' => $this->created_at,
            'type' => $this->post_type
        ];
    }
}
