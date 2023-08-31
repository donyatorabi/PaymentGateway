<?php

namespace Modules\Payment\Services\Gateways;

use Modules\Payment\Repositories\PaymentRepository;
use Modules\Payment\Services\PaymentStrategy;

class JibitPaymentStrategy implements PaymentStrategy
{
    protected $gateway;

    public function __construct()
    {
        $this->gateway = new JibitPaymentGateway(new PaymentRepository());
    }

    public function processPayment($amount)
    {
        return $this->gateway->processPayment($amount);
    }
}
