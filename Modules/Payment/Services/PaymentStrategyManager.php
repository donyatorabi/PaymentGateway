<?php

namespace Modules\Payment\Services;

class PaymentStrategyManager
{
    protected $strategies = [];
    protected $currentStrategyIndex = 0;

    public function addStrategy(PaymentStrategy $strategy)
    {
        $this->strategies[] = $strategy;
    }

    public function processPayment($amount)
    {
        $totalStrategies = count($this->strategies);

        while ($this->currentStrategyIndex < $totalStrategies) {
            $strategy = $this->strategies[$this->currentStrategyIndex];

            try {
                return $strategy->processPayment($amount);
            } catch (\Exception $e) {
                // Handle error and switch to the next strategy
                $this->currentStrategyIndex++;
            }
        }

        // All strategies failed, handle accordingly
        throw new \RuntimeException('All payment strategies failed.');
    }
}
