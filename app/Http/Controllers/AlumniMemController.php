<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlumniMem;
use Session;

class AlumniMemController extends Controller
{
    public function route_alumni_mem()
    {
        return view('main.alumni-membership');
    }

    public function post_alumni_mem(Request $request)
    {
        $amem = $request->all();

        if ($image = $request->file('signature')) {
            $destinationPath = 'images/alumni_mem/signature/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $amem['signature'] = "$profileImage";
        }

        AlumniMem::create($amem);
        Session::flash('success_reissuance','Succesful.');
        return redirect('/home-reissuance')->with('amem', $amem)->withInput();
    }
}
