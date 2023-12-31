@extends('layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Student List </h1>
          </div>
          {{-- (Total - {{$getRecord->total()}}) --}}
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
                  <div class="form-group col-md-3">
                    <label >Name</label>
                    <input type="text" class="form-control" name="name" value="{{Request::get(trim('name'))}}"  placeholder="Full Name">
                  </div>
  
                  <div class="form-group col-md-3">
                    <label>Email </label>
                    <input type="text" class="form-control" name="email"  value="{{Request::get('email')}}" placeholder="Email">
      
                  </div>

                  <div class="form-group col-md-2">
                    <label>Admission Number </label>
                    <input type="text" class="form-control" name="admission_number"  value="{{trim(Request::get('admission_number'))}}" placeholder="Admission Number ">
      
                  </div>
                  
                  <div class="form-group col-md-2">
                    <label>Date </label>
                    <input type="date" class="form-control" name="date"  value="{{Request::get('date')}}" >
      
                  </div>

                  <div class="form-group col-md-2">
                   
                      <button type="submit" class="btn btn-primary  " style="margin-top: 30px">Search</button>
                      <a href="{{url('teacher/my_student')}}"  class="btn btn-primary  " style="margin-top: 30px">Reset</a>
                 
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
                <h3 class="card-title">My Student List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive table-striped  p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Student ID</th>
                      <th>Profile Pic</th>
                      <th>Student Name</th>
                      <th>Email</th>
                      <th>Admission Number</th>
                      <th>Roll Number</th>
                      <th>Class</th>
                      <th>Gender</th>
                      <th>Date Of Birth</th>
                      <th>Religion</th>
                      <th>Phone Number</th>
                      <th>Admission Date</th>
                      <th>Blood Group</th>
                      <th>Height</th>
                      <th>Weight</th>
                      <th >Date Created</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $index = 1
                    @endphp
                    @foreach ($getRecord as $value)
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
                      <td>{{$value->admission_number}}</td>
                      <td>{{$value->roll_number}}</td>
                      <td>{{$value->class_name}}</td>
                      <td>{{$value->gender}}</td>
                      <td>
                        @if (!empty($value->date_of_birth))

                          {{date('d-m-Y', strtotime($value->date_of_birth))}}
                            
                        @endif
                      </td>
                      <td>{{$value->religion}}</td>
                      <td>{{$value->mobile_number}}</td>
                      <td>
                        @if (!empty($value->admission_date))

                          {{date('d-m-Y', strtotime($value->admission_date))}}
                            
                        @endif 
                      </td>
                      <td>{{$value->blood_group}}</td>
                      <td>{{$value->height}}</td>
                      <td>{{$value->weight}}</td>
                      
                      <td>{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td> 
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