@extends('layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- <h1>Admin List (Total - {{$getRecord->total()}})</h1> --}}
            <h1>Class Timetable </h1>
          </div>
       
        </div>
      </div>
      
    <!-- Main content -->
    <section class="content">

      <div class="row">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h3 class="card-title">Search Class Timetable</h3>
              </div>
              <form method="get">
        
                <div class="card-body">
  
                  <div class="row">
                    <div class="form-group col-md-3">
                      <label >Clss Name</label>
                      <select name="class_id" id="" class="form-control getClass" required>
                        <option value="">Select Class</option>
                        @foreach ($getClass as $class)
                          <option  {{ (Request::get('class_id')==$class->id) ? 'selected' : '' }}   value="{{$class->id}}">{{$class->name}}</option>
                        @endforeach
                    </select>
                   
                    </div>
                    
                    <div class="form-group col-md-3">
                      <label >Subject Name</label>
                      <select name="subject_id" id="" class="form-control getSubject" required>
                        <option value="">Select Class</option>
                        @if(!empty($getSubject))
                         @foreach ($getSubject as $subject)
                          <option  {{ (Request::get('subject_id')==$subject->subject_id) ? 'selected' : '' }}   value="{{$subject->subject_id}}">{{$subject->subject_name}}</option>
                         @endforeach
                        @endif
                    </select>
                    </div>

                   
  
                    <div class="form-group col-md-3">
                     
                        <button type="submit" class="btn btn-primary  " style="margin-top: 30px">Search</button>
                        <a href="{{url('admin/class_timetable/list')}}"  class="btn btn-primary  " style="margin-top: 30px">Reset</a>
                   
                    </div>
  
                  </div>
                  
                </div>
                <!-- /.card-body -->
              </form>
            </div>
       

            @if(!empty(Request::get('class_id')) && !empty(Request::get('subject_id')))
        
          <form action="" method="post">
            {{ csrf_field() }}
              <input type="hidden" name="subject_id" value="{{ Request::get('subject_id') }}">

              <input type="hidden" name="class_id" value="{{ Request::get('class_id') }}">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Class Timetable</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive table-striped  p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th> Week</th>
                      <th>Start Time</th>
                      <th>End Time </th>
                      <th>Room Number</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($week as $value)
                        <tr>

                          <td>
                            <input type="hidden" name="week_id" value="{{ week_id }}">
                            {{$value['week_name']}}
                          </td>
                          <td>
                            <input type="time" name="start_time" class="form-control">
                          </td>

                          <td>
                            <input type="time" name="end_time" class="form-control">
                          </td>
                      
                          <td>
                            <input type="text" style="width: 200px;" name="room_number" class="form-control">
                          </td>

                        </tr>
                    @endforeach 
                   
                  </tbody>
                </table>
             
                <div class="text-center p-4">
                   <button class="btn btn-primary">Submit</button>
                </div>
              </div>
            </form>
              <!-- /.card-body -->
            @endif
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
 
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection

@section('script')
    <script type="text/javascript">
        $('.getClass').change(function () {
            var class_id = $(this).val();
            $.ajax({
                url: "{{ url('admin/class_timetable/get_subject') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    class_id:class_id,
                },
                dataType: "Json",
                success:function(response){
                    $('.getSubject').html(response.html);
                },
            });
        });
    </script>
@endsection