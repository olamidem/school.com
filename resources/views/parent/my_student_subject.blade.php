@extends('layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1>Admin List (Total - {{$getRecord->total()}})</h1> --}}
                    <h1><span style="color: blue">{{$getUser->name}} -  Subjects</span></h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @include('_message')

                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">My Student Subjects</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive table-striped p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Subject Name</th>
                                            <th>Subject Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $index = 1;
                                        @endphp
                                        @foreach ($getRecord as $value)
                                        <tr>
                                            <td>{{$index++}}</td>
                                            <td>{{$value->subject_name}}</td>
                                            <td>{{$value->subject_type}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
            </div><!-- /.container-fluid -->
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection
