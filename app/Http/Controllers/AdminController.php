<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Signin;
use App\Models\Admininfo;
use Session;
use Hash;
use Mail;

class AdminController extends Controller
{
    public function route_db_login()
    {
       return view('dashboard.dashboard-login');
    }

    function db_check_login(Request $request)
    {
    $this->validate($request, [
       'email' => 'required|email',
       'password' => 'required|alphaNum|min:8'
       ], [
       'email.required' => 'Please enter your email address.',
       'email.email' => 'Please enter a valid email address.',
       'password.required' => 'Please enter your password.',
       'password.alpha_num' => 'Your password must contain only letters and numbers.',
       'password.min' => 'Your password must be at least 8 characters long.'
       ]);
         

     $user = Admininfo::where('email','=',$request->email)->first();
     if ($user) {
        if(Hash::check($request->password,$user->password)){
            $request->session()->put('loginId',$user->id);
            return redirect('/dashboard');
        }else{
         return back()->with('loginfail','This password doesn`t match!')->withInput();
        }
     } else {
        return back()->with('loginfail','This email doesn`t exist!')->withInput();
     }
     
   }
 
    public function route_dashboard()
 
    {

     $numberOfAnnouncement = Announcement::count();
     $numberOfAlumni = Signin::count();
     return view('dashboard.dashboard')->with([
        'numberOfAnnouncement' => $numberOfAnnouncement,
        'numberOfAlumni' => $numberOfAlumni
    ]);

    }
}
