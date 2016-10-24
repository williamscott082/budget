<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $dates = ['date'];

    protected $fillable = [
        'date',
        'beneficiary',
        'description',
        'category_id',
        'account_id',
        'amount'
    ];

    public static $rules = [
        'date' => 'required|date',
        'beneficiary' => 'max:50',
        'category_id' => 'required|integer',
        'account_id' => 'required|integer',
        'amount' => 'required|numeric',
    ];

    /**
     * A transaction is created by one user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function importStatement($file)
    {

    }
}
