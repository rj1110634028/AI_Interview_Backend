<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterviewQuestion extends Model
{
    use HasFactory;

    protected $hidden = [];

    protected $guarded = [];

    function interview_records()
    {
        return $this->belongsTo(InterviewQuestion::class);
    }

    function motions()
    {
        return $this->belongsToMany(Motion::class, 'interview_question_motions');
    }
}
