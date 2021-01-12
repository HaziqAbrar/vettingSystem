<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\First;
use App\Models\Second;
use App\Models\Third;
use App\Models\Application;
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
            $users = user::all();
            $first = first::all();
            $second = second::all();
            $third= third::all();
            $apply= application::where('email',$email);
            $titles= titleinfo::all();
            $noti = notification::where('receivers',$email)->first();
            $notis = notification::all()->where('receivers',$email);
            $data=false;
            $check=false;
            // $user = User::where('email', '=', Input::get('email'))->first();
            if ($apply) {
                $check=true;
            }
            if ($noti) {
                $data=true;
            }
            return view ('student\dashboard',compact('email','notis','data','users',
            'first','second','third','titles','check'));
            // return view ('student\dashboard');
        }
    }


}
