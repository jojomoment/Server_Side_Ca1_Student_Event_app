<footer class="bg-gray-900 text-gray-300 mt-10">
    <div class="max-w-7xl mx-auto px-6 py-10">

        <div class="grid md:grid-cols-3 gap-8">

            <!-- Project Info -->
            <div>
                <h2 class="text-white text-lg font-bold mb-3">Event Booking System</h2>
                <p class="text-sm">
                    A centralised platform for students to discover, book, and manage campus events.
                    Built using Laravel MVC architecture.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h2 class="text-white text-lg font-bold mb-3">Quick Links</h2>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('events.index') }}" class="hover:text-white">Events</a></li>
                    <li><a href="{{ route('dashboard') }}" class="hover:text-white">Dashboard</a></li>
                    <li><a href="{{ route('bookings.index') }}" class="hover:text-white">My Bookings</a></li>
                </ul>
            </div>

            <!-- Student Info -->
            <div>
                <h2 class="text-white text-lg font-bold mb-3">System Info</h2>
                <p class="text-sm">
                    Developed for Server-Side Development CA2 using Laravel MVC, authentication, and relational database design.
                </p>
            </div>

        </div>

        <div class="border-t border-gray-700 mt-8 pt-4 text-center text-sm">
            © {{ date('Y') }} Event Booking System. All rights reserved.
        </div>

    </div>
</footer>
