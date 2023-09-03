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
        $data['header_title'] = 'My Account';

        if (Auth::user()->user_type == 2) {

            return view('teacher/my_account', $data);
        }
        else if(Auth::user()->user_type == 3){
            
            return view('student/my_account', $data);
        }
    }

    public function updateMyStudentAccount(Request $request){
        
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
    
        $teacher->save();

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
