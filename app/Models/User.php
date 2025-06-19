<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function bookmarkedRecipes()
    {
        return $this->morphedByMany(Recipe::class, 'bookmarkable');
    }

    public function bookmarkedTips()
    {
        return $this->morphedByMany(Tip::class, 'bookmarkable');
    }

    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }

    /**
     * Get all of the tips for the User.
     */
    public function tips()
    {
        return $this->hasMany(Tip::class);
    }

}
