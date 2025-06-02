<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\BelongsTo;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;

    //belongs to post
    public function post() : BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function employee() : BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
