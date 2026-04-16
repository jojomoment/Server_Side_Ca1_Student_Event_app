<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Events
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100">All Events</h3>

                    @auth
                        @if(Auth::user()->role === 'admin')
                            <a href="{{ route('events.create') }}"
                               class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded">
                                Create Event
                            </a>
                        @endif
                    @endauth
                </div>

                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @if($events->count())
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="border-b">
                                    <th class="text-left p-2 text-gray-900 dark:text-gray-100">Image</th>
                                    <th class="text-left p-2 text-gray-900 dark:text-gray-100">Title</th>
                                    <th class="text-left p-2 text-gray-900 dark:text-gray-100">Location</th>
                                    <th class="text-left p-2 text-gray-900 dark:text-gray-100">Date</th>
                                    <th class="text-left p-2 text-gray-900 dark:text-gray-100">Seats Left</th>
                                    <th class="text-left p-2 text-gray-900 dark:text-gray-100">Status</th>
                                    <th class="text-left p-2 text-gray-900 dark:text-gray-100">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($events as $event)
                                    @php
                                        $booked = \App\Models\Booking::where('event_id', $event->id)->count();
                                        $remaining = $event->capacity - $booked;
                                        $isFull = $remaining <= 0;
                                    @endphp

                                    <tr class="border-b align-middle">
                                        <td class="p-2">
                                            @if($event->image)
                                                <img src="{{ asset('storage/' . $event->image) }}"
                                                     alt="{{ $event->title }}"
                                                     class="w-20 h-14 object-cover rounded">
                                            @else
                                                <div class="w-20 h-14 bg-gray-200 dark:bg-gray-700 rounded flex items-center justify-center text-xs text-gray-500">
                                                    No Image
                                                </div>
                                            @endif
                                        </td>

                                        <td class="p-2 text-gray-900 dark:text-gray-100">
                                            {{ $event->title }}
                                        </td>

                                        <td class="p-2 text-gray-900 dark:text-gray-100">
                                            {{ $event->location }}
                                        </td>

                                        <td class="p-2 text-gray-900 dark:text-gray-100">
                                            {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y H:i') }}
                                        </td>

                                        <td class="p-2 font-semibold {{ $isFull ? 'text-red-500' : 'text-green-600' }}">
                                            {{ max($remaining, 0) }}
                                        </td>

                                        <td class="p-2">
                                            @if($isFull)
                                                <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-sm">
                                                    Full
                                                </span>
                                            @else
                                                <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-sm">
                                                    Available
                                                </span>
                                            @endif
                                        </td>

                                        <td class="p-2">
                                            <div class="flex flex-wrap gap-2">
                                                @auth
                                                    @if(Auth::user()->role !== 'admin')
                                                        @if(!$isFull)
                                                            <form method="POST" action="{{ route('bookings.store', $event) }}">
                                                                @csrf
                                                                <button type="submit"
                                                                        class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded">
                                                                    Book
                                                                </button>
                                                            </form>
                                                        @else
                                                            <button disabled
                                                                    class="bg-gray-400 text-white px-3 py-1 rounded cursor-not-allowed">
                                                                Full
                                                            </button>
                                                        @endif
                                                    @endif

                                                    @if(Auth::user()->role === 'admin')
                                                        <a href="{{ route('events.edit', $event) }}"
                                                           class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">
                                                            Edit
                                                        </a>

                                                        <form method="POST" action="{{ route('events.destroy', $event) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                    onclick="return confirm('Delete this event?')"
                                                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    @endif
                                                @else
                                                    <a href="{{ route('login') }}"
                                                       class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded">
                                                        Log In to Book
                                                    </a>
                                                @endauth
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-gray-700 dark:text-gray-300">No events found.</p>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>