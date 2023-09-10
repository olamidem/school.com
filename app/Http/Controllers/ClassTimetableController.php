<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\ClassSubjectModel;

class ClassTimetableController extends Controller
{
    public function list(){
       
        $data['header_title'] = 'Class Timetable list';
        $data['getClass'] = ClassModel::getClass();
        return view('admin/class_timetable/list',$data);
    }

    public function get_subject(Request $request){
        
        $getSubject = ClassSubjectModel::mySubject($request->class_id);
        
        $html = "<option value=''>Select </option>";

        foreach ($getSubject as $value) {
            
            $html .= "<option value='".$value->subject_id."'>".$value->subject_name." </option>";
        }
        $json['html'] = $html;
        echo json_encode($json);
    }
}
