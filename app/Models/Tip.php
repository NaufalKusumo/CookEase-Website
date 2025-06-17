<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tip extends Model
{
    use HasFactory;
    
    // ADD THIS PROPERTY!
    protected $fillable = [
        'title',
        'description',
        'content',
        'photo',
    ];

    // Just like a Recipe belongs to a User, a Tip also belongs to a User.
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // ADD this new comments() function
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->latest();
    }

    // ADD the average rating calculator, just like for recipes
    public function getAverageRatingAttribute()
    {
        $average = $this->comments()->avg('rating');
        return $average ? number_format($average, 1) : 'No rating';
    }
}
