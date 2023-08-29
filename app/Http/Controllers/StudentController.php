<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\ClassModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


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

        request()->validate([
            'email' => 'required|email|unique:users',
            'height' => 'max:10',
            'weight' => 'max:10',
            'blood_group' => 'max:10',
            'mobile_number' => 'max:15 | min:11',
            'religion' => 'max:50',
            'admission_number' => 'max:50',
            'roll_number' => 'max:50',
        ]);

        $student = new User();
        $student->name = trim($request->name);
        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);

        if (!empty($request->date_of_birth)) {
            $student->date_of_birth = trim($request->date_of_birth);
        }

        if (!empty($request->file('profile_pic'))) {
            
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr ).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $student->profile_pic = $filename;
             
        }
        $student->religion = trim($request->religion);
        $student->mobile_number = trim($request->mobile_number);

        if (!empty($request->admission_date)) {
            
            $student->admission_date = trim($request->admission_date);
        }
        
        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->status = trim($request->status);
        $student->gender = trim($request->gender);
        $student->address = trim($request->address);
        $student->email = trim($request->email);
        $student->password = hash::make($request->password);
        $student->user_type = 3;;

        $student->save();

        return redirect('admin/student/list')->with('success', 'Student Successfully Created');

    }

    public function edit($id){

        $data['getRecord'] = User::getSingle($id);
        if (!empty($data['getRecord'])) {
            
            $data['header_title'] = 'Edit Student';
            $data['getClass'] = ClassModel::getClass();
            return view('admin/student/edit', $data);
        }else{
            abort(404);
        }

    }

    public function update($id, Request $request){
        
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id,
            'height' => 'max:10',
            'weight' => 'max:10',
            'blood_group' => 'max:10',
            'mobile_number' => 'max:15 | min:11',
            'religion' => 'max:50',
            'admission_number' => 'max:50',
            'roll_number' => 'max:50',
        ]);

        $student = User::getSingle($id);
        $student->name = trim($request->name);
        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);

        if (!empty($request->date_of_birth)) {
            $student->date_of_birth = trim($request->date_of_birth);
        }

        if (!empty($request->file('profile_pic'))) {
            
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr ).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $student->profile_pic = $filename;
             
        }
        $student->religion = trim($request->religion);
        $student->mobile_number = trim($request->mobile_number);

        if (!empty($request->admission_date)) {
            
            $student->admission_date = trim($request->admission_date);
        }
        
        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->status = trim($request->status);
        $student->gender = trim($request->gender);
        $student->address = trim($request->address);
        $student->email = trim($request->email);
        
        if (!empty($request->password)) {

            $student->password = hash::make($request->password);
        }

        $student->save();

        return redirect('admin/student/list')->with('success', 'Student Successfully Updated');

    }
    

}
