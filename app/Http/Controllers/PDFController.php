<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Elibyy\TCPDF\Facades\TCPDF;

class PDFController extends Controller
{
    public function print_appointments(Request $request)
    {
        $html = '';

        $data = [
    		'service' => 'Hello world!'
    	];

        $view = \View::make('pdf.appointments', $data);
        $html = $view->render();

        $pdf = new TCPDF;
        
        $pdf::SetTitle('Print Appointments');
        $pdf::AddPage('L', 'A4');
        $pdf::writeHTML($html, true, false, true, false, '');

        $pdf::Output('appointments.pdf');
    }

    public function print_date_booked(Request $request)
    {
        $html = '';

        $data = [
    		'service' => 'Hello world!'
    	];

        $view = \View::make('pdf.date_booked', $data);
        $html = $view->render();

        $pdf = new TCPDF;
        
        $pdf::SetTitle('Print by Date Booked');
        $pdf::AddPage('L', 'A4');
        $pdf::writeHTML($html, true, false, true, false, '');

        $pdf::Output('date_booked.pdf');
    }
}
