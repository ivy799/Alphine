<?php

namespace App\Http\Controllers;

use App\Models\rental;
use Illuminate\Http\Request;
use App\Models\cars;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $cars = cars::all();
        return view('main.user.Rental.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $car = cars::findOrFail($request->car);
        return view('main.user.Rental.create', compact('car'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'total_price' => 'required|numeric|min:0',
        ]);

        $rental = new rental();
        $rental->user_id = auth()->id();
        $rental->cars_id = $validatedData['car_id'];
        $rental->start_date = $validatedData['start_date'];
        $rental->end_date = $validatedData['end_date'];
        $rental->total_price = $validatedData['total_price'];
        $rental->status = 'pending';
        $rental->save();

        return redirect()->route('user.Rental.index')->with('success', 'Rental created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(rental $rental)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(rental $rental)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, rental $rental)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(rental $rental)
    {
        //
    }

    public function myRentals()
    {
        $rentals = rental::where('user_id', auth()->id())->with('car')->get();
        return view('main.user.Rental.myRentals', compact('rentals'));
    }
}
