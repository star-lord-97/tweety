<div class="border border-grey-300 rounded-lg">
    @forelse ($tweets as $tweet)
    @include('tweet')
    @empty
    <p class="p-4">No Tweets yet :"[</p>
    @endforelse
    <div class="mx-5 my-2">
        {{ $tweets->links() }}
    </div>
</div>