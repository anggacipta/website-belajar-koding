<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Reply;
use Illuminate\Http\Request;
use App\Models\Comment;

class ReplyController extends Controller
{
    public function store(Request $request, Comment $comment)
    {
        $reply = new Reply();
        $reply->content = $request->content;
        $reply->user_id = auth()->id();
        $reply->comment_id = $comment->id;
        $reply->save();

        return redirect()->route('forum.details', $comment->forum);
    }
}
