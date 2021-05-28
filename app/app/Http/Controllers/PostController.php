<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:ROLE_ADMIN');
    }

    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|unique:posts|max:255',
        ]);

        if (!empty($data)) {
            $post = new Post();
            $post->title = $data['title'];
            $post->user_id = Auth::id();
            $post->slug = Str::slug($data['title'], "-");
            $post->content = "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.";
            $post->save();
        }

        return redirect()->route('posts.index')->with('status', 'Article bien ajouté!');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }


    public function update(Request $request, $id): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|unique:posts|max:255',
        ]);

        if (!empty($data)) {
            $post = Post::find($id);
            $post->title = $data['title'];
            $post->user_id = Auth::id();
            $post->slug = Str::slug($data['title'], "-");
            $post->save();
        }

        return redirect()->route('posts.index')->with('status', 'Article bien modifié!');
    }


    public function destroy($id): RedirectResponse
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index')->with('status', 'Article bien supprimé!');
    }
}
