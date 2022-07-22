<?php

namespace App\Http\Resources\Comments;

use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantCommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'author' => CommentAuthorResource::make($this->commentAuthor),
            'foods' => FoodsResource::collection($this->commentWithCartItems),
            'created_at' => $this->created_at,
            'score' => $this->score,
            'content' => $this->content,
            'answer' => AnswerResource::make($this->whenLoaded('commentReply'))
        ];
    }
}
