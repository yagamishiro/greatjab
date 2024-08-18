<?php

namespace App\Http\Controllers;

use App\Models\ServiceFee;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ServiceFeeController extends Controller
{
    /**
     * Display a listing of service fees.
     */
    public function index()
    {
        $serviceFees = ServiceFee::all();

        return Inertia::render('ServiceFees/Index', [
            'serviceFees' => $serviceFees
        ]);
    }

    /**
     * Show the form for creating a new service fee.
     */
    public function create()
    {
        return Inertia::render('ServiceFees/Create');
    }

    /**
     * Store a newly created service fee in the database.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'min_amount' => 'required|numeric|min:0',
            'max_amount' => 'required|numeric|min:0|gt:min_amount',
            'fee' => 'required|numeric|min:0',
        ]);

        ServiceFee::create($data);

        return redirect()->route('service-fees.index')->with('success', 'Service fee created successfully!');
    }

    /**
     * Show the form for editing a service fee.
     */
    public function edit(ServiceFee $serviceFee)
    {
        return Inertia::render('ServiceFees/Edit', [
            'serviceFee' => $serviceFee
        ]);
    }

    /**
     * Update the specified service fee in the database.
     */
    public function update(Request $request, ServiceFee $serviceFee)
    {
        $data = $request->validate([
            'min_amount' => 'required|numeric|min:0',
            'max_amount' => 'required|numeric|min:0|gt:min_amount',
            'fee' => 'required|numeric|min:0',
        ]);

        $serviceFee->update($data);

        return redirect()->route('service-fees.index')->with('success', 'Service fee updated successfully!');
    }
}