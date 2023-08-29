<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function change_password(){

        $data['header_title'] = 'Change Password';

        return view('profile.change_password', $data);
    }

    public function update_change_password(Request $request){
       
        

    }
}
