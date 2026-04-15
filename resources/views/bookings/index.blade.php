<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            My Bookings
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">

                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @if($bookings->isEmpty())
                    <p class="text-gray-700 dark:text-gray-300">
                        You have no bookings yet.
                    </p>
                @else
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="border-b">
                                <th class="text-left p-2 text-gray-900 dark:text-gray-100">Event</th>
                                <th class="text-left p-2 text-gray-900 dark:text-gray-100">Location</th>
                                <th class="text-left p-2 text-gray-900 dark:text-gray-100">Date</th>
                                <th class="text-left p-2 text-gray-900 dark:text-gray-100">Booked On</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $booking)
                                <tr class="border-b">
                                    <td class="p-2 text-gray-900 dark:text-gray-100">
                                        {{ $booking->event->title }}
                                    </td>
                                    <td class="p-2 text-gray-900 dark:text-gray-100">
                                        {{ $booking->event->location }}
                                    </td>
                                    <td class="p-2 text-gray-900 dark:text-gray-100">
                                        {{ $booking->event->event_date }}
                                    </td>
                                    <td class="p-2 text-gray-900 dark:text-gray-100">
                                        {{ $booking->created_at->format('d M Y') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>