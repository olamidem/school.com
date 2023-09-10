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
        $data['getRecord'] = AssignClassTeacherModel::getRecord();

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

    public function edit($id){


        $getRecord = AssignClassTeacherModel::getSingle($id);

        if (!empty($getRecord)) {

            $data['getRecord'] = $getRecord;
            $data['getAssignedTeacherID'] = AssignClassTeacherModel::getAssignedTeacherID($getRecord->class_id);
            $data['header_title'] = 'Edit Assigned Subject';
            $data['getClass'] = ClassModel::getClass();
            $data['getTeacher'] = User::getTeacherClass();

            return view('admin/assign_class_toteacher/edit', $data);

        } else {

            abort(404);
        }


    }

    public function update( Request $request){

        AssignClassTeacherModel::deleteTeacher($request->class_id);

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
        }

        return redirect('admin/assign_class_toteacher/list')->with('success', 'Assign Class to Teacher Successfully  updated');

    }


    public function edit_single($id){

        $getRecord = AssignClassTeacherModel::getSingle($id);

        if (!empty($getRecord)) {

            $data['getRecord'] = $getRecord;
            $data['header_title'] = 'Edit Assigned Subject';
            $data['getClass'] = ClassModel::getClass();
            $data['getTeacher'] = User::getTeacherClass();

            return view('admin/assign_class_toteacher/edit_single', $data);

        } else {

            abort(404);
        }


    }

    public function update_single($id, Request $request){
        
        $getFirstAlready = AssignClassTeacherModel::getFirstAlready($request->class_id, $request->teacher_id);
 
        if (!empty($getFirstAlready)) {

            $getFirstAlready->status = $request->status;
            $getFirstAlready->save();
            return redirect('admin/assign_class_toteacher/list')->with('success', 'Status Successfully Updated');


        } else {

            $save = AssignClassTeacherModel::getSingle($id);
            $save->class_id = $request->class_id;
            $save->teacher_id = $request->teacher_id;
            $save->status = $request->status;


            $save->save();

            return redirect('admin/assign_class_toteacher/list')->with('success',  'Assign Class to Teacher Successfully  updated' );

        }

    }

    public function delete($id){
        $save = AssignClassTeacherModel::getSingle($id);;
        $save->delete();

        return redirect()->back()->with('success',  'Assign Class to Teacher Successfully  Deleted' );

    }

    public function myClassSubject(){

        $data['header_title'] = 'My class & Subject';
        $data['getRecord'] = AssignClassTeacherModel::getMyClassSubject(Auth::user()->id);

        return view('teacher.my_class_subject', $data);

    }

}
