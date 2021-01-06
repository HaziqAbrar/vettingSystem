<?php

namespace App\Http\Controllers;

use App\Models\titleinfo;
use App\Models\application;
use App\Models\notification;
use App\Models\user;
use App\Models\student;
use App\Models\first;
use App\Models\second;
use App\Models\third;
use App\Mail\notify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


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
         $email = (Auth::user()->getAttribute('email'));
         $titleinfos = titleinfo::all();
         $mytitle = titleinfo::all()->where('email',$email);
         // dd($email);
         return view('supervisor.supervisorIndex', compact('mytitle'));
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
        //  dd($title);
        //  $apps1= application::all()->where('first choice',$title->id)->where('status1','pending');
        //  $apps2= application::all()->where('second choice',$title->id)->where('status2','pending');
        //  $apps3= application::all()->where('third choice',$title->id)->where('status3','pending');
         $apps1= first::all()->where('title',$title->id)->where('status','pending');
         $apps2= second::all()->where('title',$title->id)->where('status','pending');
         $apps3= third::all()->where('title',$title->id)->where('status','pending');
        //  $apps = $apps1->merge($apps2)->merge($apps3);
        //  $apps=$test->where('status','pending');
        //  dd($test);
        $student=student::all();

        // return view ('supervisor/teamManagement/application',compact('apps','title'));
        return view ('supervisor/teamManagement/application',compact('apps1','apps2','apps3','title','student'));
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

         $email = Auth::user()->email;
         $currentuser = user::all()->where('email',$email);

         // dd($currentuser);
         return view('supervisor.proposetitle', compact('currentuser'));
     }


     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
      public function store(Request $request)
      {
        //
        // dd($request);
        $user = (Auth::user()->all());
        // dd($user);

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
          'tools' => $request->tools,
          'major' => Auth::user()->getAttribute('department'),

        ]);
        return redirect()->route('supervisor', compact('user'))->with('status','Title Proposed!');
      }


     public function notify(Request $request)
     {

        $email = (Auth::user()->getAttribute('email'));
         $request->validate([
             'platform' => 'required',
             'notice' => 'required',

         ]);
         $receivers=application::where('first choice',$request->title)->get('email');
         $data = [];
        //  foreach($receivers as $receivers){
        //      $data []= [
        //          'email'=>$receivers->email
        //      ];
        //  }
        //  dd($data);
        foreach($receivers as $data){
        //    dd($data->email);
         notification::create([
             'platform' => $request->platform,
             'notice' => $request->notice,
             'sender' => $email,
             'receivers' => $data->email,
             'title'=> $request->title

         ]);
        }
        $notification = notification::all()->where('title',$request->title);
        // dd($notification);
        foreach ($notification as $noti){
        $email=$noti->receivers;
        Mail::to($email)->send(new notify($noti));
    }

        return "done";
     }


     public function test (){
        $titleinfos = titleinfo::all();
        return view('/supervisor/teamManagement/application', compact('titleinfos'));
     }
     public function meet (titleinfo $title){
        // $titleinfos = titleinfo::all();
        // dd($title);

        return view('/supervisor/teamManagement/meet', compact('title'));
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

     public function reject1(first $app)
     {

         first::where('title',$app->title)->where('email',$app->email)
         ->update([
             'status'=> 'rejected',
         ]);

         return response()->json(['status'=>'Student Rejected!']);


     }
     public function reject2(second $app)
     {

         second::where('title',$app->title)->where('email',$app->email)
         ->update([
             'status'=> 'rejected',
         ]);

         return response()->json(['status'=>'Student Rejected!']);


     }
     public function reject3(third $app)
     {

         third::where('title',$app->title)->where('email',$app->email)
         ->update([
             'status'=> 'rejected',
         ]);

         return response()->json(['status'=>'Student Rejected!']);


     }
}
