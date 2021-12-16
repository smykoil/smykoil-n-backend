<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $comment = [
            'id' => $this->id,
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user->name,
                'first_name' => $this->user->first_name,
                'last_name' => $this->user->last_name,
                'middle_name' => $this->user->middle_name,
                'avatar_thumb' => $this->user->getMedia('avatar')->first()->getUrl('thumb'),
            ],
            'body' => $this->body,
            'created_at' => $this->created_at,
            'is_updated' => $this->created_at == $this->updated_at,
        ];

        if ($this->parent_id) {
            $comment['parent_id'] = $this->parent_id;
        }

        if ($this->children->count() > 0) {
            $comment['children'] = CommentResource::collection($this->children);
        }

        //dd($this->children->count());

        return $comment;
    }
}
