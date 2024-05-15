<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Post;
use App\Models\Submenu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $post = Post::query()->orderBy('id')->get();
        return view('frontend.index', compact('post'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.forums');
    }

    public function post($id)
    {
        $menu = Menu::query()->findOrFail($id);
        $submenu = Submenu::query()->where('menu_id', $id)->orderBy('id')->get();
        return view('frontend.post', compact('submenu', 'menu'));
    }

    public function belajar($id)
    {
        $submenu = Submenu::query()->findOrFail($id);
        $belajar = Post::query()->where('submenu_id', $id)->orderBy('id')->get();
        return view('frontend.belajar', compact('belajar', 'submenu'));
    }

    public function belajarPost($id)
    {
        $postBelajar = Post::query()->findOrFail($id);
        return view('frontend.post_belajar', compact('postBelajar'));
    }
}
