<?php

namespace App\Http\Controllers;

use App\Contracts\PaymentProcessorInterface;
use App\Http\Middleware\CheckUserRole;
use App\Models\Transaction;
use App\Services\TransactionService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function __construct(
        private readonly TransactionService $transactionService,
        private readonly PaymentProcessorInterface $paymentProcessor
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // app()->make(PaymentProcessorInterface::class); // * with this, the 'app()' helper function, along with 'make', we can instantiate any class that is bound to the container/our app.
        // App::make(PaymentProcessorInterface::class); // * this is the same as what's seen above, but with the App Facade.

        echo $request->headers->get('X-Request-Id'); // this will return the value of the header 'X-Request-Id'
        echo route('transactions.home') . '<br />'; // this will return the built url for the route 'transactions.home', in this case, 'localhost/transactions'

        echo route('transaction', ['transactionId' => 55]) . '<br />'; // this will return the built url for the route 'transactions.show', in this case, 'localhost/transactions/55'


        // * THIS WILL REDIRECT THE USER to the specified named route.
        to_route('transactions.create'); // this will return the built url for the route 'transactions.home', in this case, 'localhost/transactions'



        return view('transactions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $transactionId): string
    {

        $transaction = $this->transactionService->findTransaction($transactionId);

        return 'Transaction: ' . $transaction['transactionId'] . ' ' . $transaction['amount'];
    }

    // public function show(Transaction $transaction)
    // {
    //     return 'Transaction ' . $transaction->id;
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): string
    {
        return 'Form to create a transaction';
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): string
    {
        return 'Transaction Created';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }

    // public static function middleware()
    // {
    //     return [
    //         CheckUserRole::class,
    //     ];
    // }
}
