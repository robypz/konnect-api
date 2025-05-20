<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\BelongsTo;

class Event extends Model
{
    /** @use HasFactory<\Database\Factories\EventFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'date',
        'time',
        'start_time',
        'end_time',
        'location',
        'description',
        'link',
        'event_type',
    ];

    //belongs to user
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //belongs to department
    public function department() : BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    //belongs to projects
    public function project() : BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
