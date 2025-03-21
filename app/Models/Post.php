<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Relations\BelongsTo;
use MongoDB\Laravel\Relations\HasMany;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    //belongs to project
    public function project() : BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    //has many comments
    public function comments() : HasMany
    {
        return $this->hasMany(Comment::class);
    }


}
