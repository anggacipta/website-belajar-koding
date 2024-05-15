<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    use HasFactory;

    protected $table = 'submenu';

    protected $fillable = ['menu_id', 'nama_submenu', 'slug_submenu', 'submenu_img', 'summary'];

    public function menu(){
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }

    public function post(){
        return $this->hasMany(Post::class, 'submenu_id', 'id');
    }
}
