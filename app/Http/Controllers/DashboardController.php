<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Post;
use App\Models\Submenu;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $menu = Menu::query()->count();
        $submenu = Submenu::query()->count();
        $users = User::query()->count();
        $post = Post::query()->count();
        return view('dashboard.index', compact('menu', 'submenu', 'users', 'post'));
    }
}
