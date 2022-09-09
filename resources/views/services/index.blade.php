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
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">                    
                      
                      <a href="{{route('services.create')}}" class="btn btn-block btn-primary" role="button" aria-pressed="true">Add Service</a>
                    
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Service</th>
                      <th>Length</th>
                      <th>Slots</th>
                      <th>Start Time</th>
                      <th>Enabled</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>                    
                    @if($services->count())
                    @foreach ($services as $service)
                      <tr>
                        <td>{{$service->name}}</td>
                        <td>{{$service->meeting_time_length}}</td>
                        <td>{{$service->slots}}</td>
                        <td>{{$service->start_time}}</td>
                        <td>{{$service->enabled}}</td>
                        <td></td>
                      </tr>
                    @endforeach
                    @else
                      <tr>
                        <td colspan="5">There are no services.</td>
                      </tr>
                    @endif
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
