<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('dashboard.menu.menu_table', compact('menus'));
    }

    public function create()
    {
        return view('dashboard.menu.tambah_menu');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required',
        ]);

        $menu = new Menu();
        $menu->nama_menu = $request->nama_menu;
        $menu->slug_menu = strtolower(str_replace(' ','-', $request->nama_menu));
        $menu->save();

        return redirect()->route('menu');
    }

    public function edit($slug)
    {
        $menu = Menu::where('slug_menu', $slug)->first();
        return view('dashboard.menu.edit_menu', compact('menu'));
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'nama_menu' => 'required',
        ]);

        Menu::where('slug_menu', $slug)->update([
            'nama_menu' => $request->nama_menu,
            'slug_menu' => strtolower(str_replace(' ','-', $request->nama_menu)),
        ]);

        return redirect()->route('menu');
    }

    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->submenu()->delete();
        $menu->post()->delete();
        $menu->delete();
        return redirect()->route('menu');
    }
}
