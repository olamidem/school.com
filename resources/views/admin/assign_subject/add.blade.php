@extends('layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Assign New Subject</h1>
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
                    <label>Class Name </label>
                    <select name="class_id" id="" class="form-control" required>
                        <option value="">Select Class</option>
                        @foreach ($getClass as $class)
                        <option value="{{$class->id}}">{{$class->name}}</option>
                        @endforeach
                    </select>
                    
                  </div>

                  <div class="form-group">
                    <label for="">Subject Name</label>

                    @foreach ($getSubject as $subject)
                  
                      <div class="form-check">
                        
                        <label class="form-check-label" style="text-transform: uppercase;" >
                          <input class="form-check-input" type="checkbox" value="{{$subject->id}}" name="subject_id[]" >
                          {{$subject->name}}
                        </label>
                      </div>
                      
                    @endforeach
                
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
