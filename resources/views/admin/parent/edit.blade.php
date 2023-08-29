@extends('layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Parent</h1>
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
            <!-- general form elements -->
            <div class="card card-primary">
            
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
                            <label>Gender <span style="color: red">*</span></label>
                            <select name="gender" id="" class="form-control" required>
                                <option  value="">Select Gender</option>
                                <option {{(old('gender', $getRecord->gender) == 'male') ? 'selected' : ''}} value="male">Male</option>
                                <option {{(old('gender', $getRecord->gender) == 'female') ? 'selected' : ''}} value="female">Female</option>
                                
                            </select>
                            <div style="color: red">{{$errors->first('gender')}}</div>
                        </div>

                        <div class="form-group col-md-6">
                            <label >Occupation<span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="occupation" value="{{ old('occupation', $getRecord->occupation )}}" required>
                            
                            <div style="color: red">{{$errors->first('occupation')}}</div>

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
                            <label >Profile Picture <span style="color: red"></span></label>
                            <input type="file" class="form-control" name="profile_pic" value="{{ old('profile_pic' )}}" placeholder="Profile Picture" >
                            <div style="color: red">{{$errors->first('profile_pic')}}</div>
                            
                            @if (!empty($getRecord->getProfile()))
                                
                                <img src="{{$getRecord->getProfile()}}" alt="" style="width: auto; height: 50px">
                                
                            @endif
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
            <!-- /.card -->

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
