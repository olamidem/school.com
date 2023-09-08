@extends('layouts.app')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>My Student </h1>
        </div>
        
      </div>
    </div>
  </section> 
    </section>
    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            @include('_message')

            <!-- /.card -->
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">My Student</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive table-striped  p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>#</th>
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
                        <td>{{$value->admission_number}}</td>
                        <td>{{$value->roll_number}}</td>
                        <td>{{$value->class_name}}</td>
                        <td>{{$value->gender}}</td>
                        <td>{{$value->date_of_birth}}</td>
                        <td>{{$value->religion}}</td>
                        <td>{{$value->mobile_number}}</td>
                        <td>{{$value->admission_date}}</td>
                        <td>{{$value->blood_group}}</td>
                        <td>{{$value->height}}</td>
                        <td>{{$value->weight}}</td>
                    
                        <td>{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                        
                        <td>
                          <a class="btn btn-info btn-sm" href="{{url('parent/my_student/subject/'.$value->id)}}">
                            <i class="fas fa-eyes">
                            </i>
                            View Subject
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
   
 </div>
 
</div>

@endsection
