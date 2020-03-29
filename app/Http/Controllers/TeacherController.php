<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\{ User, Student, Classroom, Course, Classstudent };
use Auth;

class TeacherController extends Controller
{
    public function getMyStudent(Request $request) {
        if($request->all() === []) {
            $course = Course::select('classroom_id')->where('teacher_id', Auth::user()->id)->get();
            $classrooms = [];
            foreach($course as $key) {
                array_push($classrooms,$key->classroom_id);
            }
        } else {
            $classrooms = [$request->class_id];
        }
        $student = Classstudent::select('student_id')->whereIn('classroom_id', $classrooms)->get();
        $all_student = [];
        foreach($student as $key) {
            array_push($all_student,$key->student_id);
        }
        $students = Student::whereIn('id', $all_student)->with(['parent'])->orderBy('name')->get();
        return response()->json([
            'success'=>true,
            'data'=> $students
        ], 200);
    }
    
    public function getMyClass(Request $request) {

        $course = Course::select('classroom_id')->where('teacher_id', Auth::user()->id)->get();
        $classrooms = [];
        foreach($course as $key) {
            array_push($classrooms,$key->classroom_id);
        }
        $classList = Classroom::select('id','name', 'section')->whereIn('id', $classrooms)->get();
        return response()->json([
            'success'=>true,
            'data'=> $course
        ], 200);
    }

    public function getMyClassAndSubject(Request $request) {

        $course = Course::where('teacher_id', Auth::user()->id)->with(['classroom'])->get();
        return response()->json([
            'success'=>true,
            'data'=> $course
        ], 200);
    }

    public function getProfile(Request $request) {

        $data = Student::where('id', $request->id)->with(['parent'])->first();
        $class = Classstudent::select('classroom_id')->where('student_id', $data->id)->first();
        $all_subject = Course::select('id', 'name', 'teacher_id')->where('classroom_id', $class->classroom_id)->get();
        $class_details = Classroom::where('id', $class->classroom_id)->first();
        $data['class'] = $class_details;
        $data['subject'] = $all_subject;
        return response()->json([
            'success'=>true,
            'data'=> $data
        ], 200);
    }
}
