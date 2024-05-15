<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Forum extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function comment(): HasMany
    {
        return $this->hasMany(Comment::class, 'forum_id', 'id');
    }

    public function reply(): HasMany
    {
        return $this->hasMany(Reply::class, 'forum_id', 'id');
    }
}
