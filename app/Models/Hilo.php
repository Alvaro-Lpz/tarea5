<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hilo extends Model
{
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
