<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'enabled',
        'meeting_time_length',
        'slots',
        'days',
        'start_time'
    ];

    public function appointment()
    {
        return $this->hasMany(Appointment::class);
    }
}
