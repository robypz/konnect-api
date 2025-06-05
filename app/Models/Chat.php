<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\BelongsToMany;
use MongoDB\Laravel\Relations\HasMany;

class Chat extends Model
{
    function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    function participants(): BelongsToMany
    {
        return $this->belongsToMany(Employee::class);
    }
}
