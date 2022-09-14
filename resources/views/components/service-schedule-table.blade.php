@props(['schedule', 'day'])

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th colspan="7">
                        @php
                            if($day == 'M'){
                                echo 'MONDAY';
                            }  
                            if($day == 'T'){
                                echo 'TUESDAY';
                            }
                            if($day == 'W'){
                                echo 'WEDNESDAY';
                            }  
                            if($day == 'TH'){
                                echo 'THURSDAY';
                            }  
                            if($day == 'F'){
                                echo 'FRIDAY';
                            }    
                        @endphp
                    </th>
                  </tr>
                  <tr>
                      <th>Start Time</th>
                      <th>End Time</th>
                      <th>Actions</th>
                  </tr>
                </thead>
                <tbody>                
                  @if($schedule->count())
                  @foreach ($schedule as $sched)
                      @if($sched->day == $day)
                          <tr>
                              <td>{{$sched->start_time}}</td>
                              <td>{{$sched->end_time}}</td>
                              <td><a href="{{route('schedule.destroy', $sched->id)}}"><i class="fa fa-trash-alt"></i></a></td>
                          </tr>
                      @endif
                  @endforeach
                  @else
                    <tr>
                      <td colspan="7">No schedule for this day found.</td>
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