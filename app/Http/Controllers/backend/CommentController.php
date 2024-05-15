<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Forum;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Forum $post)
    {
        $comment = new Comment();
        $comment->content = $request->content;
        $comment->user_id = auth()->id();
        $comment->forum_id = $post->id;
        $comment->save();

        return redirect()->route('forum.details', $post);
    }

    public function reply(Request $request, Comment $comment)
    {
        $reply = new Comment;
        $reply->content = $request->content;
        $reply->user_id = auth()->id();
        $reply->forum_id = $comment->forum_id;
        $reply->parent_id = $comment->id;
        $reply->save();

        return redirect()->route('forum.details', $comment->forum);
    }
}
