<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;

class FrontController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('frontend.index', compact('posts'));
    }

    public function article($slug)
    {
        $post = Post::where('slug', '=', $slug)->first();
        return view('frontend.posts.show', compact('post'));
    }

}
