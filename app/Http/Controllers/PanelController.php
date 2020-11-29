<?php

namespace App\Http\Controllers;

use App\Models\titleinfo;
use Illuminate\Http\Request;

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

      $titleinfos = titleinfo::all();
    //   return view('panel.panelIndex', compact('titleinfos'));
      return view('panel.panelIndex', compact('titleinfos'));
    
    // dd($titleinfos);
    }

    public function alltitle()
    {
      //
      $titleinfos = titleinfo::all();
      return view('panel.test', compact('titleinfos'));
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

        // dd($request->status1);

        titleinfo::where('id', $titleinfo->id)
            ->update(['status'=> $request->status1]);

        return redirect('/panel');
    }

    public function rejectbtn(Request $request, titleinfo $titleinfo)
    {
        //

        // dd($request->titleid);

        titleinfo::where('id', $titleinfo->id)
            ->update(['status'=> $request->status2]);

        return redirect('/panel');
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
