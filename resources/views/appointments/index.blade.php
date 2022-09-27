@if (auth()->user())
  
@else 
  @php
      
  @endphp  
@endif

@extends('layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Appointments</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Filter</h3>

                @if ($message = Session::get('update_success'))
                  <script>
                    swal("Appointment updated.", "", "success", {
                      button:"OK",
                    })
                  </script>
                @endif 
                
                @php            
                    /*echo 'xxxxx: '. session('key');        
                    session(['key' => 'value']);
                    $value = session('key');
                    echo 'xxxxx: '.$value;
                    dd(session()->all());*/
                @endphp

              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="row">
                    <div class="col-2">
                      <div class="form-group">
                        <label for="exampleInputEmail1">HRN</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="s_hrn" placeholder="" value="{{@$_GET['s_hrn']}}">
                      </div>
                    </div> 
                    <div class="col-3">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Patient Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="s_name" placeholder="" value="{{@$_GET['s_name']}}">
                      </div>
                    </div>    
                    <div class="col-2">
                      <div class="form-group">
                        <label>Service</label>
                        <select class="form-control" name="s_service_id">
                          <option value="">...</option>
                          @foreach ($services as $service)
                            <option value="{{$service->id}}" {{$service->id == @$_GET['s_service_id'] ? 'selected' : ''}}>{{$service->name}}</option>
                          @endforeach                        
                        </select>
                      </div>
                    </div> 

                    <div class="col-2">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Appointment Date</label>
                        {{--<input type="text" class="form-control" id="exampleInputEmail1" name="s_appointment_date" placeholder="">--}}
                        <input id="datepicker" name="s_appointment_date" value="{{@$_GET['s_appointment_date']}}"/>  
                        <script>
                          $('#datepicker').datepicker({
                              uiLibrary: 'bootstrap4'                          
                          });
                      </script> 
                      </div>
                    </div>     

                    <div class="col-3">
                      <div class="form-group">
                        <label for="exampleInputEmail1">&nbsp;</label><br/>
                        <button type="submit" name="search" class="btn btn-block btn-primary">Filter</button>
                      </div>
                    </div>              
                  </div>

                </div>
                <!-- /.card-body -->

                <!--<div class="card-footer">
                  <button type="submit" class="btn btn-primary">Filter</button>
                </div>-->
              </form>
            </div>
          </div>

          <div class="col-12">  
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">                    
                      
                      <a href="{{route('appointments.create')}}" class="btn btn-block btn-primary" role="button" aria-pressed="true">Add Appointment</a>
                    
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>HRN</th>
                      <th>Name</th>
                      <th>Chief Complaint</th>
                      <th>Type</th>                      
                      <th>Appointment</th>
                      <th>Service</th>
                      <th>Time</th>
                      <th>Contact Number</th>
                      <th>Status</th>
                      <th>Date Booked</th>
                      <th>Booked by</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>                    
                    @if($appointments->count())
                    @foreach ($appointments as $appointment)
                      <tr>
                        <td>{{$appointment->hrn}}</td>
                        <td>{{$appointment->last_name.', '.$appointment->first_name.' '.$appointment->middle_name.' '.$appointment->ext_name}}</td>
                        <td>{{$appointment->chief_complaint}}</td>
                        <td>{{$appointment->appointment_type}}</td>
                        <td>{{$appointment->appointment_date}}</td>
                        <td>{{$appointment->service->name}}</td>
                        <td>{{$appointment->start_time.'-'.$appointment->end_time}}</td>
                        <td>{{$appointment->contact_number}}</td>
                        <td>{{$appointment->status}}</td>
                        <td>{{$appointment->created_at}}</td>
                        <td>{{$appointment->user->username}}</td>
                        <td>
                          <a href="{{route('appointment.edit', $appointment->id)}}"><i class="far fa-edit"></i></a>&nbsp;&nbsp;
                          {{-- <a href=""><i class="fa fa-trash-alt"></i></a>&nbsp;&nbsp; --}}
                        </td>
                      </tr>
                    @endforeach
                    @else
                      <tr>
                        <td colspan="7">There are no appointments.</td>
                      </tr>
                    @endif
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
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
