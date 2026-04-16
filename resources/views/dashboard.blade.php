<x-app-layout>
    <div class="min-h-screen bg-slate-950 text-white">

        {{-- HERO --}}
        <section class="bg-slate-100 text-slate-900">
            <div class="max-w-7xl mx-auto px-6 lg:px-10 py-16">

                <div class="grid lg:grid-cols-2 gap-10 items-center">

                    {{-- Left --}}
                    <div>
                        <p class="text-sm uppercase tracking-widest text-slate-600 mb-4">
                            Event Booking Portal
                        </p>

                        <h1 class="text-5xl font-bold leading-tight mb-4">
                            Manage Your Events
                        </h1>

                        <p class="text-lg text-slate-700 mb-8 max-w-xl">
                            Book events, track your bookings, and manage event listings from one dashboard.
                        </p>

                        <div class="flex flex-wrap gap-4">
                            <a href="{{ route('events.index') }}"
                               class="bg-slate-900 text-white px-6 py-3 rounded-full text-sm font-semibold hover:bg-slate-800 transition">
                                Browse Events
                            </a>

                            <a href="{{ route('bookings.index') }}"
                               class="border border-slate-400 px-6 py-3 rounded-full text-sm font-semibold hover:bg-white transition">
                                My Bookings
                            </a>

                            @if(Auth::user()->role === 'admin')
                                <a href="{{ route('events.create') }}"
                                   class="border border-slate-400 px-6 py-3 rounded-full text-sm font-semibold hover:bg-white transition">
                                    Create Event
                                </a>
                            @endif
                        </div>
                    </div>

                    {{-- Right User Card --}}
                    <div class="flex justify-center lg:justify-end">
                        <div class="bg-white rounded-3xl shadow-xl p-6 w-full max-w-sm text-slate-900">

                            <div class="flex items-center gap-4 mb-5">
                                <div class="w-12 h-12 rounded-full bg-slate-900 flex items-center justify-center text-white font-bold">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>

                                <div>
                                    <h2 class="text-lg font-bold">
                                        {{ Auth::user()->name }}
                                    </h2>
                                    <p class="text-sm text-slate-500 capitalize">
                                        {{ Auth::user()->role }}
                                    </p>
                                </div>
                            </div>

                            <div class="border-t border-slate-200 my-4"></div>

                            <div class="flex justify-between items-center mb-6">
                                <span class="text-sm text-slate-500">Status</span>
                                <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full font-semibold">
                                    Active
                                </span>
                            </div>

                            <div class="space-y-3">
                                <a href="{{ route('bookings.index') }}"
                                   class="block text-center bg-slate-900 text-white py-2 rounded-lg text-sm font-semibold hover:bg-slate-800">
                                    My Bookings
                                </a>

                                <a href="{{ route('events.index') }}"
                                   class="block text-center border border-slate-300 py-2 rounded-lg text-sm font-semibold hover:bg-slate-100">
                                    Browse Events
                                </a>

                                @if(Auth::user()->role === 'admin')
                                    <a href="{{ route('events.create') }}"
                                       class="block text-center border border-purple-300 text-purple-700 py-2 rounded-lg text-sm font-semibold hover:bg-purple-50">
                                        Create Event
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        {{-- EVENTS --}}
        <section class="max-w-7xl mx-auto px-6 lg:px-10 py-12">

            <div class="flex justify-between items-center mb-8">
                <div>
                    <h2 class="text-3xl font-bold">Upcoming Events</h2>
                    <p class="text-slate-400 text-sm mt-1">What’s coming up next</p>
                </div>

                <a href="{{ route('events.index') }}"
                   class="text-sm text-blue-400 hover:text-blue-300">
                    View all
                </a>
            </div>

            <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">

                {{-- Card --}}
                <div class="bg-slate-900 rounded-2xl overflow-hidden shadow hover:-translate-y-1 transition">
                    <div class="h-40 bg-gradient-to-br from-blue-500 to-indigo-600"></div>
                    <div class="p-4">
                        <p class="text-xs text-slate-400 mb-2">20 Apr 2026</p>
                        <h3 class="text-lg font-bold">Tech Meetup</h3>
                        <p class="text-slate-400 text-sm mb-3">Main Hall</p>
                        <a href="#" class="text-blue-400 text-sm">View event</a>
                    </div>
                </div>

                <div class="bg-slate-900 rounded-2xl overflow-hidden shadow hover:-translate-y-1 transition">
                    <div class="h-40 bg-gradient-to-br from-pink-500 to-rose-600"></div>
                    <div class="p-4">
                        <p class="text-xs text-slate-400 mb-2">25 Apr 2026</p>
                        <h3 class="text-lg font-bold">Career Fair</h3>
                        <p class="text-slate-400 text-sm mb-3">Campus Centre</p>
                        <a href="#" class="text-pink-400 text-sm">View event</a>
                    </div>
                </div>

                <div class="bg-slate-900 rounded-2xl overflow-hidden shadow hover:-translate-y-1 transition">
                    <div class="h-40 bg-gradient-to-br from-emerald-500 to-teal-600"></div>
                    <div class="p-4">
                        <p class="text-xs text-slate-400 mb-2">30 Apr 2026</p>
                        <h3 class="text-lg font-bold">Project Showcase</h3>
                        <p class="text-slate-400 text-sm mb-3">Room B204</p>
                        <a href="#" class="text-emerald-400 text-sm">View event</a>
                    </div>
                </div>

                <div class="bg-slate-900 rounded-2xl overflow-hidden shadow hover:-translate-y-1 transition">
                    <div class="h-40 bg-gradient-to-br from-amber-500 to-orange-600"></div>
                    <div class="p-4">
                        <p class="text-xs text-slate-400 mb-2">5 May 2026</p>
                        <h3 class="text-lg font-bold">Networking Night</h3>
                        <p class="text-slate-400 text-sm mb-3">Innovation Hub</p>
                        <a href="#" class="text-amber-400 text-sm">View event</a>
                    </div>
                </div>

            </div>

        </section>
    </div>
</x-app-layout>