<?php

namespace Modules\Payment\Services;

interface PaymentStrategy
{
    public function processPayment($amount);
}
