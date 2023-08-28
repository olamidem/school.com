@extends('layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Class</h1>
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
                    <input type="text" class="form-control" name="name" value="{{ old('name', $getRecord->name )}}" required placeholder="Class Namee">
                    
                  </div>

                  <div class="form-group">
                    <label>Subject Type </label>
                    <select name="type" id="" class="form-control">
                        <option value="">Select Type</option>
                        <option {{($getRecord->type == 'Theory') ? 'selected' : ''}} value="Theory">Theory</option>
                        <option {{($getRecord->type == 'Practical') ? 'selected' : ''}} value="Practical">Practical</option>
                    </select>
                    
                  </div>

                  <div class="form-group">
                    <label>Status </label>
                    <select name="status" id="" class="form-control">
                        <option {{($getRecord->status == 0) ? 'selected' : ''}} value="0">Active</option>
                        <option {{($getRecord->status == 1) ? 'selected' : ''}} value="1">Inactive</option>
                    </select>
                    
                  </div>

                 
                  
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
