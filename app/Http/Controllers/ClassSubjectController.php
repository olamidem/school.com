<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\SubjectModel;
use App\Models\ClassSubjectModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassSubjectController extends Controller
{
    //
    public function list(){

        $data['header_title'] = 'Subject Assign';
        $data['getRecord'] = ClassSubjectModel::getRecord();

        return view('admin/assign_subject/list', $data);
    }

    public function add(){
        $data['header_title'] = 'Assign Subject';

        $data['getClass'] = ClassModel::getClass();
        $data['getSubject'] = SubjectModel::getSubject();

        return view('admin/assign_subject/add', $data);
    }

    public function insert(Request $request){
        
        if (!empty($request->subject_id)) {
            
            foreach ($request->subject_id as $subject_id) {

                $getFirstAlready = ClassSubjectModel::getFirstAlready($request->class_id, $subject_id);
                if (!empty($getFirstAlready)) {
                    
                    $getFirstAlready->status = $request->status;
                    $getFirstAlready->save();

                } else {
                    
                    $save = new ClassSubjectModel();
                    $save->class_id = $request->class_id;
                    $save->subject_id = $subject_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;

                    $save->save();

                }
             
            }

        return redirect('admin/assign_subject/list')->with('success', 'Subject Successfully Assign to Class ');


        } else {
            
            return redirect()->back()->with('error', 'Dur to some error pls try again');

        }
        
    }

    public function edit($id){

        $getRecord = ClassSubjectModel::getSingle($id);

        if (!empty($getRecord)) {

            $data['getRecord'] = $getRecord;
            $data['getAssignedSubjectID'] = ClassSubjectModel::getAssignedSubjectID($getRecord->class_id);

            $data['header_title'] = 'Edit Assigned Subject';

            $data['getClass'] = ClassModel::getClass();
            $data['getSubject'] = SubjectModel::getSubject();

            return view('admin/assign_subject/edit', $data);

        } else {
            
            abort(404);
        }
        
        
    }

    public function update(Request $request){

        ClassSubjectModel::deleteSubject($request->class_id);

        if (!empty($request->subject_id)) {
            
            foreach ($request->subject_id as $subject_id) {

                $getFirstAlready = ClassSubjectModel::getFirstAlready($request->class_id, $subject_id);
                if (!empty($getFirstAlready)) {
                    
                    $getFirstAlready->status = $request->status;
                    $getFirstAlready->save();

                } else {
                    
                    $save = new ClassSubjectModel();
                    $save->class_id = $request->class_id;
                    $save->subject_id = $subject_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;

                    $save->save();

                }
             
            }
        }
        return redirect('admin/assign_subject/list')->with('success', 'Subject Successfully Assign to Class ');

    }

    public function delete($id){

        $save = ClassSubjectModel::getSingle($id);
        $save->is_delete = 1;

        $save->save();

        return redirect()->back()->with('success', 'Subject assigned Successfully Deleted ');

    }

    public function edit_single($id){

        $getRecord = ClassSubjectModel::getSingle($id);

        if (!empty($getRecord)) {

            $data['getRecord'] = $getRecord;
            $data['header_title'] = 'Edit Assigned Subject';

            $data['getClass'] = ClassModel::getClass();
            $data['getSubject'] = SubjectModel::getSubject();

            return view('admin/assign_subject/edit_single', $data);

        } else {
            
            abort(404);
        }

    }
}
