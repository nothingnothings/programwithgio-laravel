<?php

declare(strict_types=1);

namespace App\Services;

class SalesTaxCalculator
{
    public function calculate(float $amount): float
    {
        return $amount * 0.1;
    }
}
