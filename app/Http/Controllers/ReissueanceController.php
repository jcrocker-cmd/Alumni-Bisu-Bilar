<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reissueance;
use Session;

class ReissueanceController extends Controller
{
    public function route_reissuance()
    {
        return view('main.reissuance');
    }

    public function post_reissuance(Request $request)
    {
        $reissuance = $request->all();

        if ($image = $request->file('signature')) {
            $destinationPath = 'images/reissueance/signature/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $reissuance['signature'] = "$profileImage";
        }
        Reissueance::create($reissuance);
        Session::flash('success_reissuance','Succesful.');
        return redirect('/home-reissuance')->with('reissuance', $reissuance)->withInput();
    }
}
