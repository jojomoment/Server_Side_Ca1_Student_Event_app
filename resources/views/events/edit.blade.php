<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Event
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('events.update', $event) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                        <input type="text" name="title" value="{{ old('title', $event->title) }}"
                               class="mt-1 block w-full rounded border-gray-300" required>
                        @error('title')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                        <textarea name="description" rows="4"
                                  class="mt-1 block w-full rounded border-gray-300" required>{{ old('description', $event->description) }}</textarea>
                        @error('description')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Location</label>
                        <input type="text" name="location" value="{{ old('location', $event->location) }}"
                               class="mt-1 block w-full rounded border-gray-300" required>
                        @error('location')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Event Date</label>
                        <input type="datetime-local" name="event_date"
                               value="{{ old('event_date', \Carbon\Carbon::parse($event->event_date)->format('Y-m-d\TH:i')) }}"
                               class="mt-1 block w-full rounded border-gray-300" required>
                        @error('event_date')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Capacity</label>
                        <input type="number" name="capacity" value="{{ old('capacity', $event->capacity) }}"
                               min="1" class="mt-1 block w-full rounded border-gray-300" required>
                        @error('capacity')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex gap-3">
                        <button type="submit"
                                class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded">
                            Update Event
                        </button>

                        <a href="{{ route('events.index') }}"
                           class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>