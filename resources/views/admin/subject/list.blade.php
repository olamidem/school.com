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
            <h1>Subject List </h1>
          </div>
          <div class="col-sm-6" style="text-align: right">

            <a href="{{url('admin/subject/add')}} " class="btn btn-primary">Add New Subject</a>
           
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
              <h3 class="card-title">Search Subject </h3>
            </div>
            <form method="get">
      
              <div class="card-body">

                <div class="row">
                  <div class="form-group col-md-4">
                    <label >Subject Name</label>
                    <input type="text" class="form-control" name="name" value="{{Request::get('name')}}" placeholder="Subject Name">
                  </div>
                  
                  <div class="form-group col-md-4">
                    <label>Date </label>
                    <input type="date" class="form-control" name="date"  value="{{Request::get('date')}}" >
      
                  </div>

                  <div class="form-group col-md-4">
                   
                      <button type="submit" class="btn btn-primary  " style="margin-top: 30px">Search</button>
                      <a href="{{url('admin/subject/list')}}"  class="btn btn-primary  " style="margin-top: 30px">Reset</a>
                 
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
              <div class="card-body table-responsive table-striped  p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Subject Name</th>
                      <th>Subject Type</th>
                      <th>Status </th>
                      <th>Created By </th>
                      <th>Date Created</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $index = 1
                    @endphp
                    @foreach ($getRecord as $value)
                    <tr>
                      <td>{{$index++}}</td>
                      <td>{{$value->name}}</td>
                      <td>{{$value->type}}</td>
                      <td>
                        @if ($value->status == 0)
                            <span class="badge badge-success">Active</span>
                        @else
                        <span class="badge badge-danger">Inactive</span>
                        @endif
                      </td>
                      <td>{{$value->created_by_name}}</td>
                      <td>{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>

                      <td class="project-actions ">
                          
                        <a class="btn btn-primary btn-sm" href="{{url('admin/subject/edit/'.$value->id)}}">
                          <i class="fas fa-edit"></i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="{{url('admin/subject/delete/'.$value->id)}}" >
                            <i class="fas fa-trash">
                            </i>
                            Delete
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
