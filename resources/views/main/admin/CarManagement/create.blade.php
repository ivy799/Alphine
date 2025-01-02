<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Create New Car') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-100">
                    <form method="POST" action="{{ route('admin.CarManagement.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Name -->
                        <div class="mt-4">
                            <label for="name" class="block text-sm font-medium text-gray-200">{{ __('Name') }}</label>
                            <input id="name" class="block mt-1 w-full bg-gray-800 border border-gray-700 text-gray-200 rounded focus:ring focus:ring-blue-500" type="text" name="name" required autofocus />
                        </div>

                        <!-- Brand -->
                        <div class="mt-4">
                            <label for="brand" class="block text-sm font-medium text-gray-200">{{ __('Brand') }}</label>
                            <input id="brand" class="block mt-1 w-full bg-gray-800 border border-gray-700 text-gray-200 rounded focus:ring focus:ring-blue-500" type="text" name="brand" required />
                        </div>

                        <!-- Category -->
                        <div class="mt-4">
                            <label for="category" class="block text-sm font-medium text-gray-200">{{ __('Category') }}</label>
                            <select id="category" name="category" class="block mt-1 w-full bg-gray-800 border border-gray-700 text-gray-200 rounded focus:ring focus:ring-blue-500">
                                <option value="Sedan">Sedan</option>
                                <option value="SUV">SUV</option>
                                <option value="Truck">Truck</option>
                                <option value="Hatchback">Hatchback</option>
                            </select>
                        </div>

                        <!-- Price -->
                        <div class="mt-4">
                            <label for="price" class="block text-sm font-medium text-gray-200">{{ __('Price') }}</label>
                            <input id="price" class="block mt-1 w-full bg-gray-800 border border-gray-700 text-gray-200 rounded focus:ring focus:ring-blue-500" type="number" name="price" required />
                        </div>

                        <!-- Stock -->
                        <div class="mt-4">
                            <label for="stock" class="block text-sm font-medium text-gray-200">{{ __('Stock') }}</label>
                            <input id="stock" class="block mt-1 w-full bg-gray-800 border border-gray-700 text-gray-200 rounded focus:ring focus:ring-blue-500" type="number" name="stock" required />
                        </div>

                        <!-- Description -->
                        <div class="mt-4">
                            <label for="description" class="block text-sm font-medium text-gray-200">{{ __('Description') }}</label>
                            <textarea id="description" class="block mt-1 w-full bg-gray-800 border border-gray-700 text-gray-200 rounded focus:ring focus:ring-blue-500" name="description" required></textarea>
                        </div>

                        <!-- Colors -->
                        <div class="mt-4">
                            <label for="colors" class="block text-sm font-medium text-gray-200">{{ __('Colors') }}</label>
                            <div id="colors-container">
                                <input id="colors" class="block mt-1 w-full bg-gray-800 border border-gray-700 text-gray-200 rounded focus:ring focus:ring-blue-500" type="text" name="colors[]" required />
                            </div>
                            <button type="button" class="mt-2 px-4 py-2 bg-blue-600 text-white rounded" onclick="addColorField()">Add More Colors</button>
                        </div>

                        <!-- Images -->
                        <div class="mt-4">
                            <label for="images" class="block text-sm font-medium text-gray-200">{{ __('Images') }}</label>
                            <input id="images" class="block mt-1 w-full bg-gray-800 border border-gray-700 text-gray-200 rounded focus:ring focus:ring-blue-500" type="file" name="images[]" multiple required />
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-end mt-4">
                            <button class="ml-4 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                                {{ __('Create') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function addColorField() {
            const colorsContainer = document.getElementById('colors-container');
            const newColorInput = document.createElement('input');
            newColorInput.type = 'text';
            newColorInput.name = 'colors[]';
            newColorInput.className = 'block mt-1 w-full bg-gray-800 border border-gray-700 text-gray-200 rounded focus:ring focus:ring-blue-500';
            colorsContainer.appendChild(newColorInput);
        }
    </script>
</x-app-layout>
