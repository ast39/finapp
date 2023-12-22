<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class CalculateCredit extends Model {

    protected $table = 'calculate_credits';

    protected $primaryKey = 'credit_id';

    protected $keyType = 'int';

    public    $incrementing = true;

    public    $timestamps = true;


    public function payments()
    {
        return $this->morphMany('App\Models\Payment', 'paymentable');
    }


    protected $with = [
        'payments',
    ];

    protected $appends = [
        //
    ];

    protected $casts = [
        //
    ];

    protected $fillable = [
        'credit_id', 'owner_id', 'title', 'payment_type', 'subject', 'amount', 'percent', 'period', 'payment',
        'created_at', 'updated_at',
    ];

    protected $hidden = [];
}
