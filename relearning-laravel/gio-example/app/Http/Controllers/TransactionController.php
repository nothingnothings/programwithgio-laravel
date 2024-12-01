<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
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
        return 'Transaction ' . $transactionId;
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
}
