<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlumniID;
use App\Models\User;
use Session;
use DB;
use Illuminate\Support\Facades\File;

class AlumniIDController extends Controller
{
    public function db_route_alumni_id()
    {   
        $alumni_id = AlumniID::all();
        
        // DAY
        $daily_alumni_id = DB::table('alumni_id')
        ->select(DB::raw('COUNT(*) as count, DATE(created_at) as day'))
        ->groupBy('day')
        ->get();

        $days = [];
        $day_counts = [];

        foreach ($daily_alumni_id as $aid) {
            $days[] = date("F j, Y", strtotime($aid->day));
            $day_counts [] = $aid->count;
        }


        // WEEK
        $weekly_alumni_id = DB::table('alumni_id')
            ->select(DB::raw('COUNT(*) as count, DATE(DATE_FORMAT(created_at, "%Y-%m-%d") - INTERVAL DAYOFWEEK(created_at) - 1 DAY) as week_start_date'))
            ->groupBy('week_start_date')
            ->get();

        $weeks = [];
        $week_counts  = [];

        foreach ($weekly_alumni_id as $aid) {
            $weeks[] = 'Week of '.date("F j, Y", strtotime($aid->week_start_date));
            $week_counts [] = $aid->count;
        }

        // MONTH
        $monthly_alumni_id = DB::table('alumni_id')
            ->select(DB::raw('COUNT(*) as count, DATE(DATE_FORMAT(created_at, "%Y-%m-01")) as month_start_date'))
            ->groupBy('month_start_date')
            ->get();

        $months = [];
        $month_counts  = [];

        foreach ($monthly_alumni_id as $aid) {
            $months[] = date("F Y", strtotime($aid->month_start_date));
            $month_counts [] = $aid->count;
        }

        // YEAR
        $yearly_alumni_id = DB::table('alumni_id')
        ->select(DB::raw('COUNT(*) as count, YEAR(created_at) as year'))
        ->groupBy('year')
        ->get();

        $years = [];
        $year_counts = [];

        foreach ($yearly_alumni_id as $aid) {
        $years[] = $aid->year;
        $year_counts[] = $aid->count;
        }

        return view ('dashboard.alumni-id', compact('alumni_id', 'day_counts', 'week_counts', 'month_counts','year_counts','days', 'weeks', 'months','years',));
        }


    public function route_alumni_id()
    {
        return view('main.alumni-id');
    }

    public function post_alumni_id(Request $request)
    {
        $aid = $request->all();

        // Add the user_id to the form data
        $aid['user_id'] = $request->user()->id;
    
        // Get the selected year from the form data
        $year = $aid['id_no'];
    
        // Get the number of existing alumni IDs for the selected year
        $count = AlumniID::where('id_no', $year)->count();
    
        // Generate the next alumni ID for the selected year
        if ($count == 0) {
            // If there are no existing alumni IDs for the selected year, set the count to 1
            $count = 1;
        } else {
            // Otherwise, get the latest alumni ID for the selected year and increment the count by 1
            $latest_alumni_id = AlumniID::where('id_no', $year)->latest()->first();
            $count = intval(substr($latest_alumni_id->a_no, -4)) + 1;
        }
    
        // Generate the next alumni ID based on the year and count
        $alumni_id = $year . '-' . str_pad($count, 4, '0', STR_PAD_LEFT);
    
        // Add the generated alumni ID to the form data
        $aid['a_no'] = $alumni_id;
    
        if ($image = $request->file('signature')) {
            $destinationPath = 'images/alumni_id/signature/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $aid['signature'] = "$profileImage";
        }
        AlumniID::create($aid);

        // Update the user's alumni_id_applied column to true
        $user = User::find($request->user()->id);
        $user->alumni_id_applied = true;
        $user->save();
        
        Session::flash('success_reissuance','Succesful.');
        return redirect('/success-alumni-id')->with('aid', $aid)->withInput();
    }
    
    

    public function db_alumni_id_ajaxview($id)
    {
        $alumni_id = AlumniID::find($id);
        $image_url = asset('images/alumni_id/signature/' . $alumni_id->signature);
        return response()->json([
            'status' => 200,
            'alumni_id' => $alumni_id,
            'image_url' => $image_url,
        ]);
    }
    

    public function db_delete_alumni_id($id)
    {
        $delete_alumni_id = AlumniID::find($id);
        $destinationPath = 'images/alumni_id/signature/'.$delete_alumni_id->signature;
        if (File::exists($destinationPath)) {
            File::delete($destinationPath);
        }
        $delete_alumni_id -> delete();
        Session::flash('status','You`ve successfully deleted an ID!');
        return redirect('/alumni-id')->with('delete_alumni_id', $delete_alumni_id); 
    }

    public function success_alumni_id()
    {
        return view('main.success-alumni-id');
    }

      
}
