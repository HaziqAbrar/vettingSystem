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
use App\Models\meet;
use App\Models\Panel;



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
          $department = (Auth::user()->getAttribute('department'));
          $levels = Auth::user()->getAttribute('level');

          if ($levels == 'Postgraduate') {
            $assignto = titleinfo::all()->where('major',$department);
            return view('coordinator.coordinatorIndex', compact('assignto'));
          }else {
            $assignto = titleinfo::all()->where('major',$department);
            return view('coordinator.coordinatorUIndex', compact('assignto'));
          }
        }
        elseif ($role=='panel')
        {
          $emailpanel = Auth::user()->getAttribute('email');
          $panelform = Panel::all()->where('email',$emailpanel);
          $titleinfos = titleinfo::all();
          return view('panel.panelIndex', compact('panelform'), compact('titleinfos'));
        }
        elseif ($role=='student')
        {
            $email = (Auth::user()->getAttribute('email'));
            $users = user::all();
            $first = first::all();
            $second = second::all();
            $third= third::all();
            $apply= first::where('email',$email)->first();
            $titles= titleinfo::all();
            $noti = notification::where('receivers',$email)->first();
            $notis = notification::all()->where('receivers',$email)->where('status','not read');
            $meets = meet::all();
            $data=false;
            $check=false;

            // dd($notis);
            // $user = User::where('email', '=', Input::get('email'))->first();
            if ($apply) {
                $check=true;
            }
            if ($noti) {
                $data=true;
                // dd($notis);
            }
            return view ('student\dashboard',compact('email','notis','data','users',
            'first','second','third','titles','check','meets'));
            // return view ('student\dashboard');
        }
    }


}
