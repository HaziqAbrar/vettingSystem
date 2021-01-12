<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\titleinfo;
use App\Models\notification;



class RedirectController extends Controller
{
    public function index(){
        $role = (Auth::user()->getAttribute('role'));
        // dd ($role);
        $titleinfos = titleinfo::all();
        if ($role=='supervisor')
        {
          $email = (Auth::user()->getAttribute('email'));
          $titleinfos = titleinfo::all();
          $mytitle = titleinfo::all()->where('email',$email);
            return view ('supervisor.supervisorIndex',compact('mytitle'));
        }
        elseif ($role=='coordinator')
        {
          // $titleinfos = titleinfo::all();
          // $user = user::all();
          $department = (Auth::user()->getAttribute('department'));
          // $titleinfos = titleinfo::all();
          $assignto = titleinfo::all()->where('major',$department);
          return view('coordinator.coordinatorIndex', compact('assignto'));
        }
        elseif ($role=='panel')
        {
            return view ('panel.panelIndex',compact('titleinfos'));
        }
        elseif ($role=='student')
        {
            $email = (Auth::user()->getAttribute('email'));
            $noti = notification::all()->where('receivers',$email)->first();
            return view ('student\dashboard',compact('email','noti'));
        }
    }


}
