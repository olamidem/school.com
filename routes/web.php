<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\AssignClassTeacherController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'AuthLogin']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('forgot-password', [AuthController::class, 'forgotpassword']);
Route::post('forgot-password', [AuthController::class, 'PostForgotPassword']);
Route::get('reset/{token}', [AuthController::class, 'reset']);
Route::post('reset/{token}', [AuthController::class, 'PostReset']);

Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function(){

    //Admin
    Route::get('/dashboard',[ DashboardController::class, 'dashboard']);
    Route::get('/admin/list', [AdminController::class, 'list']);
    Route::get('/admin/add', [AdminController::class, 'add']);
    Route::post('/admin/add', [AdminController::class, 'insert']);
    Route::get('/admin/edit/{id}', [AdminController::class, 'edit']);
    Route::post('/admin/edit/{id}', [AdminController::class, 'update']);
    Route::get('/admin/delete/{id}', [AdminController::class, 'delete']);

    //my account
    Route::get('/account', [UserController::class, 'myAccount']);
    Route::post('/account', [UserController::class, 'myAdminAccount']);

    //Teacher
    Route::get('/teacher/list', [TeacherController::class, 'list']);
    Route::get('/teacher/add', [TeacherController::class, 'add']);
    Route::post('/teacher/add', [TeacherController::class, 'insert']);
    Route::get('/teacher/edit/{id}', [TeacherController::class, 'edit']);
    Route::post('/teacher/edit/{id}', [TeacherController::class, 'update']);
    Route::get('/teacher/delete/{id}', [TeacherController::class, 'delete']);


    //student

    Route::get('/student/list', [StudentController::class, 'list']);
    Route::get('/student/add', [StudentController::class, 'add']);
    Route::post('/student/add', [StudentController::class, 'insert']);
    Route::get('/student/edit/{id}', [StudentController::class, 'edit']);
    Route::post('/student/edit/{id}', [StudentController::class, 'update']);
    Route::get('/student/delete/{id}', [StudentController::class, 'delete']);


    //Parent

    Route::get('/parent/list', [ParentController::class, 'list']);
    Route::get('/parent/add', [ParentController::class, 'add']);
    Route::post('/parent/add', [ParentController::class, 'insert']);
    Route::get('/parent/edit/{id}', [ParentController::class, 'edit']);
    Route::post('/parent/edit/{id}', [ParentController::class, 'update']);
    Route::get('/parent/delete/{id}', [ParentController::class, 'delete']);
    Route::get('/parent/my_student/{id}', [ParentController::class, 'myStudent']);
    Route::get('/parent/assign_student_to_parent/{student_id}/{parent_id}', [ParentController::class, 'AssignStudentToParent']);
    Route::get('/parent/assign_student_to_parent_delete/{student_id}', [ParentController::class, 'AssignStudentToParentDelete']);

    //class url
    Route::get('/class/list', [ClassController::class, 'list']);
    Route::get('/class/add', [ClassController::class, 'add']);
    Route::post('/class/add', [ClassController::class, 'insert']);
    Route::get('/class/edit/{id}', [ClassController::class, 'edit']);
    Route::post('/class/edit/{id}', [ClassController::class, 'update']);
    Route::get('/class/delete/{id}', [ClassController::class, 'delete']);

    //subject url

    Route::get('/subject/list', [SubjectController::class, 'list']);
    Route::get('/subject/add', [SubjectController::class, 'add']);
    Route::post('/subject/add', [SubjectController::class, 'insert']);
    Route::get('/subject/edit/{id}', [SubjectController::class, 'edit']);
    Route::post('/subject/edit/{id}', [SubjectController::class, 'update']);
    Route::get('/subject/delete/{id}', [SubjectController::class, 'delete']);

    //Assign Subject

    Route::get('/assign_subject/list', [ClassSubjectController::class, 'list']);
    Route::get('/assign_subject/add', [ClassSubjectController::class, 'add']);
    Route::post('/assign_subject/add', [ClassSubjectController::class, 'insert']);
    Route::get('/assign_subject/edit/{id}', [ClassSubjectController::class, 'edit']);
    Route::post('/assign_subject/edit/{id}', [ClassSubjectController::class, 'update']);
    Route::get('/assign_subject/delete/{id}', [ClassSubjectController::class, 'delete']);
    Route::get('/assign_subject/edit_single/{id}', [ClassSubjectController::class, 'edit_single']);
    Route::post('/assign_subject/edit_single/{id}', [ClassSubjectController::class, 'update_single']);

    Route::get('/change_password', [UserController::class, 'change_password']);
    Route::post('/change_password', [UserController::class, 'update_change_password']);

    Route::get('/assign_class_toteacher/list', [AssignClassTeacherController::class, 'list']);
    Route::get('/assign_class_toteacher/add', [AssignClassTeacherController::class, 'add']);
    Route::post('/assign_class_toteacher/add', [AssignClassTeacherController::class, 'insert']);
});

Route::group(['middleware' => 'teacher'], function(){

    Route::get('teacher/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('teacher/change_password', [UserController::class, 'change_password']);
    Route::post('teacher/change_password', [UserController::class, 'update_change_password']);

     //My Account
    Route::get('teacher/account', [UserController::class, 'myAccount']);
    Route::post('teacher/account', [UserController::class, 'updateMyAccount']);
     
});

Route::group(['middleware' => 'student','prefix' => 'student'], function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboard']);

      //My Account
    Route::get('/account', [UserController::class, 'myAccount']);
    Route::post('/account', [UserController::class, 'updateMyStudentAccount']);

    Route::get('/change_password', [UserController::class, 'change_password']);
    Route::post('/change_password', [UserController::class, 'update_change_password']);

    //my subject
    Route::get('/my_subject', [SubjectController::class, 'mySubject']);

});

Route::group(['middleware' => 'parent', 'prefix' => 'parent'],  function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboard']);

          //My Account
    Route::get('/account', [UserController::class, 'myAccount']);
    Route::post('/account', [UserController::class, 'updateParentAccount']);

    //my Student 
    Route::get('/my_student', [ParentController::class, 'myStudentParent']);
    //my student subjects
    Route::get('/my_student/subject/{student_id}', [SubjectController::class, 'ParentStudentSubject']);


    Route::get('/change_password', [UserController::class, 'change_password']);
    Route::post('/change_password', [UserController::class, 'update_change_password']);

});




