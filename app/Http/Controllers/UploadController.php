<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\student;

use Illuminate\Support\Facades\DB;
use App\Models\titleinfo;
use App\Models\application;




class UploadController extends Controller
{
    public function index(Request $request){
       
            // dd($request->hasFile('image'));
            if ($request->hasFile('image'))
            {
            $filename =$request->image->getClientOriginalName();
            $request->image->storeAs('images', $filename, 'uploads');
            
            user::where('email', Auth::user()->getAttribute('email'))
                     ->update([
                         'avatar'=> $filename,
                        
                     ]);
            student::where('email', Auth::user()->getAttribute('email'))
                     ->update([
                         'avatar'=> $filename,
                        
                     ]);
            // Auth::user()->upload('avatar', $request->file('image'));
          
            
            // dd($filename);
            return redirect ('/profile')->with ('status','Profile Updated!');
    }
}
}