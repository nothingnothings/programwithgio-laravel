<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
