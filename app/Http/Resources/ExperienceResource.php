<?php

namespace App\Http\Resources;

use App\Models\Experience;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class ExperienceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if(auth()->user()){
            $this['is_Favorite']=Experience::find($this->id)->userFavorites()->where('user_id', auth()->id())->exists();
        }
        return [
            "id" => $this->id,
            "user_id" => $this->user_id,
            "company" => $this->company,
            "position" => $this->position,
            "date" => $this->date,
            "result" => $this->result,
            "difficulty" => $this->difficulty,
            "city" => $this->city,
            "description" => $this->description,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            'comments_count' => $this->whenCounted('comments'),
            'user_favorites_count' => $this->whenCounted('userFavorites'),
            'poster_name' => $this->user->name,
            'poster_sex' => $this->user->sex,
            'questions' => $this->question()->get(['question', 'answer']),
            'is_Favorite' => $this->whenHas('is_Favorite'),
        ];
    }
}
