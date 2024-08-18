<?php

namespace App\Http\Controllers;

use App\Models\ServiceFee;
use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $transactions = Transaction::latest()->get();

        return Inertia::render('Transactions/Index', [
            'transactions' => $transactions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Transactions/Create', [
            //
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'mobile_number' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'service_type' => 'required|int|max:255',
        ]);

        $latestTransaction = Transaction::latest()->first();

        $currentBalance = $latestTransaction->balance;

        $serviceFee = ServiceFee::where('min_amount', '<=', $validated['amount'])
            ->where('max_amount', '>=', $validated['amount'])
            ->first();

        if ($serviceFee) {
            $validated['service_fee'] = $serviceFee->fee;
            $validated['net_amount'] = $validated['amount'] + $serviceFee->fee;
        }

        $validated['balance'] = $currentBalance - $validated['amount'];

        $transaction = Transaction::create($validated);

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
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
