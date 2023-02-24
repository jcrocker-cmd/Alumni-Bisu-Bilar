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
        $this->validate($request, [
        'name' => 'required',
        'id_no' => 'required',
        'degree' => 'required',
        'reason' => 'required',
        'or_no' => 'required',
        ]);
              

        $reissuance = $request->all();
        Reissueance::create($reissuance);
        Session::flash('success_reissuance','Succesful.');
        return redirect('/home-reissuance')->with('reissuance', $reissuance)->withInput();
    }
}
