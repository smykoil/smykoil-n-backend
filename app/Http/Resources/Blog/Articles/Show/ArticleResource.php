<?php

namespace App\Http\Resources\Blog\Articles\Show;

use App\Http\Resources\Blog\ApplicationResource;
use App\Http\Resources\Blog\DocumentResource;
use App\Http\Resources\Blog\ExhibitionResource;
use App\Http\Resources\Blog\PostResource;
use App\Http\Resources\Blog\PresentationResource;
use App\Models\Blog\Document;
use App\Models\Blog\Exhibition;
use App\Models\Blog\Post;
use App\Models\Blog\Presentation;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\ArrayShape;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    #[ArrayShape([
        'id' => "mixed",
        'preview' => "mixed",
        'title' => "mixed",
        'post' => "array",
        'applications' => "array",
        'created_at' => "mixed"
    ])] public function toArray($request): array
    {
        $post = match ($this->post::class) {
            Post::class => PostResource::make($this->post),
            Document::class => DocumentResource::make($this->post),
            Presentation::class => PresentationResource::make($this->post),
            Exhibition::class => ExhibitionResource::make($this->post)
        };
        return [
            'id' => $this->id,
            'preview' => $this->getMedia('preview')->first()->getUrl('thumb'),
            'title' => $this->title,
            'post' => $post->jsonSerialize(),
            'applications' => ApplicationResource::collection($this->applications),
            'created_at' => $this->created_at,
        ];
    }
}
