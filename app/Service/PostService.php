<?php

namespace App\Service;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostService {

    public function createPost(array $data, string $post_slug, string $imagePost) {
        Post::create([
            'menu_id' => $data['menu_id'],
            'submenu_id' => $data['submenu_id'],
            'user_id' => Auth::user()->id,
            'judul_post' => $data['judul_post'],
            'post_slug' => $post_slug,
            'isi_post' => $data['isi_post'],
            'gambar_post' => $imagePost
        ]);
    }

    public function updatePostWithImage($id, array $data, string $post_slug, string $imagePost) {
        Post::find($id)->update([
            'menu_id' => $data['menu_id'],
            'submenu_id' => $data['submenu_id'],
            'user_id' => Auth::user()->id,
            'judul_post' => $data['judul_post'],
            'post_slug' => $post_slug,
            'isi_post' => $data['isi_post'],
            'gambar_post' => $imagePost
        ]);
    }

    public function updatePostWithoutImage($id, array $data, string $post_slug) {
        Post::find($id)->update([
            'menu_id' => $data['menu_id'],
            'submenu_id' => $data['submenu_id'],
            'user_id' => Auth::user()->id,
            'judul_post' => $data['judul_post'],
            'post_slug' => $post_slug,
            'isi_post' => $data['isi_post'],
        ]);
    }

    public function deletePost($id) {
        Post::find($id)->delete();
    }

}