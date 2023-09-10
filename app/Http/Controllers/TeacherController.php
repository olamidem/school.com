<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class TeacherController extends Controller
{
    
    public function list(){

        $data['header_title'] = 'Teacher List';
        $data['getRecord'] = User::getTeacher();


        return view('admin/teacher/list', $data);
    }

    public function add(){
        
        $data['header_title'] = 'Add Teacher';
        return view('admin/teacher/add',$data);
    }

    public function insert(Request $request){
        
        request()->validate([

            'email' => 'required|email|unique:users',
            'address' => 'max:255',
            'mobile_number' => 'required| numeric | min:11',
            'marital_status' => 'required| max:60',
            
        ]);

        $teacher = new User();
        $teacher->name = trim($request->name);
       
        if (!empty($request->file('profile_pic'))) {
            
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr ).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $teacher->profile_pic = $filename;
             
        }

        if (!empty($request->joined_date)) {
            $teacher->joined_date = trim($request->joined_date);
        }
        if (!empty($request->date_of_birth)) {
            $teacher->date_of_birth = trim($request->date_of_birth);
        }
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->occupation = trim($request->occupation);
        $teacher->status = trim($request->status);
        $teacher->gender = trim($request->gender);
        $teacher->address = trim($request->address);
        $teacher->note = trim($request->note);
        $teacher->religion = trim($request->religion);
        $teacher->work_experience = trim($request->work_experience);
        $teacher->qualification = trim($request->qualification);
        $teacher->marital_status = trim($request->marital_status);
        $teacher->email = trim($request->email);
        $teacher->password = hash::make($request->password);
        $teacher->user_type = 2;

        $teacher->save();

        return redirect('admin/teacher/list')->with('success', 'Teacher Successfully Created');

    }

    public function edit($id){

        $data['getRecord'] = User::getSingle($id);
        if (!empty($data['getRecord'])) {
            
            $data['header_title'] = 'Edit PArent';
            return view('admin/teacher/edit', $data);
        }else{
            abort(404);
        }
       
    }

    public function update($id, Request $request){
        request()->validate([

            'email' => 'required|email|unique:users,email,'.$id,
            'address' => 'max:255',
            'mobile_number' => 'required| numeric | min:11',
            'marital_status' => 'required| max:60',
            
        ]);

        $teacher = User::getSingle($id);
        $teacher->name = trim($request->name);
       
        if (!empty($request->file('profile_pic'))) {

            if(!empty($teacher->getProfile())){

                unlink('upload/profile/'.$teacher->profile_pic);
            }
            
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr ).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $teacher->profile_pic = $filename;
             
        }

        if (!empty($request->joined_date)) {
            $teacher->joined_date = trim($request->joined_date);
        }
        if (!empty($request->date_of_birth)) {
            $teacher->date_of_birth = trim($request->date_of_birth);
        }
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->occupation = trim($request->occupation);
        $teacher->status = trim($request->status);
        $teacher->gender = trim($request->gender);
        $teacher->address = trim($request->address);
        $teacher->note = trim($request->note);
        $teacher->religion = trim($request->religion);
        $teacher->work_experience = trim($request->work_experience);
        $teacher->qualification = trim($request->qualification);
        $teacher->marital_status = trim($request->marital_status);
        $teacher->email = trim($request->email);
        if (!empty($request->password)) {

            $teacher->password = hash::make($request->password);
        }

        $teacher->save();

        return redirect('admin/teacher/list')->with('success', 'Teacher Successfully Updated');
    }

    public function delete($id){

        $save = User::getSingle($id);
        $save->is_delete = 1;
        $save->save();

        return redirect()->back()->with('success', 'Teacher Successfully Deleted');

    }

}
