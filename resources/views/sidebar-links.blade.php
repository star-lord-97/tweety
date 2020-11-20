<ul>
    <li><a class="font-bold text-lg mb-4 block" href="{{ route('tweets.index') }}">Home</a></li>
    <li><a class="font-bold text-lg mb-4 block" href="/explore">Explore</a></li>
    <li><a class="font-bold text-lg mb-4 block" href="{{ currentUser()->path() }}">Profile</a></li>
    <li>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button class="font-bold text-lg mb-4 block" style="outline:0">Logout</button>
        </form>
    </li>
</ul>