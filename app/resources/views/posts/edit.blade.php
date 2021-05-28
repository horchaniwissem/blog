@extends('layouts.app1')

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Modifier un article</div>

                    <div class="card-body">
                        <form action="{{ route('posts.update', $post) }}" method="POST">
                            @method('PATCH')
                            @csrf
                            <input value="{{ $post->title }}" class="form-control mb-2" type="text" name="title" placeholder="title">
                            @error('title')
                            <div class="alert alert-danger"><small>{{ $message }}</small></div>
                            @enderror
                            <button class="btn btn-primary" type="submit">Modifier l'article</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
