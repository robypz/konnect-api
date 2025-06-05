<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\BelongsTo;

class Message extends Model
{
    function sender(): BelongsTo
    {
        return $this->belongsTo(Employee::class,'sender_id');
    }

    function chat(): BelongsTo
    {
        return $this->belongsTo(Chat::class);
    }
}
