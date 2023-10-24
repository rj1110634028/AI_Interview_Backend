<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterviewQuestion extends Model
{
    use HasFactory;

    protected $hidden = [];

    protected $fillable = [
        'question',
        'answer',
        'speaking_speed',
    ];

    function interview_records()
    {
        return $this->belongsTo(InterviewRecord::class);
    }

    function motions()
    {
        return $this->belongsToMany(Motion::class, 'interview_question_motions');
    }
}
