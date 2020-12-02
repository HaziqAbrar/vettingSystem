<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\student;

use Illuminate\Support\Facades\DB;
use App\Models\titleinfo;
use App\Models\application;




class StudentController extends Controller
{
    public function index(){
        $email = (Auth::user()->getAttribute('email'));
        // dd ($role);
        $student= student::where('email',$email)->first();

        return view('/student/portfolio',compact('student'));
        
    }

    public function update(request $request){
        // dd($request->email);
        student::where('email', Auth::user()->getAttribute('email'))
        ->update([
            'name'=> $request->name,
            'department'=> $request->department,
            'year'=> $request->year,
            'cgpa'=> $request->cgpa,
            'skills'=> $request->skills,
           
        ]);
        return redirect ('/portfolio')->with ('status','Updated!');

    }
}
