<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

use Illuminate\Support\Facades\DB;
use App\Models\titleinfo;
use App\Models\application;
use App\Models\first;
use App\Models\second;
use App\Models\third;




class TitlesController extends Controller
{
    public function index(){
        $email = (Auth::user()->getAttribute('email'));
        // dd ($role);
        $test= DB::table('applications')->where('email',$email)->value('email');
        
        if($test==null){
            $data=false; }
            else {
                $data=true;
            }
            // dd($data);
         $titleinfos = titleinfo::all();
        // dd($titleinfos);
            return view ('student/title',compact('titleinfos','email','data'));
    }

    public function show(titleinfo $title)
    {
        
        return view ('student/titleindex',compact('title'));
    }

    public function store(Request $request)
    {
       $email= auth()->user()->getAttribute('email');
       $test= DB::table('applications')->where('email',$email)->value('email');
       $lecturer1 = titleinfo::where('id',$request->first_choice)->value('email');
       $lecturer2 = titleinfo::where('id',$request->second_choice)->value('email');
       $lecturer3 = titleinfo::where('id',$request->third_choice)->value('email');
    //    dd($test);
        if ($email==$test){
            return redirect('/title')->with('status','You have submitted already');
        }
        $request->validate([
            'first_choice'=>'required|numeric|different:second_choice,third_choice',
            'second_choice'=>'required|numeric|different:third_choice,first_choice',
            'third_choice'=>'required|numeric|different:first_choice,second_choice'
        ]);

        // auth()->user()->email->validate()   
        application::create([
            
            'email'=> auth()->user()->email,
            'first choice'=> $request->first_choice,
            'second choice'=> $request->second_choice,
            'third choice'=> $request->third_choice
        ]);
        first::create([
            
            'email'=> auth()->user()->email,
            'title'=> $request->first_choice,
            'lecturer'=> $lecturer1,
            'status'=> 'pending',
    
        ]);
        second::create([
            
            'email'=> auth()->user()->email,
            'title'=> $request->second_choice,
            'lecturer'=> $lecturer2,
            'status'=> 'pending',
    
        ]);
        third::create([
            
            'email'=> auth()->user()->email,
            'title'=> $request->third_choice,
            'lecturer'=> $lecturer3,
            'status'=> 'pending',
    
        ]);

       // tak boleh all sbb first array request ialah token
       // first array application ialah first choice
        // Application::create($request->all());

        return redirect('/title')->with ('status','Application Success!');

    }
}
