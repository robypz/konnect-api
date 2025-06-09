<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\BelongsTo;
use MongoDB\Laravel\Relations\BelongsToMany;
use MongoDB\Laravel\Relations\HasMany;

class Employee extends Model
{
    //protected $with = ['department', 'user'];

    /** @use HasFactory<\Database\Factories\EmployeeFactory> */
    use HasFactory;

    //belongs to user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //belongs to department
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    //belogn to many projects
    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class);
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    public function reactions(): HasMany
    {
        return $this->hasMany(Reaction::class);
    }

    public function chats(): BelongsToMany
    {
        return $this->belongsToMany(chat::class);
    }
}
