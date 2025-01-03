<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Available Cars') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($cars as $car)
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        {{-- Cek apakah ada gambar --}}
                        @if($car->car_details && $car->car_details->isNotEmpty())
                            <img src="{{ asset('storage/' . $car->car_details->first()->image) }}" 
                                 alt="{{ $car->name }}" 
                                 class="w-full h-48 object-cover">
                        @else
                            <img src="{{ asset('images\744465.png') }}"  
                                 alt="{{ $car->name }}" 
                                 class="w-full h-48 object-cover">
                        @endif
                        
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <h3 class="text-lg font-semibold">{{ $car->name }}</h3>
                            <p>{{ $car->brand }}</p>
                            <p>{{ $car->category }}</p>
                            <p>${{ $car->price }} per day</p>
                            <a href="{{ route('user.Rental.create', ['car' => $car->id]) }}" 
                               class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">
                                Rent Now
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center text-gray-600 dark:text-gray-300">
                        <p>No cars available at the moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
