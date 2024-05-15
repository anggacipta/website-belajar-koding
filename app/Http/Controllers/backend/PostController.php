<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Menu;
use App\Models\Post;
use App\Models\Submenu;
use App\Service\ImagePostService;
use App\Service\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('dashboard.posts.posts_table', compact('posts'));
    }

    public function create()
    {
        $menu = Menu::query()->where('nama_menu', 'Belajar')->first();
        $submenu = Submenu::query()->whereHas('menu', function ($query) {
            $query->where('nama_menu', 'Belajar');
        })->get();
        return view('dashboard.posts.tambah_posts', compact('menu', 'submenu'));
    }

    public function store(PostRequest $request)
    {
        $data = $request->validated();
        
        $newImage = new ImagePostService();
        $postService = new PostService();

        // Define PostImage
        $image = $newImage->handleUploadedImage($request->file('gambar_post'));
        // Define PostSlug
        $post_slug = strtolower(str_replace(' ','-', $request->judul_post));

        /// Create Post
        $postService->createPost($data, $post_slug, $image);

        return redirect()->route('posts');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $menu = Menu::query()->where('nama_menu', 'Belajar')->first();
        $submenu = Submenu::query()->whereHas('menu', function ($query) {
            $query->where('nama_menu', 'Belajar');
        })->get();
        return view('dashboard.posts.edit_posts', compact('post', 'menu', 'submenu'));
    }

    public function update(PostUpdateRequest $request, $id)
    {
        $data = $request->validated();

        $post = Post::find($id);
        $newImage = new ImagePostService();
        $postService = new PostService();

        // Jika file gambar ada dalam request
        if ($request->file('gambar_post')) {
            // Hapus gambar lama
            unlink($post->gambar_post);

            // Define PostImage
            $image = $newImage->handleUploadedImage($request->file('gambar_post'));
            // Define PostSlug
            $post_slug = strtolower(str_replace(' ','-', $request->judul_post));

            $postService->updatePostWithImage($id, $data, $post_slug, $image);
        } else {
            // Define PostSlug
            $post_slug = strtolower(str_replace(' ','-', $request->judul_post));

            $postService->updatePostWithoutImage($id, $data, $post_slug);
        }

        return redirect()->route('posts');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $postService = new PostService();

        unlink($post->gambar_post);
        $postService->deletePost($id);

        return redirect()->route('posts');
    }
}
