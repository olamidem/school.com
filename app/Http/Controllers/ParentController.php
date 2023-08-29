<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    
    public function list(){

        $data['getRecord'] = User::getParent();
        $data['header_title'] = 'Parent List';

        return view('admin/parent/list',$data);
    }
    public function add(){

        $data['header_title'] = 'Add New Parent';

        return view('admin/parent/add',$data);
    }

    public function insert(Request $request){

        request()->validate([

            'email' => 'required|email|unique:users',
            'address' => 'max:255',
            'occupation' => 'max:60',
            'mobile_number' => 'required| numeric | min:11',
            
        ]);

        $parent = new User();
        $parent->name = trim($request->name);
       
        if (!empty($request->file('profile_pic'))) {
            
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr ).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $parent->profile_pic = $filename;
             
        }
        $parent->mobile_number = trim($request->mobile_number);

        $parent->occupation = trim($request->occupation);
        $parent->status = trim($request->status);
        $parent->gender = trim($request->gender);
        $parent->address = trim($request->address);
        $parent->email = trim($request->email);
        $parent->password = hash::make($request->password);
        $parent->user_type = 4;

        $parent->save();

        return redirect('admin/student/list')->with('success', 'Parent Successfully Created');

    }

    public function edit($id){

        $data['getRecord'] = User::getSingle($id);
        if (!empty($data['getRecord'])) {
            
            $data['header_title'] = 'Edit PArent';
            return view('admin/parent/edit', $data);
        }else{
            abort(404);
        }

    }

    public function update($id, Request $request){

        request()->validate([

            'email' => 'required|email|unique:users,email,'.$id,
            'address' => 'max:255',
            'occupation' => 'max:60',
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
        $parent->status = trim($request->status);
        $parent->gender = trim($request->gender);
        $parent->address = trim($request->address);
        $parent->email = trim($request->email);
        
        if (!empty($request->password)) {

            $parent->password = hash::make($request->password);
        }

        $parent->save();

        return redirect('admin/parent/list')->with('success', 'Parent Successfully Updated');

    }

    public function delete($id){

        $getRecord = User::getSingle($id);
        if (!empty($getRecord)) {
            
            $getRecord->is_delete = 1;
            $getRecord->save();

            return redirect()->back()->with('success', 'Parent Successfully Deleted');

        }else{
            abort(404);
        }

    }
    
}
