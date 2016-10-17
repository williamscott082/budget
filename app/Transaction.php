<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'date',
        'beneficiary',
        'description',
        'category_id',
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
}
