<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use Session;

class AnnouncementController extends Controller
{

    public function route_announcement()
    {
        $announce = Announcement::all();
        return view('dashboard.announcement')->with('announce', $announce); 
    }


    public function post_announcement(Request $request)
    {
        $announce = $request->all();
        Announcement::create($announce);
        Session::flash('status','You`ve successfully added a announcement!');
        return redirect('/announcement')->with('announce', $announce); 
    }

    public function route_home(Request $request)
    {
        $announce = Announcement::all();
        return view('main.home')->with('announce', $announce); 
    }
}
