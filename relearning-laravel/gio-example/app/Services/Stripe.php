<?php

namespace App\Services;

use App\Contracts\PaymentProcessorInterface;

class Stripe implements PaymentProcessorInterface
{

    public function __construct(private array $config, private SalesTaxCalculator $salesTaxCalculator) {}


    public function process(array $transaction): void
    {
        // this is a dummy implementation, it will be replaced by the real implementation
        echo 'Stripe Processed Transaction: ' . $transaction['transactionId'] . ' ' . $transaction['amount'];
    }
}
