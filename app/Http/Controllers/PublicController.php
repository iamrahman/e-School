<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\{Teacher, Student, Parentname, User};

class PublicController extends Controller
{

    public function userSignup(Request $request) {

        $checkUser = User::where('email', $request->email)->count();
        
        if(true){
            $newUser = new User;
            $newUser->email = $request->email;
            $newUser->name = $request->name;
            $newUser->phone = $request->phone;
            $newUser->status = $request->status;
            $newUser->father_name = $request->father_name;
            $newUser->mother_name = $request->mother_name;
            $newUser->last_login = $request->last_login;
            $newUser->dob = $request->dob;
            $newUser->password = Hash::make($request->password);

            if($newUser->save()){
                return response()->json([
                    'success'=>true,
                    'message'=>'Registration Successful',
                    'data'=> []
                ], 200);
            }else{
                return response()->json([
                    'success'=>false,
                    'message'=>'Something went wrong. Please try again',
                    'data'=>[]
                ], 403);
            }
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'User Already Exist',
                'data'=>[]
            ], 403);
        }
    }

    public function userLogin(Request $request){
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password]))
        {
            $currentUser = User::select('role')->where('id', Auth::user()->id)->first();
            if(Auth::user()->status == 'inactive'){
                Auth::logout();
                return response()->json([
                    'success'=>false,
                    'message'=>'Your Account has been deactivated by Admin. Please contact him for more details',
                    'data'=>[]
                ], 403);
            }else{
                return response()->json([
                    'success'=>true,
                    'data'=>$currentUser
                ], 200);
            }
        }
        else{
            return response()->json([
                'success'=>false,
                'message'=>'Username or password is wrong',
                'data'=>[]
            ], 404);
        }
    }

    public function userLogout(){
        Auth::logout();
        return response()->json([
            'success'=>true,
            'data'=>null
        ], 200);
    }
}
