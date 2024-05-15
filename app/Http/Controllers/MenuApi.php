<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Submenu;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MenuApi extends Controller
{
    public function index()
    {
        $submenu = Submenu::all();
        $menu = Menu::with('submenu')->get();
        return response()->json([
            'status' => 'success',
            'data' => $menu
        ], Response::HTTP_OK);
    }
}
