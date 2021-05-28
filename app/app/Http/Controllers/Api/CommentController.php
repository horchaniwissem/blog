<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create(Request $request): bool
    {
        $message = $request->input('message');
        $postId = $request->input('post_id');
        $commentId = $request->input('comment_id');

        /*$lastComment = Comment::where([
            ['post_id', '=', $postId]
        ])->last();

        if ($lastComment->user_id == $request->user()->id) return false;*/
        if (!empty($message) && !empty($postId))
        {
            $comment = new Comment();
            $comment->content = $message;
            $comment->user_id = $request->user()->id;
            $comment->post_id = $postId;
            if ($commentId)
                $comment->comment_id = $commentId;
            $comment->save();
            return true;
        }
        return false;
    }

}
