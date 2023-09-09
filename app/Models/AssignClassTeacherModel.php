<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class AssignClassTeacherModel extends Model
{
    use HasFactory;

    protected $table = 'assign_class_teacher';


    static public function getFirstAlready($class_id, $teacher_id){

        return AssignClassTeacherModel::where('class_id', '=', $class_id)->where('teacher_id', '=', $teacher_id)->first();
    }

    public static function getRecord(){

       // Start with the base query
        $query = AssignClassTeacherModel::select(
            'assign_class_teacher.*',
            'class.name as class_name',
            'teacher.name as teacher_name',
            'users.name as created_by_name'
        )
            ->join('users as teacher', 'teacher.id', '=', 'assign_class_teacher.teacher_id')
            ->join('class', 'class.id', '=', 'assign_class_teacher.class_id')
            ->join('users', 'users.id', '=', 'assign_class_teacher.created_by');

        // Check if 'class_name' filter is provided
        if (!empty(Request::get('class_name'))) {
            $query->where('class.name', 'like', '%' . Request::get('class_name') . '%');
        }

        // Check if 'teacher_name' filter is provided
        if (!empty(Request::get('teacher_name'))) {
            $query->where('teacher.name', 'like', '%' . Request::get('teacher_name') . '%');
        }

        // Check if 'status' filter is provided
        if (!empty(Request::get('status'))) {
            $status = (Request::get('status') == 100) ? 0 : '1';
            $query->where('assign_class_teacher.status', '=', $status);
        }

        // Additional filters
        $query->where('assign_class_teacher.is_delete', '=', 0)
            ->orderBy('assign_class_teacher.id', 'desc');

        // Paginate the results with a limit of 20 per page
        $results = $query->paginate(20);

        return $results;

        
    }

    public static function getSingle($id){

        return self::find($id);
    }

    static public function getAssignedTeacherID($class_id){

        return self::where('class_id', '=', $class_id)->where('is_delete', '=', 0)->get();


    }

    static public function deleteTeacher($class_id){

        return AssignClassTeacherModel::where('class_id', '=', $class_id)->delete();


    }

}
