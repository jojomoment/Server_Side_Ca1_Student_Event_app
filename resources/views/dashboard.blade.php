<x-app-layout>
    <div class="min-h-screen bg-[#0b1220] text-white">

        {{-- Top hero section --}}
        <section class="bg-[#dbe7f7] text-slate-900">
            <div class="max-w-7xl mx-auto px-6 lg:px-10 py-16">

                <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-10">
                    <div class="max-w-3xl">
                        <p class="text-sm font-semibold uppercase tracking-[0.25em] text-slate-600 mb-4">
                            Event Booking Portal
                        </p>

                        <h1 class="text-5xl md:text-6xl font-extrabold leading-tight mb-4">
                            MANAGE<br>YOUR EVENTS
                        </h1>

                        <p class="text-lg text-slate-700 max-w-xl mb-8">
                            Book events, track your bookings, and manage event listings from one clean dashboard.
                        </p>

                        <div class="flex flex-wrap gap-3">
                            <a href="{{ route('events.index') }}"
                               class="inline-flex items-center rounded-full bg-slate-900 px-6 py-3 text-sm font-semibold text-white hover:bg-slate-800 transition">
                                Browse Events
                            </a>

                            <a href="{{ route('bookings.index') }}"
                               class="inline-flex items-center rounded-full border border-slate-400 px-6 py-3 text-sm font-semibold text-slate-900 hover:bg-white/70 transition">
                                My Bookings
                            </a>

                            @if(Auth::user()->role === 'admin')
                                <a href="{{ route('events.create') }}"
                                   class="inline-flex items-center rounded-full border border-slate-400 px-6 py-3 text-sm font-semibold text-slate-900 hover:bg-white/70 transition">
                                    Create Event
                                </a>
                            @endif
                        </div>
                    </div>

                    <div class="w-full max-w-sm">
                        <div class="rounded-[2rem] bg-white/70 backdrop-blur p-6 shadow-xl border border-white/50">
                            <p class="text-sm text-slate-500 mb-2">Signed in as</p>
                            <h2 class="text-2xl font-bold text-slate-900">{{ Auth::user()->name }}</h2>
                            <p class="text-sm text-slate-600 mt-1 capitalize">{{ Auth::user()->role }} account</p>

                            <div class="mt-6 grid grid-cols-2 gap-3">
                                <div class="rounded-2xl bg-slate-900 text-white p-4">
                                    <p class="text-xs uppercase tracking-wide text-slate-300">Status</p>
                                    <p class="mt-2 text-lg font-bold">Active</p>
                                </div>

                                <div class="rounded-2xl bg-slate-100 p-4">
                                    <p class="text-xs uppercase tracking-wide text-slate-500">Tools</p>
                                    <p class="mt-2 text-lg font-bold text-slate-900">3</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        {{-- Main content --}}
        <section class="max-w-7xl mx-auto px-6 lg:px-10 py-10">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-white">Upcoming Events</h2>
                    <p class="text-slate-400 text-sm mt-1">What’s coming up next</p>
                </div>

                <a href="{{ route('events.index') }}"
                   class="text-sm font-medium text-slate-300 hover:text-white transition">
                    View all
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
                <div class="group rounded-3xl overflow-hidden bg-[#151e2e] border border-slate-800 hover:-translate-y-1 hover:shadow-2xl transition">
                    <div class="h-48 bg-gradient-to-br from-blue-500 to-indigo-700"></div>
                    <div class="p-5">
                        <p class="text-xs uppercase tracking-[0.2em] text-slate-400 mb-3">20 Apr 2026</p>
                        <h3 class="text-xl font-bold text-white leading-snug mb-2">Tech Meetup</h3>
                        <p class="text-sm text-slate-400 mb-4">Main Hall</p>
                        <a href="{{ route('events.index') }}" class="text-sm font-semibold text-blue-400 group-hover:text-blue-300">
                            View event
                        </a>
                    </div>
                </div>

                <div class="group rounded-3xl overflow-hidden bg-[#151e2e] border border-slate-800 hover:-translate-y-1 hover:shadow-2xl transition">
                    <div class="h-48 bg-gradient-to-br from-pink-500 to-rose-700"></div>
                    <div class="p-5">
                        <p class="text-xs uppercase tracking-[0.2em] text-slate-400 mb-3">25 Apr 2026</p>
                        <h3 class="text-xl font-bold text-white leading-snug mb-2">Career Fair</h3>
                        <p class="text-sm text-slate-400 mb-4">Campus Centre</p>
                        <a href="{{ route('events.index') }}" class="text-sm font-semibold text-pink-400 group-hover:text-pink-300">
                            View event
                        </a>
                    </div>
                </div>

                <div class="group rounded-3xl overflow-hidden bg-[#151e2e] border border-slate-800 hover:-translate-y-1 hover:shadow-2xl transition">
                    <div class="h-48 bg-gradient-to-br from-emerald-500 to-teal-700"></div>
                    <div class="p-5">
                        <p class="text-xs uppercase tracking-[0.2em] text-slate-400 mb-3">30 Apr 2026</p>
                        <h3 class="text-xl font-bold text-white leading-snug mb-2">Project Showcase</h3>
                        <p class="text-sm text-slate-400 mb-4">Room B204</p>
                        <a href="{{ route('events.index') }}" class="text-sm font-semibold text-emerald-400 group-hover:text-emerald-300">
                            View event
                        </a>
                    </div>
                </div>

                <div class="group rounded-3xl overflow-hidden bg-[#151e2e] border border-slate-800 hover:-translate-y-1 hover:shadow-2xl transition">
                    <div class="h-48 bg-gradient-to-br from-amber-500 to-orange-700"></div>
                    <div class="p-5">
                        <p class="text-xs uppercase tracking-[0.2em] text-slate-400 mb-3">5 May 2026</p>
                        <h3 class="text-xl font-bold text-white leading-snug mb-2">Networking Night</h3>
                        <p class="text-sm text-slate-400 mb-4">Innovation Hub</p>
                        <a href="{{ route('events.index') }}" class="text-sm font-semibold text-amber-400 group-hover:text-amber-300">
                            View event
                        </a>
                    </div>
                </div>
            </div>

            {{-- Lower info cards --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-10">
                <div class="rounded-3xl bg-[#151e2e] border border-slate-800 p-6">
                    <p class="text-sm text-slate-400">Account</p>
                    <h3 class="mt-2 text-3xl font-bold text-white capitalize">{{ Auth::user()->role }}</h3>
                    <p class="mt-3 text-sm text-slate-400">Your current dashboard access and permissions.</p>
                </div>

                <div class="rounded-3xl bg-[#151e2e] border border-slate-800 p-6">
                    <p class="text-sm text-slate-400">Bookings</p>
                    <h3 class="mt-2 text-3xl font-bold text-white">My Events</h3>
                    <p class="mt-3 text-sm text-slate-400">Check your saved bookings and upcoming plans.</p>
                    <a href="{{ route('bookings.index') }}" class="inline-block mt-4 text-sm font-semibold text-blue-400 hover:text-blue-300">
                        Open bookings
                    </a>
                </div>

                @if(Auth::user()->role === 'admin')
                    <div class="rounded-3xl bg-[#151e2e] border border-slate-800 p-6">
                        <p class="text-sm text-slate-400">Admin Tools</p>
                        <h3 class="mt-2 text-3xl font-bold text-white">Create Events</h3>
                        <p class="mt-3 text-sm text-slate-400">Add, edit, and manage new event listings.</p>
                        <a href="{{ route('events.create') }}" class="inline-block mt-4 text-sm font-semibold text-purple-400 hover:text-purple-300">
                            Open admin
                        </a>
                    </div>
                @endif
            </div>
        </section>
    </div>
</x-app-layout>