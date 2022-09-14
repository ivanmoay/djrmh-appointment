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
                <h3 class="card-title">Schedule Appointment</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="#" method="GET">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">HRN</label>
                    <input type="input" name="name" class="form-control" id="exampleInputEmail1" required>                    
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Chief Complaint</label>
                    <input type="input" name="name" class="form-control" id="exampleInputEmail1" required>                    
                  </div>

                  <div class="form-group">
                    <label>Appointment Type</label>
                    <select class="form-control">
                      <option>New</option>
                      <option>Follow-up</option>
                    </select>
                  </div>


                  <div class="form-group">
                    <label for="exampleInputPassword1">Date</label>
                    <div class="input-group m-2-sm"> 

                      <div class="input-group-prepend">
                        <div class="input-group-text">Month</div>
                      </div>
                      <select class="form-control" name="st_hr">
                        @for($i=1; $i <= 12; $i++)                        
                        <option>{{str_pad($i, 2, '0', STR_PAD_LEFT)}}</option>
                        @endfor
                      </select> 

                      <div class="input-group-prepend">
                        <div class="input-group-text">Day</div>
                      </div>
                      <select class="form-control" name="st_hr">
                        @for($i=1; $i <= 31; $i++)                        
                        <option>{{str_pad($i, 2, '0', STR_PAD_LEFT)}}</option>
                        @endfor
                      </select> 

                      <div class="input-group-prepend">
                        <div class="input-group-text">Year</div>
                      </div>
                      <select class="form-control" name="st_hr">
                        @for($i=2022; $i <= 2030; $i++)                        
                        <option>{{str_pad($i, 2, '0', STR_PAD_LEFT)}}</option>
                        @endfor
                      </select>
                   </div> 
                  </div>

                </div>
                <!-- /.card-body -->

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