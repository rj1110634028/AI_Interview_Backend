<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motion extends Model
{
    use HasFactory;
    
    protected $hidden = [];

    protected $guarded = [];
    
    function interview_questions()
    {
        return $this->belongsToMany(InterviewQuestion::class,'interview_question_motions');
    }
}
