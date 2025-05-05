<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\BelongsTo;

class Event extends Model
{
    /** @use HasFactory<\Database\Factories\EventFactory> */
    use HasFactory;

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

    //belongs to projects
    public function project() : BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
