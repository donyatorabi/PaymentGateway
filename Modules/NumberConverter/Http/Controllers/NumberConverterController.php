<?php

namespace Modules\NumberConverter\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\NumberConverter\Http\Requests\NumberConverterRequest;
use Modules\NumberConverter\Services\NumberConverterManager;
use Modules\NumberConverter\Services\NumberConverterService;

class NumberConverterController extends Controller
{
    public function __construct(readonly public NumberConverterService $converterService)
    {
    }

    public function store(NumberConverterRequest $request): JsonResponse
    {
        $number        = $request->input('number');
        $decimalPlaces = $request->input('decimalPlaces');
        $language      = $request->input('language', 'en');

        $formattedNumber = $this->converterService->humanReadableNumber($language, $number, $decimalPlaces);

        return response()->json(['data' => $formattedNumber['data']], $formattedNumber['status']);
    }
}
