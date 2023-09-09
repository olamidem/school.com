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
            <h1>Assigned Class to Teacher List </h1>
          </div>
          <div class="col-sm-6" style="text-align: right">

            <a href="{{url('admin/assign_class_toteacher/add')}} " class="btn btn-primary">Assign Class to Teacher</a>
           
          </div>
        </div>
      </div>
      
    <!-- Main content -->
    <section class="content">

      <div class="row">
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
                    @foreach ($getRecord as $value)
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
