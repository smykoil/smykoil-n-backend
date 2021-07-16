<?php

namespace App\Http\Resources\Blog;

use Illuminate\Http\Resources\Json\JsonResource;

class PresentationResource extends JsonResource
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
            'type' => 'presentation',
            'file_src' => $this->file_src,
            'description' => $this->description,
        ];
    }
}
