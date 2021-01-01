<?php

namespace App\Http\Controllers;

use App\Models\titleinfo;
use App\Models\application;
use App\Models\user;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class SupervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         //
         $titleinfos = titleinfo::all();
         return view('supervisor.supervisorIndex', compact('titleinfos'));
     }

     public function teams()
     {
         //
         $email = (Auth::user()->getAttribute('email'));
         $titleinfos = titleinfo::all();
         $teams = application::all();
         $myteam = titleinfo::all()->where('email',$email);
        // dd($myteam);
         return view('supervisor/teamManagement/teams', compact('myteam'),compact('titleinfos'));
     }

     public function application(titleinfo $title) 
     {
         $apps= application::all()->where('first choice',$title->id);
        $student=student::all();
       
        // return view ('supervisor/teamManagement/application',compact('apps','title'));
        return view ('supervisor/teamManagement/test',compact('apps','title','student'));
     }
     public function applicationindex(application $student) 
     {
         
        $email = $student->email;
        $first= application::where('email',$email)->first();
        // dd($first['first choice']);
        $student= student::where('email',$email)->first();
      
        // dd($student->avatar);
        return view ('supervisor/teamManagement/student',compact('student','first'));
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         //
         return view('supervisor.proposetitle');
     }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function notify(Request $request)
     {
         //
         // dd($request->level);
         $request->validate([
             'platform' => 'required',
            //  'email' => 'email:rfc,dns',
             'notice' => 'required',
            //  'level' => 'required',
            //  'session' => 'required',
            //  'description' => 'required'
         ]);


         titleinfo::create([
             'name' => $request->name,
             'email' => $request->email,
             'title' => $request->title,
             'level' => $request->level,
             'session' => $request->session,
             'description' => $request->description,

         ]);

         return redirect('/supervisor')->with('status','Title Proposed!');
     }
     public function store(Request $request)
     {
         //
         // dd($request->level);
         $request->validate([
             'name' => 'required',
             'email' => 'email:rfc,dns',
             'title' => 'required',
             'level' => 'required',
             'session' => 'required',
             'description' => 'required'
         ]);


         titleinfo::create([
             'name' => $request->name,
             'email' => $request->email,
             'title' => $request->title,
             'level' => $request->level,
             'session' => $request->session,
             'description' => $request->description,

         ]);

         return redirect('/supervisor')->with('status','Title Proposed!');
     }
     public function test (){
        $titleinfos = titleinfo::all();
        return view('/supervisor/teamManagement/test', compact('titleinfos'));
     }
     public function meet (){
        $titleinfos = titleinfo::all();
        return view('/supervisor/teamManagement/meet', compact('titleinfos'));
     }

     /**
      * Display the specified resource.
      *
      * @param  \App\titleinfo  $titleinfo
      * @return \Illuminate\Http\Response
      */
     public function show(titleinfo $titleinfo)
     {
         //
         return view('supervisor.titlesv', compact('titleinfo'));
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\titleinfo  $titleinfo
      * @return \Illuminate\Http\Response
      */
     public function edit(titleinfo $titleinfo)
     {
         //
         return view('supervisor.edit', compact('titleinfo'));
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\titleinfo  $titleinfo
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, titleinfo $titleinfo)
     {
         //
         // dd($request->name);

         titleinfo::where('id', $titleinfo->id)
                     ->update([
                         'name'=> $request->name,
                         'title'=> $request->title,
                         'email'=> $request->email,
                         'description'=> $request->description
                     ]);

         return redirect('/supervisor')->with('status','Title Edited!');
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\titleinfo  $titleinfo
      * @return \Illuminate\Http\Response
      */
     public function destroy(titleinfo $titleinfo)
     {
         //
         
         titleinfo::destroy($titleinfo->id);
         // return redirect('/supervisor')->with('status','Title Deleted!');
         return response()->json(['status'=>'Title Deleted!']);
     }

     public function reject(application $app)
     {
         //
         
         application::destroy($app->id);
         // return redirect('/supervisor')->with('status','Title Deleted!');
         return response()->json(['status'=>'Student Rejected!']);
     }
}
