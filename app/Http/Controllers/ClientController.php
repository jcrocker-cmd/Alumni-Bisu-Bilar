<?php

namespace App\Http\Controllers;
use App\Models\Announcement;
use Auth;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function route_home(Request $request)
    {
        $announce = Announcement::all();
        return view('main.home')->with('announce', $announce); 
    }

    public function clientlogout()
    {
     Auth::logout();
     return redirect('/student_login');
    }
}
