<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Events
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4 text-gray-900 dark:text-gray-100">All Events</h3>

                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @if($events->count())
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="border-b">
                                <th class="text-left p-2 text-gray-900 dark:text-gray-100">Title</th>
                                <th class="text-left p-2 text-gray-900 dark:text-gray-100">Location</th>
                                <th class="text-left p-2 text-gray-900 dark:text-gray-100">Date</th>
                                <th class="text-left p-2 text-gray-900 dark:text-gray-100">Capacity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($events as $event)
                                <tr class="border-b">
                                    <td class="p-2 text-gray-900 dark:text-gray-100">{{ $event->title }}</td>
                                    <td class="p-2 text-gray-900 dark:text-gray-100">{{ $event->location }}</td>
                                    <td class="p-2 text-gray-900 dark:text-gray-100">{{ $event->event_date }}</td>
                                    <td class="p-2 text-gray-900 dark:text-gray-100">{{ $event->capacity }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-gray-700 dark:text-gray-300">No events found.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>