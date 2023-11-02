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
        'motion'
    ];

    protected $casts = [
        'motion' => 'json'
    ];

    function interview_records()
    {
        return $this->belongsTo(InterviewRecord::class);
    }
}
