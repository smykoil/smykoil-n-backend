<?php

namespace App\Http\Resources\Blog;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class ExhibitionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    #[ArrayShape(['type' => "string", 'files' => "array", 'description' => "mixed"])]
    public function toArray($request): array
    {
        $files = $this->getMedia('files');

        $file_urls = [];
        foreach ($files as $file) {
            $file_urls[] = [
                'id' => $file->id,
                'url' => $file->getUrl(),
                'thumb_url' => $file->getUrl('thumb'),
                'title' => $file->title,
                'description' => $file->description
            ];
        }

        return [
            'type' => 'exhibition',
            'files' => $file_urls,
            'description' => $this->description,
        ];
    }
}
