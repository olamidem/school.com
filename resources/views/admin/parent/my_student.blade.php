@extends('layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Student Parent List </h1>
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
              <h3 class="card-title">Search Student </h3>
            </div>
            <form method="get">
      
              <div class="card-body">

                <div class="row">

                    <div class="form-group col-md-2">
                        <label>Student ID </label>
                        <input type="text" class="form-control" name="id"  value="{{Request::get('id')}}" placeholder="Student ID">
          
                    </div>

                  <div class="form-group col-md-3">
                    <label >Name</label>
                    <input type="text" class="form-control" name="name" value="{{Request::get('name')}}"  placeholder="Name">
                  </div>
  
                  <div class="form-group col-md-3">
                    <label>Email </label>
                    <input type="text" class="form-control" name="email"  value="{{Request::get('email')}}" placeholder="Enter email">
      
                  </div>

                  <div class="form-group col-md-2 ">
                   
                      <button type="submit" class="btn btn-primary  " style="margin-top: 30px">Search</button>
                      <a href="{{url('admin/parent/my_student/'.$parent_id)}}"  class="btn btn-primary  " style="margin-top: 30px">Reset</a>
                 
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
            
        @if (!empty($getSearchStudent))

            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> Student List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Student ID</th>
                      <th>Profile Pic</th>
                      <th>Student Name</th>
                      <th>Email</th>
                      <th>Parent Name</th>
                      <th >Date Created</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $index = 1
                    @endphp
                    @foreach ($getSearchStudent as $value)
                    <tr>
                      <td>{{$index++}}</td>
                      <td>{{$value->id}}</td>
                      <td>
                        @if (!empty($value->getProfile()))
                           
                            <div class="image">
                              <img src="{{$value->getProfile()}}" class="img-circle elevation-2" alt="User Image" style="height:50px;width:50px;">
                            </div>

                        @endif
                      </td>
                      <td>{{$value->name}}</td>
                      <td>{{$value->email}}</td>

                        @if(empty($value->parent_id))

                        <td>Parent Not yet Assigned</td>
                        @else 
                            
                            <td>{{$value->parent_name}}</td>
                        @endif

                       
                      <td>{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>

                      <td>
                        <a href="{{url('admin/parent/assign_student_to_parent/'.$value->id.'/'.$parent_id)}}" class="btn btn-sm btn-primary">Assign Parent</a>
                      </td>
                      
                    </tr>
                        
                    @endforeach
                   
                  </tbody>
                </table>

                 
              </div>
              <!-- /.card-body -->
            </div>
        @endif



            <!-- /.card -->
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Student Parent List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Profile Pic</th>
                        <th>Student Name</th>
                        <th>Email</th>
                        <th>Parent Name</th>
                        <th >Date Created</th>
                        <th >Action</th>
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
                        <td>{{$value->parent_name}}</td>
                        
                        <td>{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                        <td>
                          <a class="btn btn-danger btn-sm" href="{{url('admin/parent/assign_student_to_parent_delete/'.$value->id)}}">
                            <i class="fas fa-trash"></i>
                              Unassign Parent
                          </a>

                      </td>
                        
                      </tr>
                          
                      @endforeach
                     
                    </tbody>
                  </table>
  
                   
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
