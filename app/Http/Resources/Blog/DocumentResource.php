<?php

namespace App\Http\Resources\Blog;

use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class DocumentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    #[ArrayShape([
        'type' => "string",
        'file_src' => "mixed",
        'description' => "mixed"
    ])]
    public function toArray($request): array
    {
        return [
            'type' => 'document',
            'file_src' => $this->file_src,
            'description' => $this->description,
        ];
    }
}
