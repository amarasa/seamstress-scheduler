<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'custom_name',
        'custom_phone',
        'custom_email',
        'custom_service',
        'appointment_type',
        'appointment_datetime',
        'duration',
    ];

    protected $casts = [
        'appointment_datetime' => 'datetime',
    ];
}
