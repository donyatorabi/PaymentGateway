<?php

namespace Modules\Payment\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Payment\Http\Requests\StorePayment;
use Modules\Payment\Services\PaymentService;

class PaymentController extends Controller
{

    public function __construct(public PaymentService $paymentService)
    {
    }

    public function store(string $type, StorePayment $request)
    {
        $pay = $this->paymentService->pay($type, $request->amount);

        return response()->json($pay['data'], $pay['status']);
    }

}
