<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Relations\HasMany;

class Deparment extends Model
{
    /** @use HasFactory<\Database\Factories\DeparmentFactory> */
    use HasFactory;

    //has many employees
    public function employees() : HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
