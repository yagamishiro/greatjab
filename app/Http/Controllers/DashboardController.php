<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $transaction = Transaction::latest()->first();

        return Inertia::render('Dashboard/Index', [
            'transaction' => $transaction,
        ]);
    }
}
