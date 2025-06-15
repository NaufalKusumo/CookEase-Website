<?php

namespace App\Models;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
{
    use HasFactory; // This line might already be here

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

    // ADD THIS FUNCTION RIGHT HERE!
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
