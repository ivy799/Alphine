<?php

namespace App\Http\Controllers;

use App\Models\cars;
use Illuminate\Http\Request;
use App\Models\car_details;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('main.admin.CarManagement.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('main.admin.CarManagement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'required|string',
            'colors' => 'required|array',
            'colors.*' => 'required|string|max:255',
            'images' => 'required|array',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $car = new cars();
        $car->name = $validatedData['name'];
        $car->brand = $validatedData['brand'];
        $car->category = $validatedData['category'];
        $car->price = $validatedData['price'];
        $car->stock = $validatedData['stock'];
        $car->description = $validatedData['description'];
        $car->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('images', 'public');
                car_details::create([
                    'car_id' => $car->id,
                    'color' => $validatedData['colors'][$index],
                    'image' => $path,
                ]);
            }
        }

        return redirect()->route('admin.CarManagement.index')->with('success', 'Car created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(cars $cars)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cars $cars)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cars $cars)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cars $cars)
    {
        //
    }
}
