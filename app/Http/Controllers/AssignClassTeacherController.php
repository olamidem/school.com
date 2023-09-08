<?php

namespace App\Http\Controllers;
use App\Models\ClassModel;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\AssignClassTeacherModel;
use Illuminate\Support\Facades\Auth;

class AssignClassTeacherController extends Controller
{
    public function list(){

        $data['header_title'] = 'Assign Class to Teacher';

        return view('admin/assign_class_toteacher/list', $data);
    }
    public function add(){

        $data['header_title'] = 'Assign Class to Teacher';
        $data['getClass'] = ClassModel::getClass();
        $data['getTeacher'] = User::getTeacherClass();

        return view('admin/assign_class_toteacher/add', $data);
    }

    public function insert(Request $request){
    
        if (!empty($request->teacher_id)) {
            
            foreach ($request->teacher_id as $teacher_id) {

                $getFirstAlready = AssignClassTeacherModel::getFirstAlready($request->class_id, $teacher_id);
                if (!empty($getFirstAlready)) {
                    
                    $getFirstAlready->status = $request->status;
                    $getFirstAlready->save();

                } else {
                    
                    $save = new AssignClassTeacherModel();
                    $save->class_id = $request->class_id;
                    $save->teacher_id = $teacher_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;

                    $save->save();

                }
             
            }

        return redirect('admin/assign_class_toteacher/list')->with('success', 'Class Successfully Assign to Teacher ');


        } else {
            
            return redirect()->back()->with('error', 'Due to some error pls try again');

        }
    }
}
