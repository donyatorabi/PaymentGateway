<?php

namespace Modules\Payment\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [];

    const PAYMENT_GATEWAY = [
        'Zarinpal',
        'Jibit'
    ];

    public function paymentable()
    {
        return $this->morphTo();
    }
}
