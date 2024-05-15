<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubmenuRequest;
use App\Http\Requests\SubmenuUpdateRequest;
use App\Models\Menu;
use App\Models\Submenu;
use App\Service\ImageSubmenuService;
use Illuminate\Http\Request;

class SubmenuController extends Controller
{
    public function index()
    {
        $submenus = Submenu::all();
        return view('dashboard.submenu.submenu_table', compact('submenus'));
    }

    public function create()
    {
        $menus = Menu::all();
        return view('dashboard.submenu.tambah_submenu', compact('menus'));
    }

    public function store(SubmenuRequest $request)
    {
        $request->validated();

        if ($request->file('submenu_img')) {
            $newImage = new ImageSubmenuService();
            $imagePath = $newImage->handleUploadedImage($request->file('submenu_img'));

            Submenu::create([
                'menu_id' => $request->menu_id,
                'nama_submenu' => $request->nama_submenu,
                'summary' => $request->summary,
                'slug_submenu' => strtolower(str_replace(' ','-', $request->nama_submenu)),
                'submenu_img' => $imagePath
            ]);
        }

        return redirect()->route('submenu');
    }

    public function edit($id)
    {
        $submenu = Submenu::find($id);
        $menus = Menu::all();
        return view('dashboard.submenu.edit_submenu', compact('submenu', 'menus'));
    }

    public function update(SubmenuUpdateRequest $request)
    {
        $request->validated();

        if ($request->file('submenu_img')) {
            $newImage = new ImageSubmenuService();
            $imagePath = $newImage->handleUploadedImage($request->file('submenu_img'));

            Submenu::where('id', $request->id)->update([
                'menu_id' => $request->menu_id,
                'nama_submenu' => $request->nama_submenu,
                'summary' => $request->summary,
                'slug_submenu' => strtolower(str_replace(' ','-', $request->nama_submenu)),
                'submenu_img' => $imagePath
            ]);
        } else {
            Submenu::where('id', $request->id)->update([
                'menu_id' => $request->menu_id,
                'nama_submenu' => $request->nama_submenu,
                'summary' => $request->summary,
                'slug_submenu' => strtolower(str_replace(' ','-', $request->nama_submenu)),
            ]);
        }

        return redirect()->route('submenu');
    }

    public function destroy($id)
    {
        $submenu = Submenu::find($id);
        if(file_exists($submenu->submenu_img)){
            unlink($submenu->submenu_img);
        }
        // unlink($submenu->post['gambar_post']);
        $submenu->post()->delete();
        $submenu->delete();
        return redirect()->route('submenu');
    }
}
