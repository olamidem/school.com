@extends('layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Subject</h1>
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
                    <label >Subject Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name' )}}" required placeholder="Subject Name">
                    <div style="color: red">{{$errors->first('name')}}</div> 
                  </div>

                  <div class="form-group">
                    <label>Subject Type </label>
                    <select name="type" id="" class="form-control" required>
                        <option value="">Select Type</option>
                        <option value="Theory">Theory</option>
                        <option value="Practical">Practical</option>
                    </select>
                    
                  </div>

                  <div class="form-group">
                    <label>Subject Status </label>
                    <select name="status" id="" class="form-control">
                        <option value="0">Active</option>
                        <option value="1">Inactive</option>
                    </select>
                    
                  </div>

                 
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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
