<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;


class CabinetCredit extends Model {

    use Filterable;


    protected $table = 'cabinet_credits';

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
        'credit_id', 'owner_id', 'title', 'creditor', 'amount', 'percent', 'period', 'payment',
        'start_date', 'payment_date', 'status',
        'created_at', 'updated_at',
    ];

    protected $hidden = [];
}
