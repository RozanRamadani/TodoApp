<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    // Define the relationship with Todo model
    public function todos()
    {
        return $this->hasMany('App\Models\Todo');
    }
}
