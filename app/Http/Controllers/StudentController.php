<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AlumniID;
use App\Models\AlumniMem;
use App\Models\Reissueance;
use Session;
use DB;
use Auth;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    public function route_user_role()
    {
        $user_roles = User::with('roles')
        ->whereHas('roles', function ($query) {
            $query->whereIn('name', ['Student']);
        })
        ->get();
    
        // // Get the user role names
        // $role_names = $user_roles->pluck('roles.0.name');
        
    
        // // DAY
        // $daily_students = DB::table('users')
        //     ->select(DB::raw('COUNT(*) as count, DATE(created_at) as day'))
        //     ->whereHas('roles', function ($query) {
        //         $query->whereIn('name', ['Student']);
        //     })
        //     ->groupBy('day')
        //     ->get();

        // $days = [];
        // $day_counts = [];

        // foreach ($daily_students as $students) {
        //     $days[] = date("F j, Y", strtotime($students->day));
        //     $day_counts [] = $students->count;
        // }


        // // WEEK
        // $weekly_student = DB::table('users')
        //     ->select(DB::raw('COUNT(*) as count, DATE(DATE_FORMAT(created_at, "%Y-%m-%d") - INTERVAL DAYOFWEEK(created_at) - 1 DAY) as week_start_date'))
        //     ->whereHas('roles', function ($query) {
        //         $query->whereIn('name', ['Student']);
        //     })
        //     ->groupBy('week_start_date')
        //     ->get();

        // $weeks = [];
        // $week_counts  = [];

        // foreach ($weekly_student as $students) {
        //     $weeks[] = 'Week of '.date("F j, Y", strtotime($students->week_start_date));
        //     $week_counts [] = $students->count;
        // }

        // // MONTH
        // $monthly_student = DB::table('users')
        //     ->select(DB::raw('COUNT(*) as count, DATE(DATE_FORMAT(created_at, "%Y-%m-01")) as month_start_date'))
        //     ->whereHas('roles', function ($query) {
        //         $query->whereIn('name', ['Student']);
        //     })
        //     ->groupBy('month_start_date')
        //     ->get();

        // $months = [];
        // $month_counts  = [];

        // foreach ($monthly_student as $students) {
        //     $months[] = date("F Y", strtotime($students->month_start_date));
        //     $month_counts [] = $students->count;
        // }

        // // YEAR
        // $yearly_student = DB::table('users')
        //     ->select(DB::raw('COUNT(*) as count, YEAR(created_at) as year'))
        //     ->whereHas('roles', function ($query) {
        //         $query->whereIn('name', ['Student']);
        //     })
        //     ->groupBy('year')
        //     ->get();

        // $years = [];
        // $year_counts = [];

        // foreach ($yearly_student as $students) {
        //     $years[] = $students->year;
        //     $year_counts[] = $students->count;
        // }
            
           return view('dashboard.record', compact('user_roles'));
    }

    public function db_record_ajaxview($id)
    {
        $user = User::with('roles')->find($id);
        return response()->json([
            'status' => 200,
            'user' => $user,
        ]);
    }

    public function delete_student($id)
    {
        $delete_student = User::find($id);
        $delete_student -> delete();
        Session::flash('status','You`ve successfully deleted a Student!');
        return redirect('/record-of-alumni')->with('delete_student', $delete_student); 
    }

    public function student_password_update(Request $request)
    {
      $request->validate([
         'old_password'=>'required|min:8|max:20|alphaNum',
         'new_password'=>'required|min:8|max:20|alphaNum',
         'confirm_password'=>'required|same:new_password',
      ]);
      $user = Auth::user();

      if (Hash::check($request->old_password, $user->password)) {
         
         $user->update([
               'password'=>bcrypt($request->new_password)
         ]);

         Session::flash('successpassword','You`ve successfully edited your password!');
         return redirect('/home-account')->with(compact('user'));

      } else {
         return back()
         ->withErrors(['old_password' => 'Old password does not match our records.'])
         ->withInput()
         ->with(session()->flash('failpassword', 'Password change failed!'));
      }
    }

    public function student_info_update(Request $request)
    {
        $user = Auth::user();
        $input = $request->all();
        $user->update($input);
        Session::flash('accountstatus','You`ve successfully edited your account information!');
        return redirect('/home-account')->with(compact('user'));
    }

    public function student_pp_update(Request $request)
    {
        $user = Auth::user();
        $input = $request->all();
        if ($image = $request->file('profile_picture')) {

            $destinationPath = 'images/user_profile/'.$user->profile_picture;
            if (File::exists($destinationPath)) {
                File::delete($destinationPath);
            }
            $destinationPath = 'images/user_profile/';
            $carImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $carImage);
            $input['profile_picture'] = "$carImage";
        }else{
            unset($input['profile_picture']);
        }
        $user->update($input);
        Session::flash('accountstatus','You`ve successfully edited your profile photo!');
        return redirect('/home-account')->with(compact('user'));
        
    }

    public function route_student_record()
    {
        $user_id = auth()->user()->id;
        $alumni_id = AlumniID::where('user_id', $user_id)->with('user')->get();
        $alumni_mem = AlumniMem::where('user_id', $user_id)->with('user')->get();
        $reissue = Reissueance::where('user_id', $user_id)->with('user')->get();
    
        return view('main.record', compact('alumni_id'));
    }


    // AJAX 

    public function student_alumni_id_ajaxview($id)
    {
        $alumni_id = AlumniID::find($id);
        $image_url = asset('images/alumni_id/signature/' . $alumni_id->signature);
        return response()->json([
            'status' => 200,
            'alumni_id' => $alumni_id,
            'image_url' => $image_url,
        ]);
    }
    

}
