<span class="flex flex-column bg-white py-2 px-4 w-full shadow my-2">
    <a href="{{ route('front.posts.show', $post->slug) }}" class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-1xl md:text-2xl">{{ $post->title }}</a>
        <p class="pb-4 text-sm md:text-base font-normal text-gray-600">
            {{ $post->created_at->diffForHumans() }}
            -
            {{ $post->user->name }}
        </p>
</span>
