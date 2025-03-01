<?php

namespace App\Http\Resources\Post;

use App\Http\Resources\Comment\CommentResource;
use App\Http\Resources\User\MinifiedUserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Post */
class PostResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'photo' => $this->photo,
            'user' => new MinifiedUserResource($this->user),
            'description' => $this->description,
            'likes' => $this->totalLikes(),
            'isLiked' => $this->isLiked(),
            'comments' => [
                'total' => $this->totalComments(),
                'list' => CommentResource::collection($this->comments),
            ],
            'createdAt' => $this->created_at->format('d/m/Y H:i'),
        ];
    }
}
