<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center py-3">
                        {{ __('Update User') }}
                    </h1>
                    <form method="POST" action="{{ route('admin.UserManagement.update', $user->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 gap-6 mt-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-600 rounded-md" required>
                                @error('name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-600 rounded-md" required>
                                @error('email')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password (kosongkan jika tidak ingin mengubah)</label>
                                <div class="relative">
                                    <input type="password" id="password" name="password" class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-600 rounded-md pr-10">
                                    <button type="button" onclick="togglePasswordVisibility()" class="absolute inset-y-0 right-0 px-3 py-2">
                                        <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M10 2C5.58 2 1.73 4.61.29 8.5c-.1.26-.1.54 0 .8C1.73 15.39 5.58 18 10 18s8.27-2.61 9.71-6.5c.1-.26.1-.54 0-.8C18.27 4.61 14.42 2 10 2zm0 14c-3.31 0-6.31-2.01-7.59-5C3.69 6.01 6.69 4 10 4s6.31 2.01 7.59 5c-1.28 2.99-4.28 5-7.59 5zm0-9a4 4 0 100 8 4 4 0 000-8zm0 6a2 2 0 110-4 2 2 0 010 4z"/>
                                        </svg>
                                    </button>
                                </div>
                                @error('password')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="px-4 py-2 bg-gradient-to-r from-indigo-500 to-purple-500 text-white shadow-md hover:from-purple-500 hover:to-indigo-500 rounded-md">Update User</button>
                            <a href="{{ route('admin.UserManagement.index') }}" class="px-4 py-2 bg-gradient-to-r from-gray-500 to-gray-700 text-white shadow-md hover:from-gray-700 hover:to-gray-500 rounded-md ml-2">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eye-icon');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('text-gray-500');
            eyeIcon.classList.add('text-gray-700');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('text-gray-700');
            eyeIcon.classList.add('text-gray-500');
        }
    }
</script>
