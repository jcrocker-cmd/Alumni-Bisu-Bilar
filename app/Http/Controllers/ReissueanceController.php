<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reissueance;
use Session;
use DB;
use Illuminate\Support\Facades\File;

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

    public function db_route_reissuance()
    {
        $reissueance = Reissueance::all();

        // DAY
        $daily_reissuance = DB::table('reissueances')
        ->select(DB::raw('COUNT(*) as count, DATE(created_at) as day'))
        ->groupBy('day')
        ->get();

        $days = [];
        $day_counts = [];

        foreach ($daily_reissuance as $reissuance) {
            $days[] = date("F j, Y", strtotime($reissuance->day));
            $day_counts [] = $reissuance->count;
        }


        // WEEK
        $weekly_reissuance = DB::table('reissueances')
            ->select(DB::raw('COUNT(*) as count, DATE(DATE_FORMAT(created_at, "%Y-%m-%d") - INTERVAL DAYOFWEEK(created_at) - 1 DAY) as week_start_date'))
            ->groupBy('week_start_date')
            ->get();

        $weeks = [];
        $week_counts  = [];

        foreach ($weekly_reissuance as $reissuance) {
            $weeks[] = 'Week of '.date("F j, Y", strtotime($reissuance->week_start_date));
            $week_counts [] = $reissuance->count;
        }

        // MONTH
        $monthly_reissuance = DB::table('reissueances')
            ->select(DB::raw('COUNT(*) as count, DATE(DATE_FORMAT(created_at, "%Y-%m-01")) as month_start_date'))
            ->groupBy('month_start_date')
            ->get();

        $months = [];
        $month_counts  = [];

        foreach ($monthly_reissuance as $reissuance) {
            $months[] = date("F Y", strtotime($reissuance->month_start_date));
            $month_counts [] = $reissuance->count;
        }

        // YEAR
        $yearly_reissuance = DB::table('reissueances')
        ->select(DB::raw('COUNT(*) as count, YEAR(created_at) as year'))
        ->groupBy('year')
        ->get();

        $years = [];
        $year_counts = [];

        foreach ($yearly_reissuance as $reissuance) {
        $years[] = $reissuance->year;
        $year_counts[] = $reissuance->count;
        }

        return view ('dashboard.reissueance', compact('reissueance', 'day_counts', 'week_counts', 'month_counts','year_counts','days', 'weeks', 'months','years',));
        }

    public function db_reissueance_ajaxview($id)
    {
        $reissueance = Reissueance::find($id);
        $image_url = asset('images/reissueance/signature/' . $reissueance->signature);
        return response()->json([
            'status' => 200,
            'reissueance' => $reissueance,
            'image_url' => $image_url,
        ]);
    }
    
    

    public function db_delete_reissueance($id)
    {
        $delete_reissueance = Reissueance::find($id);
        $destinationPath = 'images/reissueance/signature/'.$delete_reissueance->signature;
        if (File::exists($destinationPath)) {
            File::delete($destinationPath);
        }
        $delete_reissueance -> delete();
        Session::flash('status','You`ve successfully deleted a reissueance!');
        return redirect('/reissueance')->with('delete_reissueance', $delete_reissueance); 
    }
}
