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

    //belongs to user
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //belongs to department
    public function department() : BelongsTo
    {
        return $this->belongsTo(Deparment::class);
    }

    //belongs to employee
    public function employee() : BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    //has many reactions
    public function reactions() : HasMany
    {
        return $this->hasMany(Reaction::class);
    }

    //has many tags
    public function tags() : HasMany
    {
        return $this->hasMany(Tag::class);
    }

}
