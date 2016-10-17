<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title',
        'description'
    ];

    public static $rules = [
        'title' => 'required|max:50',
        'description' => 'max:255',
    ];
}
