@extends('layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Services</h1>
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
                <h3 class="card-title">Add Service</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('services.update', $service->id)}}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name @error('name')<code>{{$message}}</code>@enderror</label>
                    <input type="input" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" value="{{$service->name}}">                    
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Meeting Time Length @error('meeting_time_length')<code>{{$message}}</code>@enderror</label>
                    <input type="input" name="meeting_time_length" class="form-control @error('meeting_time_length') is-invalid @enderror" id="exampleInputPassword1" value="{{$service->meeting_time_length}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Number of Slots @error('slots')<code>{{$message}}</code>@enderror</label>
                    <input type="input" name="slots" class="form-control @error('slots') is-invalid @enderror" id="exampleInputPassword1" value="{{$service->slots}}">
                  </div>

                  <div class="form-check">
                    <div class="row">
                        <div class="form-group">
                          <label class="form-check-label" for="exampleCheck1">&nbsp;&nbsp;&nbsp;</label>
                        </div>
                        @php
                            $_days = explode("|", $service->days);
                        @endphp
                        <div class="form-group">
                          <input type="checkbox" name="m" class="form-check-input" id="exampleCheck1" {{ in_array("M", $_days) ? 'checked':''}}>
                          <label class="form-check-label" for="exampleCheck1">M</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                        <div class="form-group">
                          <input type="checkbox" name="t" class="form-check-input" id="exampleCheck1" {{ in_array("T", $_days) ? 'checked':''}}>
                          <label class="form-check-label" for="exampleCheck1">T</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                        <div class="form-group">
                          <input type="checkbox" name="w" class="form-check-input" id="exampleCheck1" {{ in_array("W", $_days) ? 'checked':''}}>
                          <label class="form-check-label" for="exampleCheck1">W</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                        <div class="form-group">
                          <input type="checkbox" name="th" class="form-check-input" id="exampleCheck1" {{ in_array("TH", $_days) ? 'checked':''}}>
                          <label class="form-check-label" for="exampleCheck1">TH</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                        <div class="form-group">
                          <input type="checkbox" name="f" class="form-check-input" id="exampleCheck1" {{ in_array("F", $_days) ? 'checked':''}}>
                          <label class="form-check-label" for="exampleCheck1">F</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Start Time</label>
                    <div class="input-group m-2-sm"> 

                      <select class="form-control" name="st_hr">                        
                        @php
                            $t = 8;
                            $st = explode(":", $service->start_time);
                        @endphp                        
                        @for($i=0; $i < 10; $i++)                        
                        <option {{str_pad($t, 2, '0', STR_PAD_LEFT)==$st[0] ? 'selected':''}}>{{str_pad($t, 2, '0', STR_PAD_LEFT)}}</option>
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
                        <option {{str_pad($i, 2, '0', STR_PAD_LEFT)==$st[1] ? 'selected':''}}>{{str_pad($i, 2, '0', STR_PAD_LEFT)}}</option>
                        @endfor
                      </select>

                   </div> 
                  </div>
                  
                  <div class="form-check">
                    <input type="checkbox" name="enabled" class="form-check-input" id="exampleCheck1" checked>
                    <label class="form-check-label" for="exampleCheck1">Enabled</label>
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