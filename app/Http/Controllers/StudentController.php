<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function list(){

        $data['getRecord'] = User::getStudent();
        $data['header_title'] = 'Student List';

        return view('admin/student/list',$data);
    }
    
    
    public function add(){

        $data['header_title'] = 'Add New Student';

        return view('admin/student/add', $data);
    }
    

}
