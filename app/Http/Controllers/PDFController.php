<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function print_appointment(Request $request)
    {         
        // echo $request->s_hrn;
        //dd($request);
        $pdf = PDF::loadView('pdf.appointment');
    
        return $pdf->stream('appointments.pdf');
    }
}
