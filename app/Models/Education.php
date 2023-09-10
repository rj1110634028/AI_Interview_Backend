<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $hidden = [];

    protected $guarded = [];

    function resumes()
    {
        return $this->belongsTo(Resume::class);
    }

    function department()
    {
        return $this->belongsTo(Department::class);
    }
}
