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
            "education" => EducationResource::collection($this->educations),
            "work_experience" => WorkExperienceResource::collection($this->workExperiences),
            "portfolio" => PortfolioResource::collection($this->portfolios),
            "skills" => $this->skills->map(fn ($item) => $item->name),
        ];
    }
}
