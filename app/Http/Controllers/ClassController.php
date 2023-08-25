<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
   public function list(){

        $data['header_title'] = 'Class List';

        return view('admin.class.list',$data);

   } 

   public function add(){

        $data['header_title'] = 'Add Class';
        $data['getRecord'] = ClassModel::getRecord();

        return view('admin.class.add',$data);

   }

   public function insert(Request $request){

        $class = new ClassModel();
        $class->name = $request->name;
        $class->status = $request->status;
        $class->created_by = Auth::user()->id;
        $class->save();

        return redirect('admin/class/list')->with('success', 'Class Successfully Created');

   }
}
