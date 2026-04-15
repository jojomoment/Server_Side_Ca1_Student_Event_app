<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- Login Confirmation -->
                    <p class="text-lg">
                        {{ __("You're logged in!") }}
                    </p>

                    <!-- Welcome Message -->
                    <p class="text-lg mt-2">
                        Welcome, {{ Auth::user()->name }}!
                    </p>

                    <!-- Navigation Buttons -->
                    <div class="mt-6 flex flex-wrap gap-4">
                        <a href="{{ route('events.index') }}"
                           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                            View Events
                        </a>

                        <a href="{{ route('bookings.index') }}"
                           class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                            My Bookings
                        </a>

                        @if(Auth::user()->role === 'admin')
                            <a href="{{ route('events.create') }}"
                               class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded">
                                Create Event
                            </a>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>