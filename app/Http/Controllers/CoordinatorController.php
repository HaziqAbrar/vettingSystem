<?php

namespace App\Http\Controllers;

use App\Models\titleinfo;
use App\Models\user;
use App\Models\Panel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\student;

use App\Models\application;

class CoordinatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $titleinfos = titleinfo::all();
      // $user = user::all();

      $department = (Auth::user()->getAttribute('department'));
      // $titleinfos = titleinfo::all();
      $assignto = titleinfo::all()->where('major',$department);

      return view('coordinator.coordinatorIndex', compact('assignto'));
    }

    public function alltitle()
    {
      //
      $titleinfos = titleinfo::all();
      return view('coordinator.alltitle', compact('titleinfos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(titleinfo $titleinfo)
    {
        //
        // $panel = Panel::all();
        // $sama = "panel";
        $panel = user::all()->where('role','panel');
        // dd($panel);

        return view('coordinator.info', compact('titleinfo'), compact('panel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, titleinfo $titleinfo)
    {
        //
        // dd($request);

        $panel = user::all()->where('role','panel');

        $manok = $request->titid;

        Panel::create([
          'email' => $request->panol,
          'titleid' => $request->titid,

        ]);
        return redirect()->back()->with('message',"Title Assigned to the panel. Choose more panel to assign or go back to Home to view title.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\titleinfo  $titleinfo
     * @return \Illuminate\Http\Response
     */
    public function show(titleinfo $titleinfo)
    {
      // dd($titleinfo);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\titleinfo  $titleinfo
     * @return \Illuminate\Http\Response
     */
    public function edit(titleinfo $titleinfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\titleinfo  $titleinfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, titleinfo $titleinfo)
    {
        //
        $request->validate(['comment' => 'required']);

      titleinfo::where('id', $titleinfo->id)
          ->update(['comment'=> $request->comment]);

      return redirect('/titleinfos/'.$titleinfo->id)->with('status','comment updated');
    }

    public function acceptbtn(Request $request, titleinfo $titleinfo)
    {
        //

        // dd($request->status1);

        titleinfo::where('id', $titleinfo->id)
            ->update(['status'=> $request->status1]);

        return redirect('/coordinator');
    }

    public function rejectbtn(Request $request, titleinfo $titleinfo)
    {
        //

        // dd($request->titleid);

        titleinfo::where('id', $titleinfo->id)
            ->update(['status'=> $request->status2]);

        return redirect('/coordinator');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\titleinfo  $titleinfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(titleinfo $titleinfo)
    {
        //
    }
}
