@extends('layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Teacher</h1>
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
                            <input type="text" class="form-control" name="name" value="{{ old('name', $getRecord->name )}}" required placeholder="Full Name">
                            <div style="color: red">{{$errors->first('name')}}</div>
                          </div>



                        <div class="form-group col-md-6">
                            <label>Gender <span style="color: red">*</span></label>
                            <select name="gender" id="" class="form-control" required>
                                <option  value="">Select Gender</option>
                                <option {{(old('gender',$getRecord->gender) == 'male') ? 'selected' : ''}} value="male">Male</option>
                                <option {{(old('gender',$getRecord->gender) == 'female') ? 'selected' : ''}} value="male">Female</option>
                                
                            </select>
                            <div style="color: red">{{$errors->first('gender')}}</div>
                        </div>

                        <div class="form-group col-md-6">
                            <label >Date of Birth <span style="color: red">*</span></label>
                            <input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth',$getRecord->date_of_birth )}}" required>
                            
                            <div style="color: red">{{$errors->first('date_of_birth')}}</div>

                        </div>

                        <div class="form-group col-md-6">
                            <label >Date of Joining <span style="color: red">*</span></label>
                            <input type="date" class="form-control" name="joined_date" value="{{ old('joined_date',$getRecord->joined_date)}}" required>
                            
                            <div style="color: red">{{$errors->first('joined_date')}}</div>

                        </div>

                        <div class="form-group col-md-6">
                            <label > Marital Status <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="marital_status" value="{{ old('marital_status' ,$getRecord->marital_status )}}" required>
                            
                            <div style="color: red">{{$errors->first('marital_status')}}</div>

                        </div>

                        <div class="form-group col-md-6">
                            <label >Religion <span style="color: red"></span></label>
                            <input type="text" class="form-control" name="religion" value="{{ old('religion', $getRecord->religion )}}" placeholder="Religion">
                            <div style="color: red">{{$errors->first('religion')}}</div>
                        </div>

                        <div class="form-group col-md-6">
                            <label > Address <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="address" value="{{ old('address', $getRecord->address )}}" placeholder="Address" required>
                            <div style="color: red">{{$errors->first('address')}}</div>
                         </div>

                        <div class="form-group col-md-6">
                            <label >Phone Number <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number', $getRecord->mobile_number )}}" required placeholder="Phone Number">
                            <div style="color: red">{{$errors->first('mobile_number')}}</div>
                        </div>


                        <div class="form-group col-md-6">
                          <label >Profile Picture <span style="color: red"></span></label>
                          <div class="custom-file">
                            <input type="file" class=" form-control" id="customFile" name="profile_pic" value="{{ old('profile_pic' )}}" >
                            <div style="color: red">{{$errors->first('profile_pic')}}</div>
                          </div>
                          @if (!empty($getRecord->getProfile()))
                                
                                <img src="{{$getRecord->getProfile()}}" alt="" style="width: auto; height: 50px; margin-top:5px">
                          
                         @endif
                        </div>

                        
                        <div class="form-group col-md-6">
                            <label >Note <span style="color: red"></span></label>
                            <textarea id="inputDescription" class="form-control" rows="4" name="note" >{{ old('note',$getRecord->note )}}</textarea>
                            <div style="color: red">{{$errors->first('note')}}</div>
                        </div>

                        <div class="form-group col-md-6">
                            <label >Work Experience <span style="color: red"></span></label>
                            <textarea id="inputDescription" class="form-control" rows="4" name="work_experience" >{{ old('work_experience',$getRecord->work_experience )}}</textarea>
                            <div style="color: red">{{$errors->first('work_experience')}}</div>
                        
                        </div>

                        <div class="form-group col-md-6">
                            <label>Status <span style="color: red">*</span></label>
                            <select name="status" id="" class="form-control" required>

                                <option value="">Select Status</option>

                                <option {{(old('status',$getRecord->status) == 0) ? 'selected' : ''}}  value="0">Active</option>
                                <option {{(old('status',$getRecord->status) == 1) ? 'selected' : ''}}  value="1">Inactive</option>
                
                            </select>
                            <div style="color: red">{{$errors->first('status')}}</div>
                        </div>

                        <div class="form-group col-md-6">
                            <label> qualification <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="qualification" value="{{ old('qualification',$getRecord->qualification )}}" required placeholder="qualification" >
                            <div style="color: red">{{$errors->first('qualification')}}</div>
                        
                        </div>

                        <div class="form-group col-md-6">
                            <label> Email <span style="color: red">*</span></label>
                            <input type="email" class="form-control" name="email" required value="{{ old('email', $getRecord->email) }}" placeholder="Enter email">
                            <div style="color: red">{{$errors->first('email')}}</div>
                        </div>

                        <div class="form-group col-md-6">
                            <label> Password <span style="color: red"></span></label>
                            <input type="password" class="form-control" name="password"  value="{{ old('password') }}" placeholder="Password">
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
  <!-- /.content-wrapper -->

@endsection
