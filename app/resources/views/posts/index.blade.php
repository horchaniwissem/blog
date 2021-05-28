@extends('layouts.app1')

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Liste des articles</div>

                    <div class="card-body">
                        <a class="btn btn-primary mb-2" href="{{ route('posts.create') }}"><i class="fas fa-plus"></i> Ajouter un article</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Titre</td>
                                    <td>Slug</td>
                                    <td>Créé le</td>
                                    <td>Modifié le</td>
                                    <td style="width: 10%">Actions</td>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->slug }}</td>
                                    <td>{{ $post->created_at->diffforHumans() }}</td>
                                    <td>{{ $post->updated_at->diffforHumans() }}</td>
                                    <td>
                                        <div class="row no-gutters">
                                            <div class="col"><a class="btn btn-sm btn-success" href="{{ route('posts.edit', $post->id) }}"><i class="fas fa-edit"></i></a></div>
                                            <div class="col">
                                                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
