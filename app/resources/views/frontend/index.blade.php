@extends('layouts.app')

@section('content')
    <div class="font-sans">
            @foreach($posts as $post)
            <x-post_card :post="$post"></x-post_card>
            @endforeach
    </div>




<hr class="border-b-2 border-gray-400 mb-8 mx-4 mt-4">

@endsection


