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

                    @if ($getRecord->user_type == 3)
                        <p class="text-muted text-center"> 
                            Student
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
                  <strong><i class="fas fa-book mr-1"></i> Class</strong>
  
                  <p class="text-muted">
                    {{$getRecord->class_name}}
                  </p>
  
                  <hr>
  
                  <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
  
                  <p class="text-muted"> {{$getRecord->address}}</p>
  
                  <hr>

                  <strong><i class="fas fa-phone mr-1"></i> Phone Number</strong>
  
                  <p class="text-muted"> {{$getRecord->mobile_number}}</p>
  
                  <hr>
  
                  <strong><i class="fas fa-calendar mr-1"></i> Admission Date</strong>
  
                  <p class="text-muted">
                    {{$getRecord->admission_date}}
                  </p>
  
                  <hr>
  
                  <strong><i class="far fa-file-alt mr-1"></i> Work Experience</strong>
  
                  <p class="text-muted">{{$getRecord->work_experience}}</p>
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
                                        <input type="text" class="form-control" name="name" value="{{ old('name',$getRecord->name )}}" required placeholder="Full Name">
                                        <div style="color: red">{{$errors->first('name')}}</div>
                                      </div>
            
                                    <div class="form-group col-md-6">
                                        <label >Admission Number <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="admission_number" value="{{ old('admission_number', $getRecord->admission_number )}}" required placeholder="Admission Number">
                                        <div style="color: red">{{$errors->first('admission_number')}}</div>
                                    </div>
            
                                    <div class="form-group col-md-6">
                                        <label >Roll Number <span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="roll_number" value="{{ old('roll_number', $getRecord->roll_number )}}" placeholder="Roll Number">
                                        <div style="color: red">{{$errors->first('roll_number')}}</div>
            
                                    </div>
            
                                    <div class="form-group col-md-6">
                                        <label>Gender <span style="color: red">*</span></label>
                                        <select name="gender" id="" class="form-control" required>
                                            <option  value="">Select Gender</option>
                                            <option {{(old('gender', $getRecord->gender) == 'male') ? 'selected' : ''}} value="male">Male</option>
                                            <option {{(old('gender', $getRecord->gender) == 'female') ? 'selected' : ''}} value="female">Female</option>
                                            
                                        </select>
                                        <div style="color: red">{{$errors->first('gender')}}</div>
                                    </div>
            
                                    <div class="form-group col-md-6">
                                        <label >Date of Birth <span style="color: red">*</span></label>
                                        <input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth', $getRecord->date_of_birth )}}" required>
                                        
                                        <div style="color: red">{{$errors->first('date_of_birth')}}</div>
            
                                      </div>
            
                                    <div class="form-group col-md-6">
                                        <label >Religion <span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="religion" value="{{ old('religion', $getRecord->religion)}}" placeholder="Religion">
                                        <div style="color: red">{{$errors->first('religion')}}</div>
                                    </div>
            
                                    <div class="form-group col-md-6">
                                        <label > Address <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="address" value="{{ old('address', $getRecord->address )}}" placeholder="Address" required>
                                        <div style="color: red">{{$errors->first('address')}}</div>
                                     </div>
            
                                    <div class="form-group col-md-6">
                                        <label >Phone Number <span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number', $getRecord->mobile_number )}}" placeholder="Phone Number">
                                        <div style="color: red">{{$errors->first('mobile_number')}}</div>
                                    </div>
            
                                    <div class="form-group col-md-6">
                                        <label >Admission date <span style="color: red">*</span></label>
                                        <input type="date" class="form-control" name="admission_date" value="{{ old('admission_date', $getRecord->admission_date)}}" required >
                                        <div style="color: red">{{$errors->first('admission_date')}}</div>
                                    </div>
            
                                    <div class="form-group col-md-6">
                                      <label >Profile Picture <span style="color: red"></span></label>
            
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input form-control" id="customFile" name="profile_pic" value="{{ old('profile_pic' )}}" placeholder="Profile Picture" >
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                        <div style="color: red">{{$errors->first('profile_pic')}}</div>
                                      </div>
                                        
                                        @if (!empty($getRecord->getProfile()))
                                            
                                            <img src="{{$getRecord->getProfile()}}" alt="" style="width: auto; height: 50px; margin-top:5px">
                                            
                                        @endif
                                    </div>
            
                                    <div class="form-group col-md-6">
                                        <label >Blood Group <span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="blood_group" value="{{ old('blood_group', $getRecord->blood_group)}}" placeholder="Blood Group" >
                                        <div style="color: red">{{$errors->first('blood_group')}}</div>
                                    
                                    </div>
            
                                    <div class="form-group col-md-6">
                                        <label >Height <span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="height" value="{{ old('height', $getRecord->height)}}" placeholder="Height" >
                                        <div style="color: red">{{$errors->first('height')}}</div>
                                    
                                    </div>
            
                                    <div class="form-group col-md-6">
                                        <label >Weight <span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="weight" value="{{ old('weight', $getRecord->weight)}}" placeholder="Weight" >
                                        <div style="color: red">{{$errors->first('weight')}}</div>
                                    
                                    </div>
            
                                    <div class="form-group col-md-6">
                                        <label>Status <span style="color: red">*</span></label>
                                        <select name="status" id="" class="form-control" required>
            
                                            <option value="">Select Status</option>
                                            <option {{(old('status', $getRecord->status) == 1) ? 'selected' : ''}}  value="1">Inactive</option>
                                            <option {{(old('status', $getRecord->status) == 0) ? 'selected' : ''}}  value="0">Active</option>
                            
                                        </select>
                                        <div style="color: red">{{$errors->first('status')}}</div>
                                    </div>
            
                                    <div class="form-group col-md-6">
                                        <label> Email <span style="color: red">*</span></label>
                                        <input type="email" class="form-control" name="email" required value="{{ old('email', $getRecord->email) }}" placeholder="Enter email">
                                        <div style="color: red">{{$errors->first('email')}}</div>
                                    </div>
            
                                    <div class="form-group col-md-6">
                                        <label> Password <span style="color: red"></span></label>
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                        <p>Do you want to change password so please add new password</p>
                                    </div>
            
                                </div>
                              
                            </div>
                            <!-- /.card-body -->
            
                            <div class="card-footer row">
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
