<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Schedule Appointment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Stepper -->
                    <ol class="flex justify-between w-full mb-6 text-sm font-medium text-center text-gray-500 dark:text-gray-400 sm:text-base">
                        <li class="flex-1 stepper-item">
                            <span class="flex items-center justify-center">
                                <span class="w-5 h-5 mr-2 rounded-full border border-blue-600 dark:border-blue-500 bg-blue-600 dark:bg-blue-500 text-white flex items-center justify-center">1</span>
                                Service Details
                            </span>
                        </li>
                        <li class="flex-1 stepper-item">
                            <span class="flex items-center justify-center">
                                <span class="w-5 h-5 mr-2 rounded-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-500 dark:text-gray-400 flex items-center justify-center">2</span>
                                Personal Info
                            </span>
                        </li>
                        <li class="flex-1 stepper-item">
                            <span class="flex items-center justify-center">
                                <span class="w-5 h-5 mr-2 rounded-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-500 dark:text-gray-400 flex items-center justify-center">3</span>
                                Appointment Duration
                            </span>
                        </li>
                        <li class="flex-1 stepper-item">
                            <span class="flex items-center justify-center">
                                <span class="w-5 h-5 mr-2 rounded-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-500 dark:text-gray-400 flex items-center justify-center">4</span>
                                Date Selection
                            </span>
                        </li>
                        <li class="flex-1 stepper-item">
                            <span class="flex items-center justify-center">
                                <span class="w-5 h-5 mr-2 rounded-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-500 dark:text-gray-400 flex items-center justify-center">5</span>
                                Time Selection
                            </span>
                        </li>
                        <li class="flex-1 stepper-item">
                            <span class="flex items-center justify-center">
                                <span class="w-5 h-5 mr-2 rounded-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-500 dark:text-gray-400 flex items-center justify-center">6</span>
                                Confirmation
                            </span>
                        </li>
                    </ol>

                    <form id="appointmentForm" method="POST" action="{{ route('appointments.store') }}" class="space-y-8">
                        @csrf

                        <!-- Step 1: Service Details -->
                        <div class="form-step" id="step-1">
                            <h3 class="text-lg font-medium">Select Service Type</h3>
                            <ul class="grid w-full gap-6 md:grid-cols-2 mt-4">
                                <li>
                                    <input type="radio" id="service_prom" name="custom_service" value="Prom alterations" class="hidden peer" required />
                                    <label for="service_prom" class="inline-flex items-center justify-between w-full p-5 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                        <div class="block">
                                            <div class="text-lg font-semibold">Prom alterations</div>
                                        </div>
                                    </label>
                                </li>
                                <li>
                                    <input type="radio" id="service_homecoming" name="custom_service" value="Homecoming alterations" class="hidden peer" required />
                                    <label for="service_homecoming" class="inline-flex items-center justify-between w-full p-5 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                        <div class="block">
                                            <div class="text-lg font-semibold">Homecoming alterations</div>
                                        </div>
                                    </label>
                                </li>
                                <li>
                                    <input type="radio" id="service_bridal" name="custom_service" value="Bridal alterations" class="hidden peer" required />
                                    <label for="service_bridal" class="inline-flex items-center justify-between w-full p-5 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                        <div class="block">
                                            <div class="text-lg font-semibold">Bridal alterations</div>
                                        </div>
                                    </label>
                                </li>
                                <li>
                                    <input type="radio" id="service_other" name="custom_service" value="Other" class="hidden peer" required />
                                    <label for="service_other" class="inline-flex items-center justify-between w-full p-5 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                        <div class="block">
                                            <div class="text-lg font-semibold">Other</div>
                                        </div>
                                    </label>
                                </li>
                            </ul>

                            <h3 class="text-lg font-medium mt-6">Appointment Type</h3>
                            <ul class="grid w-full gap-6 md:grid-cols-2 mt-4">
                                <li>
                                    <input type="radio" id="pickup" name="appointment_type" value="pick up" class="hidden peer" required />
                                    <label for="pickup" class="inline-flex items-center justify-between w-full p-5 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                        <div class="block">
                                            <div class="text-lg font-semibold">Pick Up</div>
                                        </div>
                                    </label>
                                </li>
                                <li>
                                    <input type="radio" id="dropoff" name="appointment_type" value="drop off" class="hidden peer" required />
                                    <label for="dropoff" class="inline-flex items-center justify-between w-full p-5 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                        <div class="block">
                                            <div class="text-lg font-semibold">Drop Off</div>
                                        </div>
                                    </label>
                                </li>
                            </ul>
                            <div class="mt-6 flex justify-end">
                                <button type="button" class="px-4 py-2 bg-blue-600 text-white rounded next-step">Next</button>
                            </div>
                        </div>

                        <!-- Step 2: Personal Info -->
                        <div class="form-step hidden" id="step-2">
                            <h3 class="text-lg font-medium">Personal Info</h3>
                            <div class="mt-4">
                                <label for="custom_name" class="block">Name:</label>
                                <input type="text" id="custom_name" name="custom_name" required class="w-full mt-2 p-2 border rounded">

                                <label for="custom_phone" class="block mt-4">Phone:</label>
                                <input type="tel" id="custom_phone" name="custom_phone" placeholder="(###) ### - ####" required class="w-full mt-2 p-2 border rounded">

                                <label for="custom_email" class="block mt-4">Email (optional):</label>
                                <input type="email" id="custom_email" name="custom_email" class="w-full mt-2 p-2 border rounded">
                            </div>
                            <div class="mt-6 flex justify-between">
                                <button type="button" class="px-4 py-2 bg-gray-600 text-white rounded prev-step">Previous</button>
                                <button type="button" class="px-4 py-2 bg-blue-600 text-white rounded next-step">Next</button>
                            </div>
                        </div>

                        <!-- Step 3: Appointment Duration -->
                        <div class="form-step hidden" id="step-3">
                            <h3 class="text-lg font-medium">Appointment Duration</h3>
                            <ul class="grid w-full gap-6 md:grid-cols-2 mt-4">
                                <li>
                                    <input type="radio" id="duration_30" name="appointment_duration" value="30" class="hidden peer" required />
                                    <label for="duration_30" class="inline-flex items-center justify-between w-full p-5 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                        <div class="block">
                                            <div class="text-lg font-semibold">30 minutes</div>
                                        </div>
                                    </label>
                                </li>
                                <li>
                                    <input type="radio" id="duration_60" name="appointment_duration" value="60" class="hidden peer" required />
                                    <label for="duration_60" class="inline-flex items-center justify-between w-full p-5 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                        <div class="block">
                                            <div class="text-lg font-semibold">60 minutes</div>
                                        </div>
                                    </label>
                                </li>
                            </ul>
                            <div class="mt-6 flex justify-between">
                                <button type="button" class="px-4 py-2 bg-gray-600 text-white rounded prev-step">Previous</button>
                                <button type="button" class="px-4 py-2 bg-blue-600 text-white rounded next-step">Next</button>
                            </div>
                        </div>

                        <!-- Step 4: Date Selection -->
                        <div class="form-step hidden" id="step-4">
                            <h3 class="text-lg font-medium">Select Date</h3>
                            <input type="date" id="date-picker" name="date-picker" class="w-full mt-2 p-2 border rounded text-black" required>
                            <input type="hidden" id="appointment_date" name="appointment_date" required>
                            <div class="mt-6 flex justify-between">
                                <button type="button" class="px-4 py-2 bg-gray-600 text-white rounded prev-step">Previous</button>
                                <button type="button" class="px-4 py-2 bg-blue-600 text-white rounded next-step">Next</button>
                            </div>
                        </div>

                        <!-- Step 5: Time Selection -->
                        <div class="form-step hidden" id="step-5">
                            <h3 class="text-lg font-medium">Select Time</h3>
                            <div id="time-slots" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mt-4">
                                <!-- Time slots will be generated here based on duration -->
                            </div>
                            <div class="mt-6 flex justify-between">
                                <button type="button" class="px-4 py-2 bg-gray-600 text-white rounded prev-step">Previous</button>
                                <button type="button" class="px-4 py-2 bg-blue-600 text-white rounded next-step">Next</button>
                            </div>
                        </div>

                        <!-- Step 6: Confirmation -->
                        <div class="form-step hidden" id="step-6">
                            <h3 class="text-lg font-medium">Confirm Your Appointment</h3>
                            <div id="confirmation-details" class="mt-4 p-5 bg-white border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700">
                                <!-- Details will be populated here via JavaScript -->
                            </div>
                            <div class="mt-6 flex justify-between">
                                <button type="button" class="px-4 py-2 bg-gray-600 text-white rounded prev-step">Previous</button>
                                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Confirm & Schedule</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let currentStep = 0;
            const steps = document.querySelectorAll('.form-step');
            const stepperItems = document.querySelectorAll('.stepper-item');
            const nextStepButtons = document.querySelectorAll('.next-step');
            const prevStepButtons = document.querySelectorAll('.prev-step');
            const appointmentDateInput = document.getElementById('appointment_date');
            const datePicker = document.getElementById('date-picker');
            const timeSlotsContainer = document.getElementById('time-slots');

            function showStep(step) {
                steps.forEach((element, index) => {
                    element.classList.toggle('hidden', index !== step);
                });
                stepperItems.forEach((element, index) => {
                    const isActive = index <= step;
                    element.querySelector('span').classList.toggle('text-blue-600', isActive);
                    element.querySelector('span').classList.toggle('dark:text-blue-500', isActive);
                    element.querySelector('span').classList.toggle('border-blue-600', isActive);
                    element.querySelector('span').classList.toggle('dark:border-blue-500', isActive);
                    element.querySelector('span').classList.toggle('text-gray-500', !isActive);
                    element.querySelector('span').classList.toggle('dark:text-gray-400', !isActive);
                    element.querySelector('span').classList.toggle('border-gray-300', !isActive);
                    element.querySelector('span').classList.toggle('dark:border-gray-600', !isActive);
                });
            }

            function validateCurrentStep() {
                const currentInputs = steps[currentStep].querySelectorAll('input[required]');
                for (let input of currentInputs) {
                    if (!input.checkValidity()) {
                        input.reportValidity();
                        return false;
                    }
                }
                return true;
            }

            nextStepButtons.forEach(button => {
                button.addEventListener('click', function() {
                    if (validateCurrentStep() && currentStep < steps.length - 1) {
                        currentStep++;
                        showStep(currentStep);
                        if (currentStep === 5) { // Step 6 is at index 5
                            populateConfirmationDetails();
                        }
                    }
                });
            });

            prevStepButtons.forEach(button => {
                button.addEventListener('click', function() {
                    if (currentStep > 0) {
                        currentStep--;
                        showStep(currentStep);
                    }
                });
            });

            showStep(currentStep);

            // Set min attribute for date picker to disable past dates
            function setMinDate() {
                const today = new Date();
                today.setDate(today.getDate() + 1); // Increment date to get tomorrow's date
                const minDate = today.toISOString().split('T')[0];
                datePicker.setAttribute('min', minDate);
            }

            setMinDate();

            datePicker.addEventListener('change', function() {
                appointmentDateInput.value = this.value;
                fetchAvailableSlots();
            });

            function fetchAvailableSlots() {
                const selectedDate = datePicker.value;
                const duration = parseInt(document.querySelector('input[name="appointment_duration"]:checked').value);

                if (selectedDate && duration) {
                    fetch(`/available-slots?date=${selectedDate}&duration=${duration}`)
                        .then(response => response.json())
                        .then(data => {
                            timeSlotsContainer.innerHTML = '';
                            if (data.length === 0) {
                                timeSlotsContainer.innerHTML = '<p>No available slots.</p>';
                            } else {
                                data.forEach((time, index) => {
                                    // Format and display the time correctly
                                    const formattedTime = formatTime12Hour(time.split(':')[0], time.split(':')[1]);

                                    // Create a unique ID for the radio button
                                    const timeId = `time_${index}`;

                                    // Create the radio input element
                                    const radio = document.createElement('input');
                                    radio.type = 'radio';
                                    radio.id = timeId;
                                    radio.name = 'appointment_time'; // Grouping name
                                    radio.value = time;
                                    radio.classList.add('hidden');
                                    radio.required = true;

                                    // Create the label element
                                    const label = document.createElement('label');
                                    label.htmlFor = timeId;
                                    label.className = 'inline-flex items-center justify-between w-full p-5 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700';
                                    label.innerHTML = `<div class="block"><div class="text-lg font-semibold">${formattedTime}</div></div>`;

                                    // Append the radio and label to the container
                                    timeSlotsContainer.appendChild(radio);
                                    timeSlotsContainer.appendChild(label);
                                });
                            }
                        });
                }
            }

            function populateConfirmationDetails() {
                const serviceType = document.querySelector('input[name="custom_service"]:checked').value;
                const appointmentType = document.querySelector('input[name="appointment_type"]:checked').value;
                const duration = document.querySelector('input[name="appointment_duration"]:checked').value;
                const date = datePicker.value;
                const time = document.querySelector('input[name="appointment_time"]:checked').value;
                const name = document.getElementById('custom_name').value;
                const phone = document.getElementById('custom_phone').value;
                const email = document.getElementById('custom_email').value;

                const durationText = duration === '30' ? '30 minute' : '60 minute';
                const formattedDate = new Date(date).toLocaleDateString('en-US', {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });

                let confirmationHtml = `
                    <p class="text-xl mb-4">You're scheduling a ${durationText} ${appointmentType} for <span class="font-bold">${name}</span>.</p>
                    <p><span class="font-bold">Service:</span> ${serviceType}</p>
                    <p><span class="font-bold">When:</span> ${formattedDate} at ${formatTime12Hour(time.split(':')[0], time.split(':')[1])}</p>
                    <p><span class="font-bold">Phone:</span> ${phone}</p>
                `;

                if (email) {
                    confirmationHtml += `<p><span class="font-bold">Email:</span> ${email}</p>`;
                }

                document.getElementById('confirmation-details').innerHTML = confirmationHtml;
            }

            // Function to format time in 12-hour format with AM/PM
            function formatTime12Hour(hours, minutes) {
                let hour = parseInt(hours);

                if (hour >= 12) {
                    period = 'PM';
                    if (hour > 12) hour -= 12; // Convert to 12-hour format for PM
                }
                if (hour === 0) {
                    hour = 12; // Handle midnight
                }

                // Ensure minutes are always two digits
                const formattedMinutes = minutes.padStart(2, '0');

                return `${hour}:${formattedMinutes}`;
            }
        });
    </script>

    <style>
        /* Hide the actual radio buttons */
        input[type="radio"].hidden {
            display: none;
        }

        /* Style the label when the corresponding radio button is checked */
        input[type="radio"].hidden:checked+label {
            border-color: #3b82f6;
            color: #3b82f6;
        }

        input[type="radio"].hidden:checked+label .text-lg {
            font-weight: bold;
        }
    </style>
</x-app-layout>