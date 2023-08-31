<?php

namespace Modules\Payment\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JibitRequest extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function payment()
    {
        return $this->morphOne(Payment::class, 'paymentable');
    }
}
