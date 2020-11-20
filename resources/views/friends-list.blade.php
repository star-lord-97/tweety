<div class="bg-gray-200 border border-gray-300 rounded-lg py-4 px-6">
    <h3 class="font-bold text-xl mb-4">Following</h3>

    <ul>
        @forelse (currentUser()->follows as $user)
        <li class="{{ $loop->last ? '' : 'mb-4' }}">
            <div class="flex items-center text-sm">
                <a href="{{ $user->path() }}"><img src="{{ $user->avatar }}" alt="avatar" class="rounded-full mr-2" width="40" height="40"></a>
                <a href="{{ $user->path() }}">{{ $user->name }}</a>
            </div>
        </li>
        @empty
        <p class="p-4 text-sm bg-gray-400 rounded-full">No Followings yet :"[</p>
        @endforelse
    </ul>
</div>