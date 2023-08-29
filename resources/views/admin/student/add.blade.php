@extends('layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Student</h1>
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
             
              <form method="POST">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label >Full Name <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="name" value="{{ old('name' )}}" required placeholder="Full Name">
                        </div>

                        <div class="form-group col-md-6">
                            <label >Admission Number <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="admission_number" value="{{ old('admission_number' )}}" required placeholder="Admission Number">
                        </div>

                        <div class="form-group col-md-6">
                            <label >Roll Number <span style="color: red"></span></label>
                            <input type="text" class="form-control" name="roll_number" value="{{ old('roll_number' )}}" placeholder="Roll Number">
                        </div>

                        <div class="form-group col-md-6">
                            <label > Class <span style="color: red">*</span></label>
                            <select name="class_id" id="" class="form-control" required>
                                <option value="">Select Class</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Gender <span style="color: red">*</span></label>
                            <select name="gender" id="" class="form-control" required>
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label >Date of Birth <span style="color: red">*</span></label>
                            <input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth' )}}" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label >Religion <span style="color: red"></span></label>
                            <input type="text" class="form-control" name="religion" value="{{ old('religion' )}}" placeholder="Religion">
                        </div>

                        <div class="form-group col-md-6">
                            <label > Address <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="address" value="{{ old('address' )}}" placeholder="Address" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label >Phone Number <span style="color: red"></span></label>
                            <input type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number' )}}" placeholder="Phone Number">
                        </div>

                        <div class="form-group col-md-6">
                            <label >Admission date <span style="color: red">*</span></label>
                            <input type="date" class="form-control" name="admission_date" value="{{ old('admission_number' )}}" required >
                        </div>

                        <div class="form-group col-md-6">
                            <label >Profile Picture <span style="color: red"></span></label>
                            <input type="file" class="form-control" name="profile_pic" value="{{ old('profile_pic' )}}" placeholder="Profile Picture" >
                        </div>

                        <div class="form-group col-md-6">
                            <label >Blood Group <span style="color: red"></span></label>
                            <input type="text" class="form-control" name="blood_group" value="{{ old('blood_group' )}}" placeholder="Blood Group" >
                        </div>

                        <div class="form-group col-md-6">
                            <label >Height <span style="color: red"></span></label>
                            <input type="text" class="form-control" name="height" value="{{ old('height' )}}" placeholder="Height" >
                        </div>

                        <div class="form-group col-md-6">
                            <label >Weight <span style="color: red"></span></label>
                            <input type="text" class="form-control" name="weight" value="{{ old('weight' )}}" placeholder="Weight" >
                        </div>

                        <div class="form-group col-md-6">
                            <label>Status <span style="color: red">*</span></label>
                            <select name="status" id="" class="form-control" required>
                                <option value="">Select Status</option>
                                <option value="0">Active</option>
                                <option value="1">Inactive</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label> Email <span style="color: red">*</span></label>
                            <input type="email" class="form-control" name="email" required value="{{ old('email') }}" placeholder="Enter email">
                            <div style="color: red">{{$errors->first('email')}}</div>
                        </div>

                        <div class="form-group col-md-6">
                            <label> Password <span style="color: red">*</span></label>
                            <input type="password" class="form-control" name="password" required value="{{ old('password') }}" placeholder="Password">
                        </div>

                    </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer row">
                  <div class="col-md-6"></div>
                  <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
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
