<?php

namespace Modules\NumberConverter\Services;

use JetBrains\PhpStorm\ArrayShape;
use Symfony\Component\HttpFoundation\Response;

class NumberConverterService
{
    public function __construct(public NumberConverterManager $converterManager)
    {
    }

    #[ArrayShape(['status' => "int", 'data' => "null|string"])] public function humanReadableNumber($language, $number, $decimalPlaces = null): array
    {
        try {
            $number = $this->converterManager->format($language, $number, $decimalPlaces);
            $status = Response::HTTP_OK;
            $data   = $number;
        } catch (\Exception $exception) {
            $status = Response::HTTP_BAD_REQUEST;
            $data   = $exception->getMessage();
        }

        return [
            'status' => $status,
            'data'   => $data
        ];
    }
}
