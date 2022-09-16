<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = appointment::orderBy('appointment_date')->get();

        return view('appointments.index', [
            'appointments' => $appointments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('appointments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arr = explode("-", $request->appointment_time);
        $start_time = $arr[0];
        $end_time = $arr[1];

        Appointment::create([
            'hrn' => $request->hrn,
            'chief_complaint' => $request->chief_complaint,
            'appointment_type' => $request->appointment_type,
            'appointment_date' => date('Y-m-d H:i:s', strtotime($request->appointment_date)),
            'service_id' => $request->service_id,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'first_name' => ucfirst($request->first_name),
            'middle_name' => ucfirst($request->middle_name),
            'last_name' => ucfirst($request->last_name),
            'ext_name' => ucfirst($request->ext_name),
            'date_of_birth' => date('Y-m-d H:i:s', strtotime($request->date_of_birth)),
            'sex' => $request->sex,
            'contact_number' => $request->contact_number,
            'social_media' => $request->social_media,
            'barangay' => $request->barangay,
            'city' => $request->city,
            'province' => $request->province,
            'booked_by' => 1,
            'status' => 'Confirmed'
        ]);

        return redirect()->route('appointments.create')->with('appointment_success', 'Appointment saved.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
