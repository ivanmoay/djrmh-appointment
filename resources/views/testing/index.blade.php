@php            
    $appointments = App\Models\Appointment::where('last_name', '0653007874')->get();   

    //$count = 5;
@endphp

@foreach ($appointments as $appointment)
    @php
        if($appointment->hrn != 0)
        {
             $response = json_decode(Http::get('http://192.120.0.250/djrmh-rest-api/api.php', [
                             'hpercode' => $appointment->hrn
                         ]));

            App\Models\Appointment::where('hrn', $appointment->hrn)->update(['last_name'=>$response->patlast]);
            
            //echo $appointment->hrn.'<br>';
            //echo $response->patfirst.'<br>';
            // $count--;
            // if($count <=0)
            // {
            //     break;
            // }

        }        
    @endphp
@endforeach  