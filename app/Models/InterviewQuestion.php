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
        'is_analyze',
        'position'
    ];

    protected $casts = [
        'position' => 'json'
    ];

    function interview_records()
    {
        return $this->belongsTo(InterviewRecord::class);
    }
}
