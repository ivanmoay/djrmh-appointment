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

          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Appointment</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <form action="{{route('appointment.update', $appointment->id)}}" method="POST">
                  @csrf
                  <div class="card-body">    

                    <div class="form-group">
                        <label for="exampleInputEmail1">HRN</label>
                        <input type="input" name="hrn" class="form-control" id="exampleInputEmail1" value="{{$appointment->hrn}}" readonly>                    
                      </div>
  
                      <div class="form-group">
                        <label for="exampleInputEmail1">Chief Complaint</label>
                        <input type="input" name="chief_complaint" class="form-control" id="exampleInputEmail1" value="{{$appointment->chief_complaint}}" readonly>                    
                      </div>
  
                      <div class="form-group">
                        <label>Appointment Type</label>
                        <select class="form-control" name="appointment_type" disabled>
                          <option {{$appointment->appointment_type == 'New' ? 'selected' : ''}}>New</option>
                          <option {{$appointment->appointment_type == 'Follow-up' ? 'selected' : ''}}>Follow-up</option>
                        </select>
                      </div>
  
                      <div class="form-group">
                        <label>Service</label>
                        <select class="form-control" name="service_id" disabled>
                            <option value="{{$appointment->service_id}}">{{$appointment->service->name}}</option>                       
                        </select>
                      </div>
      
                      <div class="form-group">
                        <label for="exampleInputEmail1">Date </label>
                        <input id="datepicker" name="appointment_date" value="{{$appointment->appointment_date}}" disabled/>  
                        <script>
                          $('#datepicker').datepicker({
                              uiLibrary: 'bootstrap4'                          
                          });
                        </script>              
                      </div> 
                    
                    <div class="form-group">
                      <label>Time</label>
                      <select class="form-control" name="appointment_time" disabled>
                        <option>{{$appointment->start_time.'-'.$appointment->end_time}}</option>
                      </select>
                    </div>
                    
                    <div class="row">
                      <div class="col-3">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Last Name</label>
                          <input type="input" name="last_name" class="form-control" id="exampleInputEmail1" value="{{$appointment->last_name}}" readonly>                    
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="form-group">
                          <label for="exampleInputEmail1">First Name</label>
                          <input type="input" name="first_name" class="form-control" id="exampleInputEmail1" value="{{$appointment->first_name}}" readonly>                    
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Middle Name</label>
                          <input type="input" name="middle_name" class="form-control" id="exampleInputEmail1" value="{{$appointment->middle_name}}" readonly>                    
                        </div>
                      </div>
                      <div class="col-2">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Ext.(Jr.,Sr.,Etc.)</label>
                          <input type="input" name="ext_name" class="form-control" id="exampleInputEmail1" value="{{$appointment->ext_name}}" readonly>                    
                        </div>
                      </div>
                    </div>  
                    
                    <div class="row">
                      <div class="col-5">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Date of Birth</label>
                          <input id="datepicker2" name="date_of_birth" value="{{$appointment->date_of_birth}}" disabled/>  
                          <script>
                            $('#datepicker2').datepicker({
                                uiLibrary: 'bootstrap4'                          
                            });
                        </script>              
                        </div> 
                      </div>
                      <div class="col-5">
                        <div class="form-group">
                          <label>Sex</label>
                          <select class="form-control" name="sex" disabled>
                            <option value="{{$appointment->sex}}">{{$appointment->sex}}</option>
                          </select>
                        </div>
                      </div>
                    </div> 

                    <div class="row">
                      <div class="col-5">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Contact Number</label>
                          <input type="input" name="contact_number" class="form-control" id="exampleInputEmail1" value="{{$appointment->contact_number}}" readonly>                    
                        </div>
                      </div>
                      <div class="col-5">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Social Media</label>
                          <input type="input" name="social_media" class="form-control" id="exampleInputEmail1" value="{{$appointment->social_media}}" readonly>                    
                        </div>
                      </div>
                    </div> 

                    <div class="row">
                      <div class="col-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Barangay</label>
                          <input type="input" name="barangay" class="form-control" id="exampleInputEmail1" value="{{$appointment->barangay}}" readonly>                    
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">City</label>
                          <input type="input" name="city" class="form-control" id="exampleInputEmail1" value="{{$appointment->city}}" readonly>                    
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Province</label>
                          <input type="input" name="province" class="form-control" id="exampleInputEmail1" value="{{$appointment->province}}" readonly>                    
                        </div>
                      </div>
                    </div>  

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status" required>
                          <option {{$appointment->status == 'Confirmed' ? 'selected' : ''}}>Confirmed</option>
                          <option {{$appointment->status == 'Pending' ? 'selected' : ''}}>Pending</option>
                          <option {{$appointment->status == 'Seen' ? 'selected' : ''}}>Seen</option>
                          <option {{$appointment->status == 'Not Around' ? 'selected' : ''}}>Not Around</option>
                          <option {{$appointment->status == 'Cancelled' ? 'selected' : ''}}>Cancelled</option>
                        </select>
                      </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>


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