<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Payment extends Model {

    protected $table = 'payments';

    protected $primaryKey = 'payment_id';

    protected $keyType = 'int';

    public    $incrementing = true;

    public    $timestamps = true;


    public function paymentable()
    {
        return $this->morphTo();
    }


    protected $with = [
        //
    ];

    protected $appends = [
        //
    ];

    protected $casts = [
        //
    ];

    protected $fillable = [
        'payment_id', 'paymentable_id', 'paymentable_type', 'payment_date', 'amount', 'note', 'status',
    ];

    protected $hidden = [];
}
