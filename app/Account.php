<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public $fillable = [
        'title',
        'description',
        'starting_amount',
        'starting_date',
        'account_id',
        'enabled'
    ];
    public static $rules = [
        'title' => 'required|max:50',
        'starting_amount' => 'numeric'
    ];
}
