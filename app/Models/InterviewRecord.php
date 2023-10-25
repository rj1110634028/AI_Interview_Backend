<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterviewRecord extends Model
{
    use HasFactory;

    protected $hidden = [];

    protected $guarded = [];

    protected $casts = [
        'position' => 'json'
    ];

    function interview_questions()
    {
        return $this->hasMany(InterviewQuestion::class);
    }
}
