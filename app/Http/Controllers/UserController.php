<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    //

    public function myAccount(){

        $data['getRecord'] =  User::getSingle(Auth::user()->id);
        $data['getClass'] =  User::getClassName(Auth::user()->id);
        $data['header_title'] = 'My Account';

        if (Auth::user()->user_type == 2) {

            return view('teacher/my_account', $data);
        }
        else if(Auth::user()->user_type == 3){
            
            return view('student/my_account', $data);
        }
        else if(Auth::user()->user_type == 4){
            
            return view('parent/my_account', $data);
        }
    }

    public function updateMyStudentAccount(Request $request){
        
        $id = Auth::user()->id;
        $student = User::getSingle($id);
            
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id,
            'height' => 'max:10',
            'weight' => 'max:10',
            'blood_group' => 'max:10',
            'mobile_number' => 'max:15 | min:11',
            'religion' => 'max:50',
        ]);

        $student = User::getSingle($id);

        if (!empty($request->date_of_birth)) {
            $student->date_of_birth = trim($request->date_of_birth);
        }

        if (!empty($request->file('profile_pic'))) {

            if(!empty($student->getProfile())){

                unlink('upload/profile/'.$student->profile_pic);
            }
            
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr ).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $student->profile_pic = $filename;
             
        }
        $student->religion = trim($request->religion);
        $student->mobile_number = trim($request->mobile_number);
        $student->name = trim($request->name);
        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->gender = trim($request->gender);
        $student->address = trim($request->address);
        $student->email = trim($request->email);
        
        if (!empty($request->password)) {

            $student->password = hash::make($request->password);
        }

        $student->save();

        return redirect()->back()->with('success', 'Account Successfully Updated');

    }
    

    public function updateParentAccount(Request $request){
        
        $id = Auth::user()->id;
        request()->validate([

            'email' => 'required|email|unique:users,email,'.$id,
            'address' => 'max:255',
            'mobile_number' => 'required| numeric | min:11',

        ]);

        $parent = User::getSingle($id);
        $parent->name = trim($request->name);
       
        if (!empty($request->file('profile_pic'))) {

            if(!empty($parent->getProfile())){

                unlink('upload/profile/'.$parent->profile_pic);
            }
            
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr ).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $parent->profile_pic = $filename;
             
        }
        $parent->mobile_number = trim($request->mobile_number);
        $parent->occupation = trim($request->occupation);
        $parent->gender = trim($request->gender);
        $parent->address = trim($request->address);
    
        $parent->email = trim($request->email);

        if (!empty($request->password)) {

            $parent->password = Hash::make($request->password);
            
        }
    
        $parent->save();

        return redirect()->back()->with('success', 'Account Successfully Updated');

    }
    public function updateMyAccount(Request $request){

        $id = Auth::user()->id;
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

        if (!empty($request->date_of_birth)) {
            $teacher->date_of_birth = trim($request->date_of_birth);
        }
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->gender = trim($request->gender);
        $teacher->address = trim($request->address);
        $teacher->religion = trim($request->religion);
        $teacher->work_experience = trim($request->work_experience);
        $teacher->qualification = trim($request->qualification);
        $teacher->marital_status = trim($request->marital_status);
        $teacher->email = trim($request->email);

        if (!empty($request->password)) {

            $teacher->password = Hash::make($request->password);
            
        }
    
        $teacher->save();

        return redirect()->back()->with('success', 'Account Successfully Updated');
    }
    public function change_password(){

        $data['header_title'] = 'Change Password';

        return view('profile.change_password', $data);
    }

    public function update_change_password(Request $request){
       
        $user = User::getSingle(Auth::user()->id);

        if (Hash::check($request->old_password, $user->password)) {

            $user->password = Hash::make($request->new_password);
            $user->save();

            return redirect()->back()->with('success', 'Password Successfully Updated');

        } else {
            
            return redirect()->back()->with('error', 'Old Password is not Correct');

        }
        

    }
}
