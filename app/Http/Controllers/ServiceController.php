<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = service::orderBy('name')->get();

        return view('services.index', [
            'services' => $services
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'meeting_time_length' => 'required|integer',
            'slots' => 'required|integer',
        ]);

        $start_time = $request->st_hr.':'.$request->st_min.':00';

        $is_enabled = ($request->enabled == 'on') ? 1 : 0;

        $tmp_days = array(
                        ($request->m == 'on') ? 'M' : '',
                        ($request->t == 'on') ? 'T' : '',
                        ($request->w == 'on') ? 'W' : '',
                        ($request->th == 'on') ? 'TH' : '',
                        ($request->f == 'on') ? 'F' : ''
                    ); 
                    
        $days = array_filter($tmp_days);

        $days = implode('|', $days);

        $data = Service::create([
            'name' => $request->name,
            'enabled' => $is_enabled,
            'meeting_time_length' => $request->meeting_time_length,
            'slots' => $request->slots,
            'days' => $days,
            'start_time' => $start_time
        ]);

        if($request->m == 'on')
            $this->create_sched('M', $request->slots, $start_time, $request->meeting_time_length, $data->id);
        
        if($request->t == 'on')
            $this->create_sched('T', $request->slots, $start_time, $request->meeting_time_length, $data->id);

        if($request->w == 'on')
            $this->create_sched('W', $request->slots, $start_time, $request->meeting_time_length, $data->id);

        if($request->th == 'on')
            $this->create_sched('TH', $request->slots, $start_time, $request->meeting_time_length, $data->id);

        if($request->f == 'on')
            $this->create_sched('F', $request->slots, $start_time, $request->meeting_time_length, $data->id);

        return redirect()->route('services');
    }

    function create_sched($day, $slots, $start_time, $length, $service_id)
    {
        $cStart = $start_time;
        $time = strtotime($cStart);
        $cEnd = date("H:i", strtotime('+'.$length.' minutes', $time));
        for ($i=0; $i < $slots; $i++) { 
            Schedule::create([
                'service_id' => $service_id,
                'day' => $day,
                'start_time' => $cStart,
                'end_time' => $cEnd
            ]);
            $time = strtotime($cStart);
            $cStart = date("H:i", strtotime('+'.$length.' minutes', $time));
            $time = strtotime($cStart);
            $cEnd = date("H:i", strtotime('+'.$length.' minutes', $time));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('services.edit', [
            'service' => $service
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'meeting_time_length' => 'required|integer',
            'slots' => 'required|integer',
        ]);

        $start_time = $request->st_hr.':'.$request->st_min.':00';

        $is_enabled = ($request->enabled == 'on') ? 1 : 0;

        $tmp_days = array(
            ($request->m == 'on') ? 'M' : '',
            ($request->t == 'on') ? 'T' : '',
            ($request->w == 'on') ? 'W' : '',
            ($request->th == 'on') ? 'TH' : '',
            ($request->f == 'on') ? 'F' : ''
        ); 
        
        $days = array_filter($tmp_days);

        $days = implode('|', $days);

        $service->update([
            'name' => $request->name,
            'enabled' => $is_enabled,
            'meeting_time_length' => $request->meeting_time_length,
            'slots' => $request->slots,
            'days' => $days,
            'start_time' => $start_time
        ]);

        /*$data = Service::create([
            'name' => $request->name,
            'enabled' => $is_enabled,
            'meeting_time_length' => $request->meeting_time_length,
            'slots' => $request->slots,
            'days' => $days,
            'start_time' => $start_time
        ]);*/

        Schedule::where('service_id', $service->id)->delete();

        if($request->m == 'on')
            $this->create_sched('M', $request->slots, $start_time, $request->meeting_time_length, $service->id);
        
        if($request->t == 'on')
            $this->create_sched('T', $request->slots, $start_time, $request->meeting_time_length, $service->id);

        if($request->w == 'on')
            $this->create_sched('W', $request->slots, $start_time, $request->meeting_time_length, $service->id);

        if($request->th == 'on')
            $this->create_sched('TH', $request->slots, $start_time, $request->meeting_time_length, $service->id);

        if($request->f == 'on')
            $this->create_sched('F', $request->slots, $start_time, $request->meeting_time_length, $service->id);

        return redirect()->route('services');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        Schedule::where('service_id', $service->id)->delete();

        return redirect()->route('services')->with('delete_success', 'Service deleted.');
    }
}
