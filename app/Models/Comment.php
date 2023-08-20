<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

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

    function article()
    {
        Relation::morphMap([
            'discussion'=>'App\Models\Discussion',
            'experience'=>'App\Models\Experience',
        ]);

        return $this->morphTo();
    }
}
