<?php

namespace Modules\Payment\Services\Gateways;

use Modules\Payment\Repositories\PaymentRepository;
use Modules\Payment\Services\PaymentStrategy;

class ZarinpalPaymentStrategy implements PaymentStrategy
{
    protected $gateway;

    public function __construct()
    {
        $this->gateway = new ZarinpalPaymentGateway(new PaymentRepository());
    }

    public function processPayment($amount)
    {
        return $this->gateway->processPayment($amount);
    }
}
