<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-300 leading-tight">
            {{ __('My Rentals') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-[#1e1e2e]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gradient-to-r from-[#2e2e3e] to-[#1e1e2e] overflow-hidden shadow-md sm:rounded-lg p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($rentals as $rental)
                        <div class="bg-[#2e2e3e] p-6 rounded-lg shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-xl">
                            <h3 class="text-2xl font-semibold text-[#ffca3a] mb-2">
                                {{ $rental->car->name }}
                            </h3>
                            <p class="text-gray-400">Brand: {{ $rental->car->brand }}</p>
                            <p class="text-gray-400">Category: {{ $rental->car->category }}</p>
                            <p class="text-gray-400">Price: ${{ $rental->car->price }} per day</p>
                            <p class="text-gray-400">Rental Period: {{ $rental->start_date }} to {{ $rental->end_date }}</p>
                            <p class="text-gray-400">Total Price: ${{ $rental->total_price }}</p>
                            <p class="text-gray-400">Status: {{ ucfirst($rental->status) }}</p>
                            
                            <div class="mt-4">
                                @if($rental->car->car_details && $rental->car->car_details->isNotEmpty())
                                    <img src="{{ asset('storage/' . $rental->car->car_details->first()->image) }}" 
                                         alt="{{ $rental->car->name }}" 
                                         class="w-full h-48 object-cover rounded-lg">
                                @else
                                    <img src="{{ asset('images/744465.png') }}"  
                                         alt="{{ $rental->car->name }}" 
                                         class="w-full h-48 object-cover rounded-lg">
                                @endif
                            </div>

                            <form method="POST" action="{{ route('user.Rental.cancel', $rental->id) }}" class="mt-4">
                                @csrf
                                <button type="submit" 
                                        class="w-full bg-[#ff6f61] text-white px-4 py-2 rounded shadow-md transition duration-300 hover:bg-[#d95a50] hover:shadow-lg">
                                    Cancel Rental
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
