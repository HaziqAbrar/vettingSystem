<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\student;

use Illuminate\Support\Facades\DB;
use App\Models\titleinfo;
use App\Models\application;
use App\Models\notification;
use App\Models\meet;




class StudentController extends Controller
{
    public function index()
    {
        $email = (Auth::user()->getAttribute('email'));
        // dd ($role);
        $student = student::where('email', $email)->first();

        return view('/student/test', compact('student'));
    }
    public function propose(notification $noti)
    {

        $email = (Auth::user()->getAttribute('email'));
        // dd ($noti);
        // $student= student::where('email',$email)->first();

        $users = user::all();
        $check = notification::where('receivers', $email)->where('id', $noti->id)->first();
        if ($check) {
            return redirect("/dashboard");
        }

        return view('/student/propose', compact('noti', 'users', 'email'));
    }
    public function sendpropose(request $request)
    {

        // supervisor','student','title_code','platform','notice','link','time'
        // dd ($request);

        $meet = meet::where('student', $request->student)->where('title_code', $request->title_code)->first();
        if ($meet) {
            notification::where('title_code', $request->title_code)->where('receivers', $request->student)
                ->update([

                    'status' => 'read',
                ]);
            meet::where('title_code', $request->title_code)->where('student', $request->student)
                ->update([

                    'status' => 'pending',
                ]);
            return redirect("/dashboard");
        }
        meet::create([
            'supervisor' => $request->sv,
            'student' => $request->student,
            'title_code' => $request->title_code,
            'platform' => $request->platform,
            'status' => 'pending',
            'link' => $request->link,
            'time' => $request->time,

        ]);
        notification::where('title_code', $request->title_code)->where('receivers', $request->student)
            ->update([

                'status' => 'read',
            ]);
        return redirect("/dashboard");

        // return view('/student/propose',compact('noti'));

    }

    public function update(request $request)
    {
        // dd($request->email);
        // dd($request);
        student::where('email', Auth::user()->getAttribute('email'))
            ->update([
                'name' => $request->name,
                'matrix' => $request->matrix,
                'year' => $request->year,
                'cgpa' => $request->cgpa,
                'level' => $request->level,
                'skills' => $request->skills,
                'about' => $request->about,

            ]);
        // dd($request);

        return redirect('/portfolio')->with('status', 'Updated!');
    }
}
