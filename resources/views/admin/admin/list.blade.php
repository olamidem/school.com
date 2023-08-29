@extends('layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin List (Total - {{$getRecord->total()}})</h1>
          </div>
          <div class="col-sm-6" style="text-align: right">

            <a href="{{url('admin/admin/add')}} " class="btn btn-primary">Add New Admin</a>
           
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
              <h3 class="card-title">Search Admin </h3>
            </div>
            <form method="get">
      
              <div class="card-body">

                <div class="row">
                  <div class="form-group col-md-3">
                    <label >Full Name</label>
                    <input type="text" class="form-control" name="name" value="{{Request::get('name')}}"  placeholder="Full Name">
                  </div>
  
                  <div class="form-group col-md-3">
                    <label>Email </label>
                    <input type="text" class="form-control" name="email"  value="{{Request::get('email')}}" placeholder="Enter email">
      
                  </div>
                  
                  <div class="form-group col-md-3">
                    <label>Date </label>
                    <input type="date" class="form-control" name="date"  value="{{Request::get('date')}}" placeholder="Enter email">
      
                  </div>

                  <div class="form-group col-md-3 ">
                   
                      <button type="submit" class="btn btn-primary  " style="margin-top: 30px">Search</button>
                      <a href="{{url('admin/admin/list')}}"  class="btn btn-primary  " style="margin-top: 30px">Reset</a>
                 
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
                <h3 class="card-title">Admin List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
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
                      <td>{{$value->name}}</td>
                      <td>{{$value->email}}</td>
                      <td>{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                      <td>
                        <a  href="{{url('admin/admin/edit/'.$value->id)}}">
                          <i class="fas fa-edit"></i>
                        </a>

                        <a href="{{url('admin/admin/delete/'.$value->id)}}" style="color: red">
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
