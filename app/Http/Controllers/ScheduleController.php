<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Service;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $start_time = $request->st_hr.':'.$request->st_min.':00';

        $time = strtotime($start_time);
        $end_time = date("H:i", strtotime('+'.$request->meeting_time_length.' minutes', $time));
        if($request->m == 'on'){
            Schedule::create([
                'service_id' => $request->service_id,
                'day' => 'M',
                'start_time' => $start_time,
                'end_time' => $end_time
            ]);
        }
        if($request->t == 'on'){
            Schedule::create([
                'service_id' => $request->service_id,
                'day' => 'T',
                'start_time' => $start_time,
                'end_time' => $end_time
            ]);
        }
        if($request->w == 'on'){
            Schedule::create([
                'service_id' => $request->service_id,
                'day' => 'W',
                'start_time' => $start_time,
                'end_time' => $end_time
            ]);
        }
        if($request->th == 'on'){
            Schedule::create([
                'service_id' => $request->service_id,
                'day' => 'TH',
                'start_time' => $start_time,
                'end_time' => $end_time
            ]);
        }
        if($request->f == 'on'){
            Schedule::create([
                'service_id' => $request->service_id,
                'day' => 'F',
                'start_time' => $start_time,
                'end_time' => $end_time
            ]);
        }

        return back()->with('insert_success', 'Schedule added.');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return back()->with('delete_success', 'Schedule deleted.');
    }
}
