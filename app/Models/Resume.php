<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;

    protected $hidden = [];

    protected $guarded = [];

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }

    function workExperiences()
    {
        return $this->hasMany(WorkExperience::class);
    }

    function educations()
    {
        return $this->hasMany(Education::class);
    }

    function skills()
    {
        return $this->belongsToMany(skill::class, 'resumes_skills');
    }
}
