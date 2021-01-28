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
        $level = (Auth::user()->getAttribute('level'));
        $department = (Auth::user()->getAttribute('department'));
        // dd ($department);
        $test= DB::table('applications')->where('email',$email)->value('email');
        
        if($test==null){
            $data=false; }
            else {
                $data=true;
            }
            // dd($data);
         $titleinfos = titleinfo::all()->where('level',$level)->where('major',$department)->where('status','Accepted');
        // dd($titleinfos);
            return view ('student/title',compact('titleinfos','email','data'));
    }

    public function show(titleinfo $title)
    {
        
        return view ('student/titleindex',compact('title'));
    }
    public function agree1(first $first)
    {
        
        // dd($first);

        first::where('id', $first->id)
                    ->update([
                        'agree'=> 'agreed',
                    ]);

        return redirect('/dashboard')->with('status','Title Agreed');
    }
    public function agree2(second $second)
    {
        
        // dd($second);

        second::where('id', $second->id)
                    ->update([
                        'agree'=> 'agreed',
                    ]);

        return redirect('/dashboard')->with('status','Title Agreed');
    }
    public function agree3(third $third)
    {
        
        // dd($third);

        third::where('id', $third->id)
                    ->update([
                        'agree'=> 'agreed',
                    ]);

        return redirect('/dashboard')->with('status','Title Agreed');
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
        if($lecturer1){
            if($lecturer2){
                if($lecturer3){
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
                        'agree'=> 'no',
                
                    ]);
                    second::create([
                        
                        'email'=> auth()->user()->email,
                        'title'=> $request->second_choice,
                        'lecturer'=> $lecturer2,
                        'status'=> 'pending',
                        'agree'=> 'no',
                
                    ]);
                    third::create([
                        
                        'email'=> auth()->user()->email,
                        'title'=> $request->third_choice,
                        'lecturer'=> $lecturer3,
                        'status'=> 'pending',
                        'agree'=> 'no',
                
                    ]);
            
                    return redirect('/title')->with ('status','Application Success!');
                }
                return redirect('/title')->with ('status','Title Code in field 1 does not exist');
            }
            return redirect('/title')->with ('status','Title Code in field 2 does not exist');
        }
        
        return redirect('/title')->with ('status','Title Code in field 1 does not exist');

        // auth()->user()->email->validate()   


    }
}
