<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\WeekModel;


class ClassTimetableController extends Controller
{
    public function list(Request $request){
       
        $data['header_title'] = 'Class Timetable list';
        $data['getClass'] = ClassModel::getClass();
        
        if (!empty($request->class_id)) {

            $data['getSubject'] = ClassSubjectModel::mySubject($request->class_id);

        }
        
        $getWeek = WeekModel::getRecord();
        $week = array();

        foreach ($getWeek as $value) {
            
            $dataW = array();
            $dataW['week_id'] = $value->id;
            $dataW['week_name'] = $value->name;
            $week[] = $dataW;

        }
        
        $data['week'] = $week;
        return view('admin/class_timetable/list',$data);
    }
// 
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
