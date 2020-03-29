<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Classname;
use App\Announcement;
use App\{ User, Student, Classroom, Course, Classstudent };
use Hash;
use Auth;

class AdminController extends Controller
{
    public function createClass(Request $request) {

        $newClassName = new Classroom;
        $newClassName->name = $request->name;
        $newClassName->section = $request->section;
        $newClassName->room_no = $request->room_no;
        $newClassName->status = 'active';
        if($newClassName->save()){
            return response()->json([
                'success'=>true,
                'message'=>'Created Successful',
                'data'=> []
            ], 200);
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'Something went wrong. Please try again',
                'data'=>[]
            ], 403);
        }
    }

    public function getAllClassName(Request $request) {

        $data = Classroom::orderBy('id', 'desc')->get();
        return response()->json([
            'success'=>true,
            'data'=> $data
        ], 200);
    }

    public function createCourse(Request $request) {
        $newClassName = new Course;
        $newClassName->name = $request->name;
        $newClassName->classroom_id = $request->classroom_id;
        $newClassName->teacher_id = $request->teacher_id;
        $newClassName->status = 'active';
        if($newClassName->save()){
            return response()->json([
                'success'=>true,
                'message'=>'Course created successful',
                'data'=> []
            ], 200);
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'Something went wrong. Please try again',
                'data'=>[]
            ], 403);
        }
    }

    public function getAllCourses(Request $request) {

        $data = Course::orderBy('id', 'desc')->with(['classroom','teacher'])->get();
        return response()->json([
            'success'=>true,
            'data'=> $data
        ], 200);
    }

    public function createStudent(Request $request) {
        $parent = new User;
        $parent->email = $request->email;
        $parent->role = 'parent';
        $parent->phone = $request->phone;
        $parent->father_name = $request->father_name;
        $parent->mother_name = $request->mother_name;
        $parent->last_login = date("F j, Y, g:i a");
        $parent->status = 'pending';
        $parent->password = Hash::make('123456');
        if($parent->save()) {
            $id = $parent->id;
            $newUser = new Student;
            $newUser->name = $request->name;
            $newUser->parent_id = $id;
            $newUser->dob = substr($request->dob, 0,9);
            $newUser->status = 'pending';
            $newUser->date_of_join = date("Y-M-D");
            if($newUser->save()){
                $class_student = new Classstudent;
                $class_student->classroom_id = $request->class_id;
                $class_student->student_id = $newUser->id;
                $class_student->save();
                return response()->json([
                    'success'=>true,
                    'message'=>'Created Successful',
                    'data'=> []
                ], 200);
            }
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'Something went wrong. Please try again',
                'data'=>[]
            ], 403);
        }
    }

    public function getAllStudents(Request $request) {

        $data = Student::orderBy('id', 'desc')->with(['parent'])->get();
        return response()->json([
            'success'=>true,
            'data'=> $data
        ], 200);
    }

    public function createTeacher(Request $request) {

        $newUser = new User;
        $newUser->email = $request->email;
        $newUser->name = $request->name;
        $newUser->role = 'teacher';
        $newUser->phone = $request->phone;
        $newUser->father_name = $request->father_name;
        $newUser->mother_name = $request->mother_name;
        $newUser->dob = $request->dob;
        $newUser->status = 'active';
        $newUser->status = 'pending';
        $newUser->last_login = date("Y-M-D");
        $newUser->password = Hash::make($request->phone);

        if($newUser->save()){
            return response()->json([
                'success'=>true,
                'message'=>'Created Successful',
                'data'=> []
            ], 200);
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'Something went wrong. Please try again',
                'data'=>[]
            ], 403);
        }
    }

    public function getAllTeachers(Request $request) {

        $data = User::where('role', 'teacher')->orderBy('id', 'desc')->get();
        return response()->json([
            'success'=>true,
            'data'=> $data
        ], 200);
    }

    public function createAccountant(Request $request) {

        $newUser = new User;
        $newUser->username = $request->username;
        $newUser->role_number = 0;
        $newUser->name = $request->name;
        $newUser->role = 'accountant';
        $newUser->phone = $request->phone;
        $newUser->father_name = $request->father_name;
        $newUser->mother_name = $request->mother_name;
        $newUser->sepcilization = $request->sepcilization;
        $newUser->address = $request->address;
        $newUser->status = 'pending';
        $newUser->qualification = $request->qualification;
        $newUser->fee_id = -1;
        $newUser->class_id = -1;
        $newUser->password = Hash::make($request->phone);

        if($newUser->save()){
            return response()->json([
                'success'=>true,
                'message'=>'Created Successful',
                'data'=> []
            ], 200);
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'Something went wrong. Please try again',
                'data'=>[]
            ], 403);
        }
    }

    public function getAllAccountants(Request $request) {

        $data = User::where('role', 'accountant')->orderBy('id', 'desc')->get();
        return response()->json([
            'success'=>true,
            'data'=> $data
        ], 200);
    }

    public function makeAnnouncement(Request $request) {

        $data = new Announcement;
        $data->from = Auth::user()->id;
        $data->to = ($request->to === 'all' ? -1 : $request->to );
        $data->subject = $request->subject;
        $data->body = $request->body;
        if($data->save()) {
            return response()->json([
                'success'=>true,
                'message'=>'Created',
                'data'=> $data
            ], 200);
        }
    }
    public function myAnnouncement(Request $request) {
        if(Auth::user()->role === 'admin'){
            $data = Announcement::where('from', Auth::user()->id)->orWhere('from', -1)->orderBy('id', 'desc')->get();
        }
        else {
            $data = Announcement::where('to', Auth::user()->id)->orWhere('to', -1)->orderBy('id', 'desc')->get();
        }
        return response()->json([
            'success'=>true,
            'data'=> $data
        ], 200);
    }
}
