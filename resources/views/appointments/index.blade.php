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

          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Filter</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Patient Name</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
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
                        <td>{{$appointment->start_time.'-'.$appointment->start_time}}</td>
                        <td>{{$appointment->contact_number}}</td>
                        <td>{{$appointment->created_at}}</td>
                        <td>{{$appointment->booked_by}}</td>
                        <td>
                          <a href=""><i class="far fa-eye"></i></a>&nbsp;&nbsp;
                          <a href=""><i class="fa fa-trash-alt"></i></a>&nbsp;&nbsp;
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
