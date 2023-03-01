<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlumniID;
use Session;

class AlumniIDController extends Controller
{
    public function route_alumni_id()
    {
        return view('main.alumni-id');
    }

    public function post_alumni_id(Request $request)
    {
        $aid = $request->all();
        AlumniID::create($aid);
        Session::flash('success_reissuance','Succesful.');
        return redirect('/home-reissuance')->with('aid', $aid)->withInput();
    }
}
