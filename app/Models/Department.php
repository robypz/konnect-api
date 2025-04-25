<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\HasMany;

class Department extends Model
{
    /** @use HasFactory<\Database\Factories\DeparmentFactory> */
    use HasFactory;

    //has many employees
    public function employees() : HasMany
    {
        return $this->hasMany(Employee::class);
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
}
