<?php

namespace Modules\Payment\Services\Gateways;

use Modules\Payment\Repositories\PaymentRepository;
use Symfony\Component\HttpFoundation\Response;

class ZarinpalPaymentGateway
{
    public function __construct(public PaymentRepository $paymentRepository)
    {
    }

    public function processPayment($amount)
    {
        // Zarinpal payment processing logic should be implemented here

        // Then save the request to the database

//        $zarinpalRequest = new ZarinpalRequest();
//        $zarinpalRequest->request = ...;
//        $zarinpalRequest->response = ...;
//        $zarinpalRequest->save();
//
//        $this->paymentRepository->savePayment($amount, $zarinpalRequest);

        return [
            'status' => Response::HTTP_OK,
            'data'   => [
                'message' => 'Payment processed using Zarinpal: ' . $amount
            ]
        ];
    }
}
