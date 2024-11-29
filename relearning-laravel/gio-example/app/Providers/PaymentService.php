<?php


declare(strict_types=1);

namespace App\Providers;

class PaymentService
{

    public function process(): bool
    {
        echo "Paid" . PHP_EOL;
        return true;
    }
}
