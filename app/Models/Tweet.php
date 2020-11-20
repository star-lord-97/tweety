<?php

namespace App\Models;

use App\Likable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory, Likable;

    protected $guarded = [];

    // $tweet->user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}