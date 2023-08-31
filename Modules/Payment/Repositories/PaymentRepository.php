<?php

namespace Modules\Payment\Repositories;

use Modules\Payment\Entities\Payment;

class PaymentRepository
{
    public function savePayment(int $amount, $paymentRequest)
    {
        $payment = new Payment();
        $payment->amount = $amount;
        $payment->user_id = auth()->user()->id;
        $payment->paymentable()->associate($paymentRequest);
        $payment->save();

        return $payment;
    }
}
