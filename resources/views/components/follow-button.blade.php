@unless (currentUser()->is($user))
<form action="{{ route('follows.store', $user->username) }}" method="post">
    @csrf
    <button class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-xs" style="outline:0">
        {{ currentUser()->isFollowing($user) ? 'Unfollow Me' : 'Follow Me' }}
    </button>
</form>
@endunless