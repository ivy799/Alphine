<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gradient-to-r from-gray-50 to-gray-200 dark:from-gray-800 dark:to-gray-900 overflow-hidden shadow-md sm:rounded-lg p-6">
                <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center py-3">
                    {{ __('Create User') }}
                </h1>
                <form method="POST" action="{{ route('admin.UserManagement.store') }}">
                    @csrf
                    <div class="grid grid-cols-1 gap-6 mt-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama</label>
                            <input type="text" name="name" class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-600 rounded-md" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                            <input type="text" name="email" class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-600 rounded-md" required autocomplete="off">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                            <input type="password" name="password" class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-600 rounded-md" required autocomplete="off">
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="px-4 py-2 bg-gradient-to-r from-indigo-500 to-purple-500 text-white shadow-md hover:from-purple-500 hover:to-indigo-500 rounded-md">Create User</button>
                        <a href="{{ route('admin.UserManagement.index') }}" class="px-4 py-2 bg-gradient-to-r from-gray-500 to-gray-700 text-white shadow-md hover:from-gray-700 hover:to-gray-500 rounded-md ml-2">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
