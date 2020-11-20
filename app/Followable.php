<?php

namespace App;

use App\Models\User;

trait Followable
{
    public function toggleFollow(User $user)
    {
        return $this->follows()->toggle($user);
    }

    public function isFollowing(User $user)
    {
        return $this->follows()->where('following_user_id', $user->id)->exists();
    }

    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }
}
