<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

use Illuminate\Support\Facades\DB;
use App\Models\titleinfo;




class TitlesController extends Controller
{
    public function index(){
        $role = (Auth::user()->getAttribute('role'));
        // dd ($role);
      
         $titleinfos = titleinfo::all();
        // dd($titleinfos);
            return view ('student/ptitle',compact('titleinfos'));
    }

    public function show(titleinfo $title)
    {
        
        return view ('student/titleindex',compact('title'));
    }
}
