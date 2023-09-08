<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignClassTeacherModel extends Model
{
    use HasFactory;

    protected $table = 'assign_class_teacher';


    static public function getFirstAlready($class_id, $teacher_id){

        return AssignClassTeacherModel::where('class_id', '=', $class_id)->where('teacher_id', '=', $teacher_id)->first();
    }

    public static function getRecord(){

        $return =  AssignClassTeacherModel::select('assign_class_teacher.*', 'class.name as class_name', 'teacher.name as teacher_name', 'users.name as created_by_name')
        ->join('users as teacher', 'teacher.id', '=', 'assign_class_teacher.teacher_id')
        ->join('class', 'class.id', '=', 'assign_class_teacher.class_id')
        ->join('users', 'users.id', '=', 'assign_class_teacher.created_by');
        
        $return = $return->where('assign_class_teacher.is_delete', '= ', 0)
        ->orderBy('assign_class_teacher.id', 'desc')->paginate(20);

        return $return;
        
    }
}
