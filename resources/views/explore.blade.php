<x-app>
    <div>
        @foreach ($users as $user)
        <div class="flex item-center mb-5">
            <a href="{{ $user->path() }}">
                <img src="{{ $user->avatar }}" alt="{{ $user->username }}'s avatar" width="60" class="rounded-full mr-4">
            </a>
            <div>
                <a href="{{ $user->path() }}">
                    <h4 class="font-bold my-4">{{ '@' . $user->username }}</h4>
                </a>
            </div>
        </div>
        @endforeach
        {{ $users->links() }}
    </div>
</x-app>