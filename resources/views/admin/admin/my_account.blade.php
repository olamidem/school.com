@extends('layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> My Account</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
             
            <!-- /.card -->

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">
  
              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">

                    @if (!empty($getRecord->getProfile()))
                                
                        <img class="profile-user-img img-fluid img-circle" src="{{$getRecord->getProfile()}}" alt="" >
                          
                    @endif
                  </div>
  
                  <h3 class="profile-username text-center">{{$getRecord->name}}</h3>

                    @if ($getRecord->user_type == 2)
                        <p class="text-muted text-center"> 
                            Teacher
                        </p> 
                    @endif
                    
  
                  {{-- <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Followers</b> <a class="float-right">1,322</a>
                    </li>
                    <li class="list-group-item">
                      <b>Following</b> <a class="float-right">543</a>
                    </li>
                    <li class="list-group-item">
                      <b>Friends</b> <a class="float-right">13,287</a>
                    </li>
                  </ul>
  
                  <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
  
              <!-- About Me Box -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">About Me</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <strong><i class="fas fa-book mr-1"></i> Name</strong>
  
                  <p class="text-muted">
                    {{$getRecord->name}}
                  </p>
  
  
                  <hr>
  
                  <strong><i class="far fa-file-alt mr-1"></i>  Email</strong>
  
                  <p class="text-muted">{{$getRecord->email}}</p>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
              <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Settings</a></li>
                    {{-- <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('#settings')}}" data-toggle="tab">Settings</a></li> --}}
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                      <!-- Post -->
                      <div class="tab-pane" id="settings">
                        @include('_message')
            
             
                        <form method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label >Full Name <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name', $getRecord->name )}}" required placeholder="Full Name">
                                        <div style="color: red">{{$errors->first('name')}}</div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label> Email <span style="color: red">*</span></label>
                                        <input type="email" class="form-control" name="email" required value="{{ old('email', $getRecord->email) }}" placeholder="Enter email">
                                        <div style="color: red">{{$errors->first('email')}}</div>
                                    </div>


                                    <div class="form-group col-md-12">
                                    <label >Profile Picture <span style="color: red"></span></label>
                                    <div class="custom-file">
                                        <input type="file" class=" form-control" id="customFile" name="profile_pic" value="{{ old('profile_pic' )}}" >
                                        <div style="color: red">{{$errors->first('profile_pic')}}</div>
                                    </div>
                                    @if (!empty($getRecord->getProfile()))
                                            
                                            <img src="{{$getRecord->getProfile()}}" alt="" style="width: auto; height: 50px; margin-top:5px">
                                    
                                    @endif
                                    </div> 

                                </div>
                            
                            </div>
                            <!-- /.card-body -->

                            <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                            <div class="col-md-4"></div>
                            </div>
                        </form>
                      </div>
                    </div>
                
                </div><!-- /.card-body -->
            
            </div>
            <!-- /.col -->
       
        </div><!-- /.container-fluid -->
      </section>
  </div>
 

@endsection
