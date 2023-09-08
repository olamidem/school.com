@extends('layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Parent List (Total - {{$getRecord->total()}})</h1>
          </div>
          <div class="col-sm-6" style="text-align: right">

            <a href="{{url('admin/parent/add')}} " class="btn btn-primary">Add New Parent</a>
           
          </div>
        </div>
      </div>
    </section> 
    <!-- Main content -->
    <section class="content">


      
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card ">
            <div class="card-header">
              <h3 class="card-title">Search Parent </h3>
            </div>
            <form method="get">
      
              <div class="card-body">

                <div class="row">
                  <div class="form-group col-md-3">
                    <label >Name</label>
                    <input type="text" class="form-control" name="name" value="{{Request::get('name')}}"  placeholder="Name">
                  </div>
  
                  <div class="form-group col-md-3">
                    <label>Email </label>
                    <input type="text" class="form-control" name="email"  value="{{Request::get('email')}}" placeholder="Enter email">
      
                  </div>

                  <div class="form-group col-md-2">
                    <label>Phone Number </label>
                    <input type="text" class="form-control" name="mobile_number"  value="{{Request::get('mobile_number')}}" placeholder="Phone Number">
      
                  </div>
                  
                  <div class="form-group col-md-2">
                    <label>Date </label>
                    <input type="date" class="form-control" name="date"  value="{{Request::get('date')}}" placeholder="Enter email">
      
                  </div>

                  <div class="form-group col-md-2 ">
                   
                      <button type="submit" class="btn btn-primary  " style="margin-top: 30px">Search</button>
                      <a href="{{url('admin/parent/list')}}"  class="btn btn-primary  " style="margin-top: 30px">Reset</a>
                 
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
                <h3 class="card-title">Parent List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive table-striped  p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Profile Pic</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone Number</th>
                      <th>Occupation</th>
                      <th>Gender</th>
                      <th>Status</th>
                      <th >Date Created</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $index = 1
                    @endphp
                    @foreach ($getRecord as $value)
                    <tr>
                      <td>{{$index++}}</td>
                      <td>
                        @if (!empty($value->getProfile()))
                           
                            <div class="image">
                              <img src="{{$value->getProfile()}}" class="img-circle elevation-2" alt="User Image" style="height:50px;width:50px;">
                            </div>

                        @endif
                      </td>
                      <td>{{$value->name}}</td>
                      <td>{{$value->email}}</td>
                      <td>{{$value->mobile_number}}</td>
                      <td>{{$value->occupation}}</td>
                      <td>{{$value->gender}}</td>
                      <td>
                        @if ($value->status == 0)
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-danger">Inactive</span>
                        @endif
                      </td>
                      <td>{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                    
                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="{{url('admin/parent/my_student/'.$value->id)}}">
                              <i class="fas fa-folder">
                              </i>
                              My Student
                          </a>
                          <a class="btn btn-info btn-sm" href="{{url('admin/parent/edit/'.$value->id)}}">
                              <i class="fas fa-edit">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" {{url('admin/parent/delete/'.$value->id)}}" >
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
