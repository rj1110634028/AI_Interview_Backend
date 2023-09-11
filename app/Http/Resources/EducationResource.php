<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EducationResource extends JsonResource
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
            'id' => $this->id,
            'department' => $this->department->name,
            'school' => $this->school,
            'educational_level' => $this->educational_level,
            'admission_date' => $this->admission_date,
            'graduation_date' => $this->graduation_date,
        ];
    }
}
