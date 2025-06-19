<?php

namespace App\Models;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
{
    use HasFactory; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'ingredients',
        'instructions',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Polymorphic relationship
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->latest();
    }

    public function getAverageRatingAttribute()
    {
        // Get the average rating from the related comments.
        // The ?. is the "null-safe operator" in case there are no comments.
        $average = $this->comments()->avg('rating');

        // Format to one decimal place, or return 'No ratings' if null.
        return $average ? number_format($average, 1) : 'No rating';
    }

    public function bookmarks()
    {
        return $this->morphToMany(User::class, 'bookmarkable');
    }

    public function reports()
    {
        return $this->morphMany(Report::class, 'reportable');
    }

    public function path() { return '/recipes/' . $this->id; }
}
