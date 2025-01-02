<x-app-layout>
    <div class="py-12 bg-gradient-to-b from-gray-50 to-gray-200 dark:from-gray-800 dark:to-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Total Users: {{$usersCount}}</h3>
                    <a href="{{ route('admin.UserManagement.create') }}" 
                       class="px-4 py-2 bg-gradient-to-r from-blue-500 to-purple-500 text-white shadow-md hover:from-purple-500 hover:to-blue-500 rounded-full">
                        + Create User
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($users as $user)
                        <div class="bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-700 dark:to-gray-800 p-5 rounded-xl shadow-md transform hover:scale-105 transition-transform">
                            <div class="flex items-center mb-4">
                                <div class="h-12 w-12 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold">
                                    {{ strtoupper(substr($user->name, 0, 2)) }}
                                </div>
                                <h3 class="ml-4 text-lg font-bold text-gray-900 dark:text-white">
                                    {{ $user->name }}
                                </h3>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                <strong>Email:</strong> {{ $user->email }}
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                <strong>Role:</strong> {{ $user->role }}
                            </p>
                            <div class="flex justify-end mt-4 space-x-4">
                                <a href="{{ route('admin.UserManagement.edit', $user->id) }}" 
                                   class="text-blue-600 hover:text-blue-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor">
                                        <path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z"/>
                                    </svg>
                                </a>
                                @if(auth()->user()->id !== $user->id)
                                    <form action="{{ route('admin.UserManagement.destroy', $user->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor">
                                                <path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/>
                                            </svg>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @empty
                        <p class="col-span-full text-center text-gray-600 dark:text-gray-400">
                            No users found
                        </p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
