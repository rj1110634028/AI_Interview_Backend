<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResumeResource extends JsonResource
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
            'educational_status' => $this->educational_status,
            'employment_status' => $this->employment_status,
            "biography" => $this->biography,
            "education" => $this->educations,
            "work_experience" => $this->workExperiences,
            "portfolio" => $this->portfolios,
            "skill" => $this->skills,
        ];
    }
}
