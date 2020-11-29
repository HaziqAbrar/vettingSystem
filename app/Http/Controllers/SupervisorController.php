<?php

namespace App\Http\Controllers;

use App\Models\titleinfo;
use Illuminate\Http\Request;

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
}
