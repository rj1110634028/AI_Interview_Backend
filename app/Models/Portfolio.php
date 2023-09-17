<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $hidden = [];

    protected $guarded = [];
    
    function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
