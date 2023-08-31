<?php

namespace Modules\NumberConverter\Services;

class EnglishNumberFormatter implements NumberFormatterInterface
{
    public function format($number, $decimalPlaces = null)
    {
        // Format the number with the adjusted decimal places
        $formattedNumber = (new FloatFormmater($number, $decimalPlaces))->formatNumber();

        return $formattedNumber;
    }

}
