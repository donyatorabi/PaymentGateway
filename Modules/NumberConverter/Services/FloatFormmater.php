<?php

namespace Modules\NumberConverter\Services;

class FloatFormmater
{
    public function __construct(public $number, public $decimalPlace = null)
    {
    }

    public function formatNumber(): string
    {
        $decimalQuantity = strlen(substr(strrchr($this->number, "."), 1));

        if ($this->decimalPlace > $decimalQuantity) {
            $this->number /= (10 ** ($this->decimalPlace - $decimalQuantity));
        } elseif ($this->decimalPlace < $decimalQuantity) {
            $this->number *= (10 ** ($decimalQuantity - $this->decimalPlace));
        }

        return number_format($this->number, $this->decimalPlace);
    }
}
