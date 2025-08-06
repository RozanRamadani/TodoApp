<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['name', 'status'];

    // Additional model methods can be added here if needed
}
