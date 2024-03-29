<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'hrn',
        'chief_complaint',
        'appointment_type',
        'appointment_date',
        'service_id',
        'start_time',
        'end_time',
        'first_name',
        'middle_name',
        'last_name',
        'ext_name',
        'date_of_birth',
        'sex',
        'contact_number',
        'social_media',
        'barangay',
        'city',
        'province',
        'booked_by',
        'status'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'booked_by');
    }
}
