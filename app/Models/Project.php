<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
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

    //has many events
    public function events() : HasMany
    {
        return $this->hasMany(Event::class);
    }

    //Has one status
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    //Has one category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //Has Many Projects
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
