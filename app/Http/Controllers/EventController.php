<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class EventController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all();
        $events = [];

        foreach ($appointments as $appointment) {
            $events[] = [
                'title' => $appointment->custom_service,
                'start' => $appointment->appointment_datetime->format('Y-m-d\TH:i:s'), // ISO 8601 format
                'end' => $appointment->appointment_datetime->addMinutes($appointment->duration)->format('Y-m-d\TH:i:s'),
                // Add additional fields as needed
            ];
        }

        return response()->json($events);
    }
}
