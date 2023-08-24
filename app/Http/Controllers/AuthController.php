<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login()
    {
        if(!empty(Auth::check()))
        {
            if (Auth::user()->user_type == 1) {

                return redirect('admin/dashboard');

           } else if(Auth::user()->user_type == 2) {

                return redirect('teacher/dashboard');

           } else if(Auth::user()->user_type == 3) {

                return redirect('student/dashboard');

           } else if(Auth::user()->user_type == 4) {
            
                return redirect('parent/dashboard');

           }
        }
        return view('auth.login');
    }

    public function AuthLogin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false ;
        
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember))
        {
           if (Auth::user()->user_type == 1) {

                return redirect('admin/dashboard');

           } else if(Auth::user()->user_type == 2) {

                return redirect('teacher/dashboard');

           } else if(Auth::user()->user_type == 3) {

            return redirect('student/dashboard');

           } else if(Auth::user()->user_type == 4) {
            
            return redirect('parent/dashboard');

           }
           
        }
        else
        {
            return redirect()->back()->with('error', 'Please enter correct email and password');
        }

    }

    public function forgotpassword(){

     return view('auth.forgot');

    }

    public function PostForgotPassword(Request $request){

          $user = User::getSingleMail($request->email);
          if (!empty($user)) {
               
               $user->remember_token = Str::random(30);
               $user->save();
               Mail::to($user->email)->send(new ForgotPasswordMail($user));

               return redirect()->back()->with('success', 'Please check your email and reset your password');

          } else {
               
               return redirect()->back()->with('error', 'Email not found!.');
          }
          


    }

    public function reset($remember_token)
    {
          $user = User::getSingleToken($remember_token);
          if (!empty($user_token)) {

               $data['user'] = $user;

               return view('auth.reset', $data);
          } else {
               
               abort(404);
          }
          
    }

    public function PostReset($token, Request $request){

         if ($request->password == $request->cpassword) {
          
          $user = User::getSingleToken($token);
          $user->password = Hash::make($request->password);
          $user->token = Str::random(30);
          $user->save();
          
          return redirect(url(''))->back()->with('success',  "Password successfully reset");

         } else {
          
          return redirect()->back()->with('error', 'Password and Confirm password does not match.');

         }
          

    }

    public function logout()
    {
            Auth::logout();
            return redirect(url(''));
    }
}
