<?php

namespace App;

use App\Models\Like;

trait Likable
{
    // Tweet::withLikes()->get();
    public function scopeWithLikes($query)
    {
        $query->leftJoinSub('select tweet_id, sum(liked) likes, sum(!liked) dislikes from likes group by tweet_id', 'likes', 'likes.tweet_id', 'tweets.id');
    }

    // $tweet->likes
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // allows $tweet->like() and $tweet->dislike()
    public function toggleLike($user, $liked)
    {
        $this->likes()->updateOrCreate(['user_id' => $user ? $user->id : auth()->user()->id], ['liked' => $liked]);
    }

    // $tweet->like()
    public function like($user = null)
    {
        return $this->toggleLike($user, true);
    }

    // $tweet->dislike()
    public function dislike($user = null)
    {
        return $this->toggleLike($user, false);
    }

    // $tweet->isLikedBy($user)
    public function isLikedBy($user)
    {
        return (bool) $user->likes->where('tweet_id', $this->id)->where('liked', true)->count();
    }

    // $tweet->isDislikedBy($user)
    public function isDislikedBy($user)
    {
        return (bool) $user->likes->where('tweet_id', $this->id)->where('liked', false)->count();
    }
}
