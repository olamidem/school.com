<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\ClassModel;
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
        $data['getClass'] = ClassModel::getClass();

        return view('admin/student/add', $data);
    }

    public function insert(Request $request){
        $student = new User();
        $student->name = trim($request->name);
        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);

        if (!empty($request->date_of_birth)) {
            $student->date_of_birth = trim($request->date_of_birth);
        }
        $student->religion = trim($request->religion);
        $student->mobile_number = trim($request->mobile_number);
        $student->admission_date = trim($request->admission_date);
        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->status = trim($request->status);
        $student->email = trim($request->email);
        $student->password = hash::make($request->password);
        $student->user_type = 3;;

        $student->save();

        return redirect('admin/student/list')->with('success', 'Student Successfully Created');

    }
    

}
