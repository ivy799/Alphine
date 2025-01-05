<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Rental Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($rentals as $rental)
                            <div class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow-md">
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ $rental->car->name }}</h3>
                                <p class="text-gray-600 dark:text-gray-400">User: {{ $rental->user->name }}</p>
                                <p class="text-gray-600 dark:text-gray-400">Start Date: {{ $rental->start_date }}</p>
                                <p class="text-gray-600 dark:text-gray-400">End Date: {{ $rental->end_date }}</p>
                                <p class="text-gray-600 dark:text-gray-400">Status: {{ $rental->status }}</p>
                                <div class="mt-4 flex justify-between">
                                    @if ($rental->status == 'pending')
                                        <form action="{{ route('admin.RentalManagement.update', $rental->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="approved">
                                            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Accept</button>
                                        </form>
                                        <form action="{{ route('admin.RentalManagement.update', $rental->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="rejected">
                                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Reject</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
