<?php

namespace Modules\Payment\Services\Gateways;

use Modules\Payment\Entities\JibitRequest;
use Modules\Payment\Entities\Payment;
use Modules\Payment\Repositories\PaymentRepository;
use Symfony\Component\HttpFoundation\Response;

class JibitPaymentGateway
{
    public function __construct(public PaymentRepository $paymentRepository)
    {
    }

    public function processPayment($amount)
    {
        // Jibit payment processing logic should be implemented here

        // Then save the request to the database

//        $jibitRequest = new JibitRequest();
//        $jibitRequest->request = ...;
//        $jibitRequest->response = ...;
//        $jibitRequest->save();
//
//        $this->paymentRepository->savePayment($amount, $jibitRequest);

        return [
            'status' => Response::HTTP_OK,
            'data'   => [
                'message' => 'Payment processed using Jibit: ' . $amount
            ]
        ];
    }
}
