<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class SubjectModel extends Model
{
    use HasFactory;
    protected $table = 'subject';

    static public function getRecord(){

        $return = SubjectModel::select('subject.*', 'users.name as created_by_name')
                    ->join('users', 'users.id', 'subject.created_by');

                    if(!empty(Request::get('name'))){
                        $return =   $return->where('subject.name', 'like','%'.Request::get('name').'%');
                    }

                    if(!empty(Request::get('date'))){
                        $return =   $return->whereDate('subject.created_at', '=', Request::get('date'));
                    }

                    $return = $return->where('subject.is_delete', '= ', 0)
                    ->orderBy('subject.id', 'desc')
                    ->paginate(20);

        return $return;
    }

    static public function getSingle($id){
        return SubjectModel::find($id);
    }


}
