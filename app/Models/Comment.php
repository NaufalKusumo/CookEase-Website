<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // A comment belongs to one recipe and one user.
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // polymorphic relationship.
    public function commentable()
    {
        return $this->morphTo();
    }
}
