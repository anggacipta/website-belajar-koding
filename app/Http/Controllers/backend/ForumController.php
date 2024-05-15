<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Forum;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        $forums = Forum::all();
        return view('frontend.forums', compact('forums'));
    }

    public function store(Request $request)
    {
        $forum = new Forum();
        $forum->content = $request->content;
        $forum->user_id = auth()->id();
        $forum->save();

        return redirect()->route('forums');
    }

    public function show(Forum $post)
    {
        return view('frontend.forums_details', compact('post'));
    }
}
