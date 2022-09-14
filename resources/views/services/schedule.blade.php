@extends('layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Schedule</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
          <div class="row">
  
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Add Schedule</h3>
                  @if ($message = Session::get('delete_success'))
                    <script>
                        swal("Schedule deleted.", "", "success", {
                        button:"OK",
                        })
                    </script>
                  @endif    
                  @if ($message = Session::get('insert_success'))
                    <script>
                        swal("Schedule added.", "", "success", {
                        button:"OK",
                        })
                    </script>
                  @endif 
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('schedule.store', ['service_id' => $service->id, 'meeting_time_length' => $service->meeting_time_length])}}" method="POST">
                  @csrf
                  <div class="card-body">  
                    <div class="form-check">
                      <div class="row">
                          <div class="form-group">
                            <label class="form-check-label" for="exampleCheck1">&nbsp;&nbsp;&nbsp;</label>
                          </div>
                          <div class="form-group">
                            <input type="checkbox" name="m" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1"><b>M</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          </div>
                          <div class="form-group">
                            <input type="checkbox" name="t" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1"><b>T</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          </div>
                          <div class="form-group">
                            <input type="checkbox" name="w" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1"><b>W</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          </div>
                          <div class="form-group">
                            <input type="checkbox" name="th" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1"><b>TH</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          </div>
                          <div class="form-group">
                            <input type="checkbox" name="f" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1"><b>F</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          </div>
                      </div>
                    </div>
  
                    <div class="form-group">
                      <label for="exampleInputPassword1">Start Time</label>
                      <div class="input-group m-2-sm"> 
  
                        <select class="form-control" name="st_hr">
                          @php
                              $t = 8;
                          @endphp
                          @for($i=0; $i < 10; $i++)                        
                          <option>{{str_pad($t, 2, '0', STR_PAD_LEFT)}}</option>
                          @php
                              $t++;
                          @endphp
                          @endfor
                        </select>  
  
                        <div class="input-group-prepend">
                          <div class="input-group-text">:</div>
                        </div>
  
                        <select class="form-control" name="st_min">
                          @for($i=0; $i <= 59; $i++)
                          <option>{{str_pad($i, 2, '0', STR_PAD_LEFT)}}</option>
                          @endfor
                        </select>
  
                     </div> 
                    </div>     
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Insert</button>
                  </div>
                </form>
              </div>
            </div>
  
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    

    <!-- Main content -->
    <x-service-schedule-table :schedule="$schedule" day="M"/>
    <x-service-schedule-table :schedule="$schedule" day="T"/>
    <x-service-schedule-table :schedule="$schedule" day="W"/>
    <x-service-schedule-table :schedule="$schedule" day="TH"/>
    <x-service-schedule-table :schedule="$schedule" day="F"/>

    
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
