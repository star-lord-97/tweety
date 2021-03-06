<?php

namespace App\Models;

use App\Followable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function path($append = '')
    {
        $path =  route('profiles.show', $this->username);
        return $append ? "{$path}/{$append}" : $path;
    }

    public function getAvatarAttribute($value)
    {
        return asset($value ?: '/img/default-avatar.jpeg');
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function timeline()
    {
        $followsIds = $this->follows()->pluck('id');
        $followsIds->push($this->id);

        return Tweet::whereIn('user_id', $followsIds)->withLikes()->latest()->paginate(10);
    }

    // $user->tweets
    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    // $user->likes
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
