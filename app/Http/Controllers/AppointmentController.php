<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

    public function availableSlots(Request $request)
    {
        $date = $request->query('date');
        $duration = (int) $request->query('duration'); // Ensure duration is an integer

        $start = Carbon::parse($date . ' 08:00:00');
        $end = Carbon::parse($date . ' 20:00:00');

        // Fetch existing appointments for the given date
        $bookedAppointments = Appointment::whereDate('appointment_datetime', $date)->get();

        // Initialize an array to store the blocked time slots
        $blockedSlots = [];

        // Calculate blocked time slots based on the duration of each booked appointment
        foreach ($bookedAppointments as $appointment) {
            $appointmentStart = Carbon::parse($appointment->appointment_datetime);
            $appointmentEnd = $appointmentStart->copy()->addMinutes((int)$appointment->duration);

            // Add each minute in the appointment duration to the blocked slots
            for ($time = $appointmentStart; $time < $appointmentEnd; $time->addMinute()) {
                $blockedSlots[] = $time->format('H:i');
            }
        }

        // Generate available time slots
        $availableSlots = [];
        $interval = 30; // Check every 30 minutes for both 30 and 60 minute durations

        for ($time = $start; $time->lessThan($end); $time->addMinutes($interval)) {
            $slotStart = $time->format('H:i');
            $slotEnd = $time->copy()->addMinutes($duration)->format('H:i');

            // Check if the entire slot (from start to end) is free
            $isBlocked = false;
            for ($t = $time->copy(); $t->format('H:i') < $slotEnd; $t->addMinute()) {
                if (in_array($t->format('H:i'), $blockedSlots)) {
                    $isBlocked = true;
                    break;
                }
            }

            if (!$isBlocked) {
                $availableSlots[] = $slotStart;
            }
        }

        return response()->json($availableSlots);
    }




    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'custom_name' => 'required|string|max:255',
            'custom_phone' => 'required|string|max:15',
            'custom_email' => 'nullable|email|max:255',
            'custom_service' => 'required|string',
            'appointment_type' => 'required|string|in:pick up,drop off',
            'appointment_duration' => 'required|integer|in:30,60', // Ensure this field is validated
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|string'
        ]);

        $appointmentDateTime = Carbon::parse($validatedData['appointment_date'] . ' ' . $validatedData['appointment_time']);

        Appointment::create([
            'custom_name' => $validatedData['custom_name'],
            'custom_phone' => $validatedData['custom_phone'],
            'custom_email' => $validatedData['custom_email'],
            'custom_service' => $validatedData['custom_service'],
            'appointment_type' => $validatedData['appointment_type'],
            'appointment_datetime' => $appointmentDateTime,
            'duration' => $validatedData['appointment_duration'], // Store the duration
        ]);

        return redirect()->route('dashboard')->with('success', 'Your appointment has been successfully scheduled.');
    }
}
