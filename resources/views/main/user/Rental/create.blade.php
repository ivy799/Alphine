<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Rent a Car') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black">
                    <div class="mb-6">
                        <h3 class="text-2xl font-semibold">{{ $car->name }}</h3>
                        <p>{{ $car->brand }}</p>
                        <p>{{ $car->category }}</p>
                        <p>${{ $car->price }} per day</p>
                        @if($car->car_details && $car->car_details->isNotEmpty())
                            <img src="{{ asset('storage/' . $car->car_details->first()->image) }}" 
                                 alt="{{ $car->name }}" 
                                 class="w-full h-48 object-cover mt-4">
                        @else
                            <img src="{{ asset('images\744465.png') }}"  
                                 alt="{{ $car->name }}" 
                                 class="w-full h-48 object-cover mt-4">
                        @endif
                    </div>
                    <form method="POST" action="{{ route('user.Rental.store') }}">
                        @csrf
                        <input type="hidden" name="car_id" value="{{ $car->id }}">
                        <div>
                            <label for="start_date" class="block font-medium text-sm text-black">{{ __('Start Date') }}</label>
                            <input id="start_date" class="block mt-1 w-full" type="date" name="start_date" required />
                        </div>
                        <div class="mt-4">
                            <label for="end_date" class="block font-medium text-sm text-black">{{ __('End Date') }}</label>
                            <input id="end_date" class="block mt-1 w-full" type="date" name="end_date" required />
                        </div>
                        <div class="mt-4">
                            <label for="total_price" class="block font-medium text-sm text-black">{{ __('Total Price') }}</label>
                            <input id="total_price" class="block mt-1 w-full" type="number" name="total_price" required readonly />
                        </div>
                        <div class="mt-4">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded">
                                {{ __('Submit') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const startDateInput = document.getElementById('start_date');
            const endDateInput = document.getElementById('end_date');
            const totalPriceInput = document.getElementById('total_price');
            const pricePerDay = {{ $car->price }};

            function calculateTotalPrice() {
                const startDate = new Date(startDateInput.value);
                const endDate = new Date(endDateInput.value);
                if (startDate && endDate && endDate >= startDate) {
                    const timeDiff = endDate - startDate;
                    const daysDiff = Math.ceil(timeDiff / (1000 * 3600 * 24)) + 1;
                    totalPriceInput.value = daysDiff * pricePerDay;
                } else {
                    totalPriceInput.value = 0;
                }
            }

            startDateInput.addEventListener('change', calculateTotalPrice);
            endDateInput.addEventListener('change', calculateTotalPrice);
        });
    </script>
</x-app-layout>
