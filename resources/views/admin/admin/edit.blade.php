@extends('layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Edit Admin</h1>
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

                  <div class="form-group">
                    <label >Full Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $getRecord->name) }}" required placeholder="Full Namee">
                  </div>

                  <div class="form-group">
                    <label>Email </label>
                    <input type="email" class="form-control" name="email" value="{{old('email', $getRecord->email) }}" required placeholder="Enter email">
                    <div style="color: red">{{$errors->first('email')}}</div>
                  </div>

                  <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" name="password" placeholder="Password">
                  </div>
                  <p><em>Do you want to change your password? Enter a new password</em></p>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
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
