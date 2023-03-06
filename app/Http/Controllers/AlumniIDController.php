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

        if ($image = $request->file('signature')) {
            $destinationPath = 'images/alumni_id/signature/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $aid['signature'] = "$profileImage";
        }
        AlumniID::create($aid);
        Session::flash('success_reissuance','Succesful.');
        return redirect('/home-alumni-id')->with('aid', $aid)->withInput();
    }
}
