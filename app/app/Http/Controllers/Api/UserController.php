<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user(Request $request)
    {
        return $request->user();
    }
}
