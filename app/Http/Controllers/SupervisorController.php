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
use App\Models\meet;
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
        $mytitle = titleinfo::all()->where('email', $email);
        // dd($email);
        return view('supervisor.supervisorIndex', compact('mytitle'));
    }

    public function teams()
    {
        //
        $email = (Auth::user()->getAttribute('email'));
        $titleinfos = titleinfo::all();
        $teams = application::all();
        $myteam = titleinfo::all()->where('email', $email);
        // dd($myteam);
        return view('supervisor/teamManagement/teams', compact('myteam'), compact('titleinfos'));
    }
    public function teamshow()
    {
        //
        $email = (Auth::user()->getAttribute('email'));
        $titleinfos = titleinfo::all()->where('email', $email);
        $team1 = first::all()->where('lecturer', $email)->where('status', 'accepted');
        $team2 = second::all()->where('lecturer', $email)->where('status', 'accepted');
        $team3 = third::all()->where('lecturer', $email)->where('status', 'accepted');
        $teams = $team1->merge($team2)->merge($team3);
        $students = student::all();
        // dd($team1);
        return view('/supervisor/teamManagement/teamview', compact('teams', 'titleinfos', 'students'));
    }

    public function application(titleinfo $title)
    {

        $apps1 = first::all()->where('title', $title->id)->where('status', 'pending');
        $apps2 = second::all()->where('title', $title->id)->where('status', 'pending');
        $apps3 = third::all()->where('title', $title->id)->where('status', 'pending');

        $student = student::all();


        return view('supervisor/teamManagement/application', compact('apps1', 'apps2', 'apps3', 'title', 'student'));
    }
    public function applicationindex(application $student)
    {

        $email = $student->email;
        $first = application::where('email', $email)->first();
        // dd($first['first choice']);
        $student = student::where('email', $email)->first();

        // dd($student->avatar);
        return view('supervisor/teamManagement/student', compact('student', 'first'));
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
        $currentuser = user::all()->where('email', $email);

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
        return redirect()->route('supervisor', compact('user'))->with('status', 'Title Proposed!');
    }


    public function notify(Request $request)
    {

        $email = (Auth::user()->getAttribute('email'));
        $request->validate([
            'platform' => 'required',
            'notice' => 'required',

        ]);

        $receivers = application::where('first choice', $request->title)->get('email');
        $receiver2 = application::where('second choice', $request->title)->get('email');
        $receiver3 = application::where('third choice', $request->title)->get('email');

        //  $data = [];

        foreach ($receivers as $data) {
            $noti = notification::where('receivers', $data->email)->where('title_code', $request->title)->first();
            if ($noti == null) {
                notification::create([
                    'platform' => $request->platform,
                    'notice' => $request->notice,
                    'sender' => $email,
                    'receivers' => $data->email,
                    'title_code' => $request->title,
                    'status' => 'not read',

                ]);
            }
        }
        foreach ($receiver2 as $data) {
            $noti = notification::where('receivers', $data->email)->where('title_code', $request->title)->first();
            if ($noti == null) {
                notification::create([
                    'platform' => $request->platform,
                    'notice' => $request->notice,
                    'sender' => $email,
                    'receivers' => $data->email,
                    'title_code' => $request->title,
                    'status' => 'not read',

                ]);
            }
        }
        foreach ($receiver3 as $data) {
            $noti = notification::where('receivers', $data->email)->where('title_code', $request->title)->first();
            if ($noti == null) {
                notification::create([
                    'platform' => $request->platform,
                    'notice' => $request->notice,
                    'sender' => $email,
                    'receivers' => $data->email,
                    'title_code' => $request->title,
                    'status' => 'not read',

                ]);
            }
        }
        $notification = notification::all()->where('title_code', $request->title)->where('status', 'not read');
        foreach ($notification as $noti) {
            $emai = $noti->receivers;

            Mail::to($emai)->send(new notify($noti));
        }
        return redirect('/supervisor/teams/' . $request->title)->with('status', 'Students Notified');
    }




    public function viewmeet()
    {
        $titles = titleinfo::all();
        $meets = meet::all()->where('status', 'pending');
        $settle = meet::all()->where('status', 'accept');
        $notis = notification::all();
        $students = student::all();
        return view('/supervisor/teamManagement/meeting', compact('meets', 'titles', 'students', 'settle', 'notis'));
    }
    public function test()
    {
        $titleinfos = titleinfo::all();
        return view('/supervisor/teamManagement/application', compact('titleinfos'));
    }
    public function meet(titleinfo $title)
    {

        return view('/supervisor/teamManagement/meet', compact('title'));
    }
    public function meetupdate(request $request)
    {

        // dd($request);
        if ($request->button1) {
            meet::where('id', $request->id)
                ->update([
                    // 'comment'=> $request->comment,
                    'status' => $request->button1,
                ]);
            notification::where('id', $request->notiid)
                ->update([
                    // 'comment'=> $request->comment,
                    'notice' => $request->notice,
                ]);
        }
        if ($request->button2) {
            meet::where('id', $request->id)
                ->update([
                    // 'comment'=> $request->comment,
                    'status' => $request->button2,
                ]);
            notification::where('id', $request->notiid)
                ->update([
                    // 'comment'=> $request->comment,
                    'notice' => $request->notice,
                    'status' => 'not read',
                ]);
        }

        return redirect('/supervisor/meeting');
    }
    public function meetdone(request $request)
    {
        meet::where('id', $request->id)
            ->update([
                // 'comment'=> $request->comment,
                'status' => $request->status,
            ]);
        return redirect('/supervisor/meeting');
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
                'name' => $request->name,
                'title' => $request->title,
                'email' => $request->email,
                'description' => $request->description
            ]);

        return redirect('/supervisor')->with('status', 'Title Edited!');
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
        return response()->json(['status' => 'Title Deleted!']);
    }

    public function accept1(first $app)
    {

        first::where('title', $app->title)->where('email', $app->email)
            ->update([
                'status' => 'accepted',
            ]);
        second::where('email', $app->email)
            ->update([
                'status' => 'rejected',
            ]);
        third::where('email', $app->email)
            ->update([
                'status' => 'rejected',
            ]);

        return response()->json(['status' => 'Student Accepted!']);
    }
    public function accept2(second $app)
    {

        second::where('title', $app->title)->where('email', $app->email)
            ->update([
                'status' => 'accepted',
            ]);
        first::where('email', $app->email)
            ->update([
                'status' => 'rejected',
            ]);
        third::where('email', $app->email)
            ->update([
                'status' => 'rejected',
            ]);

        return response()->json(['status' => 'Student Accepted!']);
    }
    public function accept3(third $app)
    {

        third::where('title', $app->title)->where('email', $app->email)
            ->update([
                'status' => 'accepted',
            ]);
        second::where('email', $app->email)
            ->update([
                'status' => 'rejected',
            ]);
        first::where('email', $app->email)
            ->update([
                'status' => 'rejected',
            ]);
        return response()->json(['status' => 'Student Accepted!']);
    }
    public function reject1(first $app)
    {

        first::where('title', $app->title)->where('email', $app->email)
            ->update([
                'status' => 'rejected',
            ]);

        return response()->json(['status' => 'Student Rejected!']);
    }
    public function reject2(second $app)
    {

        second::where('title', $app->title)->where('email', $app->email)
            ->update([
                'status' => 'rejected',
            ]);

        return response()->json(['status' => 'Student Rejected!']);
    }
    public function reject3(third $app)
    {

        third::where('title', $app->title)->where('email', $app->email)
            ->update([
                'status' => 'rejected',
            ]);

        return response()->json(['status' => 'Student Rejected!']);
    }
}
