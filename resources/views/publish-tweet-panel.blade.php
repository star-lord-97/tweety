<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form action="/tweets" method="post">
        @csrf
        <textarea name="tweet" class="w-full outline-none overflow-hidden" placeholder="What's up doc?" required autofocus></textarea>
        <hr class="my-4">
        <footer class="flex justify-between items-center">
            <a href="{{ currentUser()->path() }}"><img src="{{ currentUser()->avatar }}" alt="avatar" class="rounded-full mr-2" width="50" height="50"></a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 rounded-lg shadow px-10 text-sm text-white h-10" style="outline:0">Tweet-a-roo!</button>
        </footer>
    </form>
    @error('tweet')
    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror
</div>