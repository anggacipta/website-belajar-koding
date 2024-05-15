<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';
    protected $fillable = ['nama_menu'];

    public function submenu(){
        return $this->hasMany(Submenu::class, 'menu_id', 'id');
    }

    public function post(){
        return $this->hasMany(Post::class, 'menu_id', 'id');
    }
}
