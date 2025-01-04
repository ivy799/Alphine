<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('My Rentals') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black">
                    @foreach($rentals as $rental)
                        <div class="mb-6">
                            <h3 class="text-2xl font-semibold">{{ $rental->car->name }}</h3>
                            <p>{{ $rental->car->brand }}</p>
                            <p>{{ $rental->car->category }}</p>
                            <p>${{ $rental->car->price }} per day</p>
                            <p>Rental Period: {{ $rental->start_date }} to {{ $rental->end_date }}</p>
                            <p>Total Price: ${{ $rental->total_price }}</p>
                            <p>Status: {{ ucfirst($rental->status) }}</p>
                            @if($rental->car->car_details && $rental->car->car_details->isNotEmpty())
                                <img src="{{ asset('storage/' . $rental->car->car_details->first()->image) }}" 
                                     alt="{{ $rental->car->name }}" 
                                     class="w-full h-48 object-cover mt-4">
                            @else
                                <img src="{{ asset('images\744465.png') }}"  
                                     alt="{{ $rental->car->name }}" 
                                     class="w-full h-48 object-cover mt-4">
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
