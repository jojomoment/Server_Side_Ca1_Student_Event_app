<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white leading-tight">
            Create Event
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-slate-950 via-slate-900 to-blue-950 py-10">

        <div class="max-w-2xl mx-auto px-4">

            <div class="bg-white/10 backdrop-blur-md border border-white/10 rounded-2xl shadow-xl p-6">

                <h3 class="text-xl font-bold text-white mb-1">New Event</h3>
                <p class="text-sm text-gray-300 mb-6">
                    Add event details below.
                </p>

                @if ($errors->any())
                    <div class="mb-4 bg-red-500/10 border border-red-500/30 text-red-300 p-3 rounded">
                        <ul class="text-sm">
                            @foreach ($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- TITLE -->
                    <div class="mb-4">
                        <label class="block text-sm text-white font-medium mb-1">Event Title</label>
                        <input type="text" name="title" value="{{ old('title') }}"
                               class="w-full rounded-lg bg-slate-800 border border-white/20 text-white px-3 py-2 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 outline-none"
                               placeholder="Enter event title">
                    </div>

                    <!-- DESCRIPTION -->
                    <div class="mb-4">
                        <label class="block text-sm text-white font-medium mb-1">Description</label>
                        <textarea name="description" rows="4"
                                  class="w-full rounded-lg bg-slate-800 border border-white/20 text-white px-3 py-2 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 outline-none"
                                  placeholder="Write a short description">{{ old('description') }}</textarea>
                    </div>

                    <!-- LOCATION -->
                    <div class="mb-4">
                        <label class="block text-sm text-white font-medium mb-1">Location</label>
                        <input type="text" name="location" value="{{ old('location') }}"
                               class="w-full rounded-lg bg-slate-800 border border-white/20 text-white px-3 py-2 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 outline-none"
                               placeholder="Enter location">
                    </div>

                    <!-- CAPACITY -->
                    <div class="mb-4">
                        <label class="block text-sm text-white font-medium mb-1">Capacity</label>
                        <input type="number" name="capacity" value="{{ old('capacity') }}"
                               class="w-full rounded-lg bg-slate-800 border border-white/20 text-white px-3 py-2 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 outline-none"
                               placeholder="Enter number of seats">
                    </div>

                    <!-- DATE -->
                    <div class="mb-4">
                        <label class="block text-sm text-white font-medium mb-1">Event Date</label>
                        <input type="datetime-local" name="event_date" value="{{ old('event_date') }}"
                               class="w-full rounded-lg bg-slate-800 border border-white/20 text-white px-3 py-2 focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>

                    <!-- IMAGE -->
                    <div class="mb-6">
                        <label class="block text-sm text-white font-medium mb-1">Event Image</label>
                        <input type="file" name="image"
                               class="block w-full text-sm text-gray-300 file:bg-blue-600 file:text-white file:px-3 file:py-1 file:rounded file:border-0 hover:file:bg-blue-700">
                    </div>

                    <!-- BUTTONS -->
                    <div class="flex gap-3">
                        <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                            Save Event
                        </button>

                        <a href="{{ route('events.index') }}"
                           class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg">
                            Cancel
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>