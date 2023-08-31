<?php

namespace Modules\NumberConverter\Services;

use Exception;

class NumberConverterManager
{
    protected array $formatters = [];

    public function registerFormatter($language, $formatter)
    {
        $this->formatters[$language] = $formatter;
    }

    /**
     * @throws Exception
     */
    public function format($language, $number, $decimalPlaces = null)
    {
        if (isset($this->formatters[$language])) {
            return $this->formatters[$language]->format($number, $decimalPlaces);
        }

        return null;
    }
}
