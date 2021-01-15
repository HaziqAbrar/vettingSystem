<?php

namespace App\Http\Controllers;

use App\Models\Panel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\titleinfo;
use App\Models\user;

class PanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //
      $emailpanel = Auth::user()->getAttribute('email');
      $panelform = Panel::all()->where('email',$emailpanel);
      $titleinfos = titleinfo::all();

      return view('panel.panelIndex', compact('panelform'), compact('titleinfos'));

      // dd($titleinfos);
    }

    public function alltitle()
    {
      //
      $postgraduate = (Auth::user()->getAttribute('level'));
      // $titleinfos = titleinfo::all();
      $titleinfos = titleinfo::all()->where('level',$postgraduate);
      return view('panel.alltitle', compact('titleinfos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\titleinfo  $titleinfo
     * @return \Illuminate\Http\Response
     */
    public function show(titleinfo $titleinfo)
    {
        //
        return view('panel.titledetail', compact('titleinfo'));
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
        // echo "string";
        // dd($request->status1);
        //
        titleinfo::where('id', $titleinfo->id)
            ->update(['status'=> $request->status1]);

        return redirect('/panel')->with('status',"Title is Accepted!");
    }

    public function rejectbtn(Request $request, titleinfo $titleinfo)
    {
        //
        //
        // dd($request->status2);

        titleinfo::where('id', $titleinfo->id)
            ->update(['status'=> $request->status2]);

        return redirect('/panel')->with('status',"Title is Accepted!");
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
