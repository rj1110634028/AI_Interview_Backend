<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $hidden = [];

    protected $guarded = [];

    function resumes()
    {
        return $this->belongsToMany(Resume::class, 'resume_skills');
    }
}
