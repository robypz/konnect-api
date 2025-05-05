<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\BelongsTo;

class Reaction extends Model
{
    /** @use HasFactory<\Database\Factories\ReactionsFactory> */
    use HasFactory;

    //belongs to post
    public function post() : BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
