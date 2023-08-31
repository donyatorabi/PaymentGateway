<?php

namespace Modules\Payment\Services;

use Modules\Payment\Entities\Payment;
use Modules\Payment\Services\Gateways\JibitPaymentStrategy;
use Modules\Payment\Services\Gateways\ZarinpalPaymentStrategy;
use Symfony\Component\HttpFoundation\Response;

class PaymentService
{
    const PAYMENT_GATEWAY_STRATEGIES = [
        'Zarinpal' => ZarinpalPaymentStrategy::class,
        'Jibit'    => JibitPaymentStrategy::class
    ];

    public function __construct(public PaymentStrategyManager $paymentStrategyManager)
    {
    }

    public function pay(string $type, int $amount)
    {
        $validGateways = array_keys(self::PAYMENT_GATEWAY_STRATEGIES);

        if ($amount < 2000) {
            return [
                'status' => Response::HTTP_BAD_REQUEST,
                'data' => [
                    'message' => 'invalid amount, minimum amount should be 2000'
                ]
            ];
        }

        if (!in_array($type, $validGateways)) {
            return [
                'status' => Response::HTTP_BAD_REQUEST,
                'data' => [
                    'message' => 'invalid type provided, valid types: ' . implode(', ', $validGateways)
                ]
            ];
        }

        $gateways = self::PAYMENT_GATEWAY_STRATEGIES;
        $gatewayStrategy = self::PAYMENT_GATEWAY_STRATEGIES[$type];
        unset($gateways[$type]);
        $this->paymentStrategyManager->addStrategy(new $gatewayStrategy());

        foreach ($gateways as $gateway) {
            $this->paymentStrategyManager->addStrategy(new $gateway());
        }

        return $this->paymentStrategyManager->processPayment($amount);
    }
}
