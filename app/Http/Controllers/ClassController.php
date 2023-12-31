<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ClassController extends Controller
{
   public function list(){

        $data['header_title'] = 'Class List';
        $data['getRecord'] = ClassModel::getRecord();

        return view('admin.class.list',$data);

   } 

   public function add(){

        $data['header_title'] = 'Add Class';

        return view('admin.class.add',$data);

   }

   public function insert(Request $request){

     request()->validate([
          'name' => 'required|unique:class'
      ]);


        $class = new ClassModel();
        $class->name = $request->name;
        $class->status = $request->status;
        $class->created_by = Auth::user()->id;
        $class->save();

        return redirect('admin/class/list')->with('success', 'Class Successfully Created');

   }

   public function edit($id){

     $data['getRecord'] = ClassModel::getSingle($id);

     if (!empty($data['getRecord'])) {
          $data['header_title'] = 'Edit Class';
     
          return view('admin.class.edit',$data);
     } else {
          
          abort(404);
     }
     

   }

   public function update($id, Request $request ){

     $save=  ClassModel::getSingle($id);
     $save->name = $request->name;
     $save->status = $request->status;

     $save->save();

     return redirect('admin/class/list')->with('success', 'Class Successfully Created');

   }

   public function delete($id){

     $save = ClassModel::getSingle($id);
     $save->is_delete = 1;
     $save->save();

     return redirect('admin/class/list')->with('success', 'Class Successfully Deleted');
   }
}
