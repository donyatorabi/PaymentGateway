<?php

namespace Modules\NumberConverter\Services;

interface NumberFormatterInterface
{
    public function format($number, $decimalPlaces = null);
}
