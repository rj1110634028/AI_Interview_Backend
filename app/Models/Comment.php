<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $hidden = [
        'article_id',
        'article_type',
    ];

    protected $guarded = [];

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function discussion()
    {
        return $this->morphTo();
    }
}
