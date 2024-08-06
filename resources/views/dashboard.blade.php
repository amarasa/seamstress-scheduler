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
                    <div id="calendar"></div> <!-- Calendar container -->
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek', // Default view is weekly
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'timeGridDay,timeGridWeek'
                },
                events: '/api/events', // Fetch events from an API endpoint
                editable: false,
                selectable: true,
                timeZone: 'America/Detroit', // Set to your local time zone
                eventTimeFormat: { // Customize time format
                    hour: 'numeric',
                    minute: '2-digit',
                    meridiem: 'short'
                },
                select: function(info) {
                    // Handle date selection (optional)
                }
            });

            calendar.render();
        });
    </script>

</x-app-layout>