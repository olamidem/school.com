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
            <h1>Assigned Subject List </h1>
          </div>
          <div class="col-sm-6" style="text-align: right">

            <a href="{{url('admin/assign_subject/add')}} " class="btn btn-primary">Assign New Subject</a>
           
          </div>
        </div>
      </div>
      
    <!-- Main content -->
    <section class="content">


      
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card ">
            <div class="card-header">
              <h3 class="card-title">Search Assigned Subject </h3>
            </div>
            <form method="get">
      
              <div class="card-body">

                <div class="row">
                  <div class="form-group col-md-3">
                    <label >Clss Name</label>
                    <input type="text" class="form-control" name="class_name" value="{{Request::get('class_name')}}" placeholder="Subject Name">
                  </div>
                  
                  <div class="form-group col-md-3">
                    <label >Subject Name</label>
                    <input type="text" class="form-control" name="subject_name" value="{{Request::get('subject_name')}}" placeholder="Subject Name">
                  </div>
                  
                  <div class="form-group col-md-3">
                    <label>Date </label>
                    <input type="date" class="form-control" name="date"  value="{{Request::get('date')}}" >
      
                  </div>

                  <div class="form-group col-md-3">
                   
                      <button type="submit" class="btn btn-primary  " style="margin-top: 30px">Search</button>
                      <a href="{{url('admin/assign_subject/list')}}"  class="btn btn-primary  " style="margin-top: 30px">Reset</a>
                 
                  </div>

                </div>
                
              </div>
              <!-- /.card-body -->

             
            </form>
          </div>
          <!-- /.card -->

        </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            @include('_message')

            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Subject List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Class Name</th>
                      <th>Subject Name</th>
                      <th>Status </th>
                      <th>Created By </th>
                      <th>Date Created</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    @foreach ($getRecord as $value)
                    <tr>
                      <td>{{$value->id}}</td>
                      <td>{{$value->class_name}}</td>
                      <td>{{$value->subject_name}}</td>
                      <td>

                        @if ($value->status == 0)
                            <span class="badge badge-success">Active</span>
                        @else
                        <span class="badge badge-danger">Inactive</span>
                        @endif

                      </td>
                      <td>{{$value->created_by_name}}</td>
                      <td>{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                      <td>
                        <a  href="{{url('admin/assign_subject/edit_single/'.$value->id)}}">
                          <i class="fas fa-pen"></i>
                        </a>

                        <a  href="{{url('admin/assign_subject/edit/'.$value->id)}}">
                          <i class="fas fa-edit"></i>
                        </a>

                        <a href="{{url('admin/assign_subject/delete/'.$value->id)}}" style="color: red">
                          <i class="fas fa-trash"></i>
                          
                        </a>
                    </td>
                      
                    </tr>
                        
                    @endforeach
                   
                  </tbody>
                </table>

                <div style="float: right;padding: 10px">
                  
                  {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}

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
