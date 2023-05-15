@extends('layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Appointment</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">

          @if ($message = Session::get('appointment_success'))
            <script>
              swal({!! json_encode($message) !!}, "", "success", {
                button:"OK",
              })
            </script>
          @endif     
          
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Schedule Appointment</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                        
              @if(!isset($_GET['form1']) || isset($_GET['hrn']) && !isset($_GET['last_name']))              
                <form action="#" method="GET">
                  {{--@csrf--}}
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">HRN</label>
                      @php
                        $appointment = App\Models\Appointment::where('id', @$_GET['id'])->first();
                      @endphp
                      <input type="input" name="hrn" class="form-control" id="exampleInputEmail1" value="{{isset($appointment) ? @$appointment->hrn : @$_GET['hrn']}}" {{isset($_GET['hrn']) ? 'readonly' : ''}} required>                    
                    </div>

                    @if (isset($_GET['hrn']))

                      @php
                        $response = json_decode(Http::get('http://192.120.0.250/djrmh-rest-api/api.php', [
                            'hpercode' => $_GET['hrn']
                        ]));

                        if($_GET['hrn'] == 0){
                          $response = [];
                        }
                      @endphp

                      <div class="row">
                        <div class="col-3">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Last Name</label>
                            <input type="input" name="last_name" class="form-control" id="exampleInputEmail1" value="{{@$response->patlast}}" required>                    
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="form-group">
                            <label for="exampleInputEmail1">First Name</label>
                            <input type="input" name="first_name" class="form-control" id="exampleInputEmail1" value="{{@$response->patfirst}}"required>                    
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Middle Name</label>
                            <input type="input" name="middle_name" class="form-control" id="exampleInputEmail1" value="{{@$response->patmiddle}}" required>                    
                          </div>
                        </div>
                        <div class="col-2">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Ext.(Jr.,Sr.,Etc.)</label>
                            <input type="input" name="ext_name" class="form-control" id="exampleInputEmail1" value="{{@$response->patsuffix}}">                    
                          </div>
                        </div>
                      </div>  

                      <div class="form-group">
                        <label for="exampleInputEmail1">Chief Complaint</label>
                        <input type="input" name="chief_complaint" class="form-control" id="exampleInputEmail1" value="{{isset($appointment) ? @$appointment->chief_complaint : @$_GET['chief_complaint']}}" required>                    
                      </div>

                      <div class="form-group">
                        <label>Appointment Type</label>
                        <select class="form-control" name="appointment_type">
                          <option {{@$_GET['appointment_type'] == 'New' ? 'selected' : ''}}>New</option>
                          <option {{@$_GET['appointment_type'] == 'Follow-up' ? 'selected' : ''}}>Follow-up</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Service</label>
                        <select class="form-control" name="service_id" required>
                          @php
                            $services = App\Models\Service::orderBy('name')->get();
                          @endphp
                          <option value="">...</option>
                          @foreach ($services as $service)
                            <option value="{{$service->id}}">{{$service->name}}</option>
                          @endforeach                        
                        </select>
                      </div>
      
                      <div class="form-group">
                        <label for="exampleInputEmail1">Date @if (@$date_error)
                          <code>{{'Error: only weekdays are allowed.'}}</code>
                        @endif</label>
                        <input type="date" class="form-control" name="appointment_date" id="appointment_date" value="{{@$_GET['appointment_date']}}" required>
                        {{-- <input id="datepicker" name="appointment_date" value="{{@$_GET['appointment_date']}}" required/>  
                        <script>
                          $('#datepicker').datepicker({
                              uiLibrary: 'bootstrap4'                          
                          });
                        </script>               --}}
                      </div> 
                        
                    @endif                    

                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button name="form1" type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              @else

              @php
                     
                  // if(isset($_GET['form1'])){
                       
                  //   $day = date('D', strtotime($_GET['appointment_date']));
                    
                  //   if($day == 'Sat' || $day == 'Sun'){
                  //     $date_error = true;
                  //   }                    
                  // }  
         
              @endphp   

                @php
                  $response = json_decode(Http::get('http://192.120.0.250/djrmh-rest-api/api.php', [
                      'hpercode' => $_GET['hrn']
                  ]));
                @endphp

                <form action="{{route('appointments.store')}}" method="POST">
                  @csrf
                  <div class="card-body">    
                    
                    <input type="hidden" name="hrn" value="{{$_GET['hrn']}}">
                    <input type="hidden" name="chief_complaint" value="{{$_GET['chief_complaint']}}">
                    <input type="hidden" name="appointment_type" value="{{$_GET['appointment_type']}}">
                    <input type="hidden" name="service_id" value="{{$_GET['service_id']}}">
                    <input type="hidden" name="appointment_date" value="{{$_GET['appointment_date']}}">

                    <input type="hidden" name="last_name" value="{{$_GET['last_name']}}">
                    <input type="hidden" name="first_name" value="{{$_GET['first_name']}}">
                    <input type="hidden" name="middle_name" value="{{$_GET['middle_name']}}">
                    <input type="hidden" name="ext_name" value="{{$_GET['ext_name']}}">
                    
                    <div class="form-group">
                      <label>Time</label>
                      @php
                        $day = date('D', strtotime($_GET['appointment_date']));
                        if($day == 'Mon'){$day = 'M';}
                        if($day == 'Tue'){$day = 'T';}
                        if($day == 'Wed'){$day = 'W';}
                        if($day == 'Thu'){$day = 'TH';}
                        if($day == 'Fri'){$day = 'F';}

                        $appointments = App\Models\Appointment::
                                                                where('service_id', $_GET['service_id'])
                                                                ->where('appointment_date', date('Y-m-d H:i:s', strtotime($_GET['appointment_date'])))
                                                                ->where('status', '!=', 'Cancelled')
                                                                ->get();
                        $scheds = array();
                        foreach ($appointments as $a) {
                          array_push($scheds, $a->start_time.'-'.$a->end_time);
                        }

                        $schedules = App\Models\Schedule::where('service_id', $_GET['service_id'])->where('day', $day)->orderBy('start_time')->get();
                      @endphp
                      <select class="form-control" name="appointment_time" required>
                        @foreach ($schedules as $sched)
                          @php
                            if(in_array($sched->start_time.'-'.$sched->end_time, $scheds)){
                              $disabled = 'disabled';
                            }
                            else{
                              $disabled = '';
                            }
                          @endphp
                          <option {{$disabled}} @if (!empty($disabled)) style="color:red;" @endif>{{$sched->start_time.'-'.$sched->end_time}}</option>
                        @endforeach
                      </select>
                    </div>
                    
                    {{-- <div class="row">
                      <div class="col-3">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Last Name</label>
                          <input type="input" name="last_name" class="form-control" id="exampleInputEmail1" value="{{@$response->patlast}}" required>                    
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="form-group">
                          <label for="exampleInputEmail1">First Name</label>
                          <input type="input" name="first_name" class="form-control" id="exampleInputEmail1" value="{{@$response->patfirst}}"required>                    
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Middle Name</label>
                          <input type="input" name="middle_name" class="form-control" id="exampleInputEmail1" value="{{@$response->patmiddle}}" required>                    
                        </div>
                      </div>
                      <div class="col-2">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Ext.(Jr.,Sr.,Etc.)</label>
                          <input type="input" name="ext_name" class="form-control" id="exampleInputEmail1" value="{{@$response->patsuffix}}">                    
                        </div>
                      </div>
                    </div>   --}}
                    
                    <div class="row">
                      <div class="col-5">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Date of Birth</label>
                          @php
                            $patient_details = App\Models\Appointment::where('hrn', $_GET['hrn'])->latest()->first();       
                            
                            $bday = '';
                            if($_GET['hrn'] == 0){
                              $patient_details = [];
                            }else{
                              if(!is_null($patient_details)){
                                $bday = Carbon\Carbon::parse($patient_details->date_of_birth)->toDateString();
                              }
                            }                                                        
                            
                          @endphp
                          <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="{{ $bday }}">
                          {{-- <input id="datepicker2" name="date_of_birth" required value="{{date('m/d/Y', strtotime(@$response->patbdate))}}"/>  
                          <script>
                            $('#datepicker2').datepicker({
                                uiLibrary: 'bootstrap4'                          
                            });
                          </script>               --}}
                        </div> 
                      </div>
                      <div class="col-5">
                        <div class="form-group">
                          <label>Sex</label>
                          <select class="form-control" name="sex">
                            <option {{@$response->patsex == 'M' ? 'selected' : ''}}>Male</option>
                            <option {{@$response->patsex == 'F' ? 'selected' : ''}}>Female</option>
                          </select>
                        </div>
                      </div>
                    </div> 

                    @php
                      
                      //dd($patient_details);
                    @endphp

                    <div class="row">
                      <div class="col-5">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Contact Number</label>
                          <input type="input" name="contact_number" class="form-control" id="exampleInputEmail1" value="{{@$patient_details->contact_number}}" required>                    
                        </div>
                      </div>
                      <div class="col-5">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Social Media</label>
                          <input type="input" name="social_media" class="form-control" id="exampleInputEmail1" value="{{@$patient_details->social_media}}" required>                    
                        </div>
                      </div>
                    </div> 

                    <div class="row">
                      <div class="col-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Barangay</label>
                          <input type="input" name="barangay" class="form-control" id="exampleInputEmail1" value="{{@$patient_details->barangay}}" required>                    
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">City</label>
                          <input type="input" name="city" class="form-control" id="exampleInputEmail1" value="{{@$patient_details->city}}" required>                    
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Province</label>
                          <input type="input" name="province" class="form-control" id="exampleInputEmail1" value="{{@$patient_details->province}}" required>                    
                        </div>
                      </div>
                    </div>                     


                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              @endif




            </div>
          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  @endsection