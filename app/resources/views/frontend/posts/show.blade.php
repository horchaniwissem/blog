@extends('layouts.app')

@section('content')
    <div class="font-sans">
        <p class="text-base md:text-sm text-green-500 font-bold mb-4">&lt;
            <a href="{{ url('/') }}" class="text-base md:text-sm text-green-500 font-bold no-underline hover:underline">
                BACK TO BLOG
            </a>
        </p>
        <a href="{{ route('front.posts.show', $post->slug) }}" class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl">{{ $post->title }}</a>
        <p class="text-sm md:text-base font-normal text-gray-600">{{ $post->created_at->diffForHumans() }}</p>
    </div>

    <p>{{ $post->content }}</p>

    <div class="text-base md:text-sm text-gray-500 px-4 py-6">
        Tags:
        @foreach($post->tags as $tag)
            <a href="{{ route('front.tags.show', ['slug' => $tag->slug]) }}" class="text-base md:text-sm text-green-500 no-underline hover:underline">{{ $tag->title }}</a> .
        @endforeach
    </div>


    <hr class="border-b-2 border-gray-400 mb-8 mx-4">


    <comments post_id="{{ $post->id }}"></comments>


@endsection
