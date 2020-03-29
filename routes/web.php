<?php

use Illuminate\Support\Facades\Route;

Route::post('/api/user-signup','PublicController@userSignup');
Route::post('/api/user-login','PublicController@userLogin');
Route::get('/api/get-token','Controller@getToken');
Route::get('/api/auth-logout','PublicController@userLogout');

Route::post('/api/create-class','AdminController@createClass');
Route::get('/api/all-classes','AdminController@getAllClassName');

Route::post('/api/create-student','AdminController@createStudent');
Route::get('/api/all-student','AdminController@getAllStudents');
Route::post('/api/create-teacher','AdminController@createTeacher');
Route::get('/api/all-teacher','AdminController@getAllTeachers');
Route::post('/api/create-accountant','AdminController@createAccountant');
Route::get('/api/all-accountant','AdminController@getAllAccountants');
Route::post('/api/create-course','AdminController@createCourse');
Route::get('/api/all-courses','AdminController@getAllCourses');

//Teacher
Route::get('/api/get-my-student','TeacherController@getMyStudent');
Route::get('/api/all-my-class','TeacherController@getMyClass');
Route::get('/api/user-profile','TeacherController@getProfile');
Route::get('/api/get-subject-class','TeacherController@getMyClassAndSubject');


//Announcement
Route::post('/api/make-announcement','AdminController@makeAnnouncement');
Route::get('/api/my-announcement','AdminController@myAnnouncement');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('user.index');
});
Route::get('/teacher', function () {
    return view('user.index');
});
Route::get('/accountant', function () {
    return view('user.index');
});
Route::get('/student', function () {
    return view('user.index');
});
