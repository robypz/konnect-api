<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Relations\BelongsToMany;
use MongoDB\Laravel\Relations\HasMany;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    //belongs to many employees
    public function employees() : BelongsToMany
    {
        return $this->belongsToMany(Employee::class);
    }

    //has many tasks
    public function tasks() : HasMany
    {
        return $this->hasMany(Task::class);
    }

    //has many posts
    public function posts() : HasMany
    {
        return $this->hasMany(Post::class);
    }
}
