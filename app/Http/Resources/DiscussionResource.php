<?php

namespace App\Http\Resources;

use App\Models\Discussion;
use Illuminate\Http\Resources\Json\JsonResource;

class DiscussionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if (auth()->user()) {
            $this['is_Favorite'] = Discussion::find($this->id)->userFavorites()->where('user_id', auth()->id())->exists();
        }
        return [
            "id" => $this->id,
            "user_id" => $this->user_id,
            "category_id" => $this->category_id,
            "title" => $this->title,
            "content" => $this->content,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            'comments_count' => $this->whenCounted('comments'),
            'user_favorites_count' => $this->whenCounted('userFavorites'),
            'poster_name' => $this->user->name,
            'poster_sex' => $this->user->sex,
            'category' => $this->category->name,
            'tags' => $this->tags()->get()->map(fn ($item) => $item->name),
            'is_Favorite' => $this->whenHas('is_Favorite'),
        ];
    }
}
