<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	@php
		$appointments = App\Models\Appointment::orderBy('last_name');

		//if(isset($_GET['search'])){
            $appointments
                ->where('hrn', 'like', '%'.$_GET['s_hrn'].'%')
                ->where('last_name', 'like', '%'.$_GET['s_name'].'%');
            if(!empty($_GET['s_service_id'])){
                $appointments
                    ->where('service_id', $_GET['s_service_id']);
            }
            if(!empty($_GET['s_appointment_date']) && !empty($_GET['s_appointment_date_to'])){
                $appointments
                    ->where('appointment_date', '>=', date('Y-m-d H:i:s', strtotime($_GET['s_appointment_date'])))
                    ->where('appointment_date', '<=', date('Y-m-d H:i:s', strtotime($_GET['s_appointment_date_to'])))
                ;
            }
        //}

        $appointments = $appointments->get();
	@endphp	

<style>
	table{
	border-collapse: collapse;
	font-size:7pt;
	}
	.thead { background-color:#eeeeee;}
	/*.tr { height:30px;}*/
	.checkBox { width:18px;height:18px;vertical-align:middle; }
	.bright { border-right: 0.5px solid #cccccc;}
	.bleft { border-left: 0.5px solid #cccccc;}
	.btop { border-top: 0.5px solid #cccccc;}
	.bbottom { border-bottom: 0.5px solid #cccccc;}
	.bbottom-black { border-bottom: 0.5px solid #cccccc; height:30px;}
	.ball { border: 1px solid black;}
	.label { height: 2px; font-size:8pt;  }
	.field { height: 2px; font-size:8pt; }
	.table_header { height: 30px; font-size:8pt; background-color:#eeeeee; padding-left:5px; padding-right:5px;}
	.table_row { height: 30px; font-size:7pt; padding-left:5px; padding-right:5px;}
	.signatory { background-color: #eee; height: 20px; font-size:8pt; }
	.signatory_table { position: absolute; bottom: 0;}
	.table-box {border: 0.5px solid #000000;}
</style>

	From: {{@$_GET['s_appointment_date']}} - To: {{@$_GET['s_appointment_date_to']}}
	<br>
	<table width="100%">
		<thead>
		<tr>
			<th class="tr bleft bright bbottom btop" align="center" width="5%"  >HRN</th>
			<th class="tr bleft bright bbottom btop" align="center" width="15%"  >Name</th>
			<th class="tr bleft bright bbottom btop" align="center" width="15%"  >Chief Complaint</th>
			<th class="tr bleft bright bbottom btop" align="center" width="7%"  >Type</th>                      
			<th class="tr bleft bright bbottom btop" align="center" width="6%"  >Appointment</th>
			<th class="tr bleft bright bbottom btop" align="center" width="15%"  >Service</th>
			<th class="tr bleft bright bbottom btop" align="center" width="5%"  >Time</th>
			<th class="tr bleft bright bbottom btop" align="center" width="8%"  >Contact Number</th>
			<th class="tr bleft bright bbottom btop" align="center" width="6%"  >Status</th>
			<th class="tr bleft bright bbottom btop" align="center" width="10%"  >Date Booked</th>
			<th class="tr bleft bright bbottom btop" align="center" width="8%"  >Booked by</th>
		</tr>
		</thead>
		<tbody>                    
		@if($appointments->count())
		@foreach ($appointments as $appointment)
			<tr>
				<td class="tr bleft bright bbottom btop" align="center" width="5%"  >{{$appointment->hrn}}</td>
				<td class="tr bleft bright bbottom btop" align="center" width="15%"  >{{$appointment->last_name.', '.$appointment->first_name.' '.$appointment->middle_name.' '.$appointment->ext_name}}</td>
				<td class="tr bleft bright bbottom btop" align="left" width="15%"  >{{$appointment->chief_complaint}}</td>
				<td class="tr bleft bright bbottom btop" align="center" width="7%"  >{{$appointment->appointment_type}}</td>
				<td class="tr bleft bright bbottom btop" align="center" width="6%"  >{{$appointment->appointment_date}}</td>
				<td class="tr bleft bright bbottom btop" align="left" width="15%"  >{{@$appointment->service->name}}</td>
				<td class="tr bleft bright bbottom btop" align="center" width="5%"  >{{$appointment->start_time.'-'.$appointment->end_time}}</td>
				<td class="tr bleft bright bbottom btop" align="center" width="8%"  >{{$appointment->contact_number}}</td>
				<td class="tr bleft bright bbottom btop" align="center" width="6%"  >{{$appointment->status}}</td>
				<td class="tr bleft bright bbottom btop" align="center" width="10%"  >{{$appointment->created_at}}</td>
				<td class="tr bleft bright bbottom btop" align="center" width="8%"  >{{$appointment->user->username}}</td>
			</tr>
		@endforeach
		@else
			<tr>
			<td colspan="7">There are no appointments.</td>
			</tr>
		@endif
		</tbody>
  	</table>
</body>
</html>