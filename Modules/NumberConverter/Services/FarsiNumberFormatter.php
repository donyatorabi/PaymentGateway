<?php

namespace Modules\NumberConverter\Services;

class FarsiNumberFormatter implements NumberFormatterInterface
{
    public function format($number, $decimalPlaces = null)
    {
        $formattedNumber = (new FloatFormmater($number, $decimalPlaces))->formatNumber();

        $formattedNumber = $this->convertToPersianDigits($formattedNumber);

        return $formattedNumber;
    }

    protected function convertToPersianDigits($number)
    {
        $englishDigits = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $farsiDigits   = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];

        $farsiNumber = '';
        $length      = strlen($number);

        for ($i = 0; $i < $length; $i++) {
            $char = $number[$i];

            if (in_array($char, $englishDigits)) {
                $farsiNumber .= $farsiDigits[$char];
            } else {
                $farsiNumber .= $char;
            }
        }

        return $farsiNumber;
    }
}
