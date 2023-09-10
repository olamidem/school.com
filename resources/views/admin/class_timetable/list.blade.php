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
                        <option value="{{$class->id}}">{{$class->name}}</option>
                        @endforeach
                    </select>
                    
                    </div>
                    
                    <div class="form-group col-md-3">
                      <label >Subject Name</label>
                      <select name="subject_id" id="" class="form-control getSubject" required>
                        <option value="">Select Class</option>
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
            @include('_message')

            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Subject List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive table-striped  p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Class Name</th>
                      <th>Teacher Name</th>
                      <th>Status </th>
                      <th>Created By </th>
                      <th>Date Created</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $index = 1
                    @endphp
                    {{-- @foreach ($getRecord as $value)
                    <tr>
                      <td>{{$index ++}}</td>
                      <td>{{$value->class_name}}</td>
                      <td>{{$value->teacher_name}}</td>
                      <td>

                        @if ($value->status == 0)
                            <span class="badge badge-success">Active</span>
                        @else
                          <span class="badge badge-danger">Inactive</span>
                        @endif

                      </td>
                      <td>{{$value->created_by_name}}</td>
                      <td>{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>

                      <td class="project-actions text-center">
                        <a class="btn btn-primary btn-sm" href="{{url('admin/assign_class_toteacher/edit_single/'.$value->id)}}">
                            <i class="fas fa-pen-alt">
                            </i>
                            Edit Single
                        </a>
                        <a class="btn btn-info btn-sm" href="{{url('admin/assign_class_toteacher/edit/'.$value->id)}}">
                            <i class="fas fa-edit">
                            </i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="{{url('admin/assign_class_toteacher/delete/'.$value->id)}}" >
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </a>
                    </td>

                      
                    </tr>
                        
                    @endforeach  --}}
                   
                  </tbody>
                </table>
                <div style="float: right;padding: 10px">
                  
                  {{-- {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!} --}}

                </div>
              </div>
              <!-- /.card-body -->
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