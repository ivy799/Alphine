<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Rent a Car') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('user.Rental.store') }}">
                        @csrf
                        <input type="hidden" name="car_id" value="{{ $car->id }}">
                        <div>
                            <x-label for="start_date" :value="__('Start Date')" />
                            <x-input id="start_date" class="block mt-1 w-full" type="date" name="start_date" required />
                        </div>
                        <div class="mt-4">
                            <x-label for="end_date" :value="__('End Date')" />
                            <x-input id="end_date" class="block mt-1 w-full" type="date" name="end_date" required />
                        </div>
                        <div class="mt-4">
                            <x-label for="total_price" :value="__('Total Price')" />
                            <x-input id="total_price" class="block mt-1 w-full" type="number" name="total_price" required />
                        </div>
                        <div class="mt-4">
                            <x-button>
                                {{ __('Submit') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
