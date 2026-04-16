<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Event Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">From the `events` table</p>
                        <h3 class="mt-2 text-2xl font-bold text-gray-900 dark:text-gray-100">
                            {{ $event->title }}
                        </h3>
                    </div>
                    <a href="{{ route('events.index') }}"
                       class="text-sm font-medium text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">
                        Back to Events
                    </a>
                </div>

                <div class="mt-6 grid gap-4 md:grid-cols-2">
                    <div class="rounded-lg border border-gray-200 dark:border-gray-700 p-4">
                        <p class="text-sm text-gray-500 dark:text-gray-400">Location</p>
                        <p class="mt-1 text-gray-900 dark:text-gray-100">{{ $event->location }}</p>
                    </div>
                    <div class="rounded-lg border border-gray-200 dark:border-gray-700 p-4">
                        <p class="text-sm text-gray-500 dark:text-gray-400">Event Date</p>
                        <p class="mt-1 text-gray-900 dark:text-gray-100">
                            {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y H:i') }}
                        </p>
                    </div>
                    <div class="rounded-lg border border-gray-200 dark:border-gray-700 p-4">
                        <p class="text-sm text-gray-500 dark:text-gray-400">Capacity</p>
                        <p class="mt-1 text-gray-900 dark:text-gray-100">{{ $event->capacity }}</p>
                    </div>
                    <div class="rounded-lg border border-gray-200 dark:border-gray-700 p-4">
                        <p class="text-sm text-gray-500 dark:text-gray-400">Created</p>
                        <p class="mt-1 text-gray-900 dark:text-gray-100">
                            {{ $event->created_at?->format('d M Y') }}
                        </p>
                    </div>
                </div>

                <div class="mt-6 rounded-lg border border-gray-200 dark:border-gray-700 p-4">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Description</p>
                    <p class="mt-2 text-gray-900 dark:text-gray-100 whitespace-pre-line">{{ $event->description }}</p>
                </div>

                <div class="mt-6 flex flex-wrap gap-3">
                    @auth
                        @if(Auth::user()->role !== 'admin')
                            <form method="POST" action="{{ route('bookings.store', $event) }}">
                                @csrf
                                <button type="submit"
                                        class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">
                                    Book Event
                                </button>
                            </form>
                        @endif

                        @if(Auth::user()->role === 'admin')
                            <a href="{{ route('events.edit', $event) }}"
                               class="inline-flex items-center rounded-md border border-gray-300 dark:border-gray-600 px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700">
                                Edit Event
                            </a>
                        @endif
                    @else
                        <a href="{{ route('login') }}"
                           class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">
                            Log In to Book
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
