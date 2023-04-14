<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Signin;
use App\Models\AlumniID;
use App\Models\AlumniMem;
use App\Models\Admininfo;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Session;
use Hash;
use Mail;
use Auth;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function route_db_login()
    {
       return view('dashboard.dashboard-login');
    }

    function db_check_login(Request $request)
    {
    $this->validate($request, [
       'email' => 'required|email',
       'password' => 'required|alphaNum|min:8'
       ], [
       'email.required' => 'Please enter your email address.',
       'email.email' => 'Please enter a valid email address.',
       'password.required' => 'Please enter your password.',
       'password.alpha_num' => 'Your password must contain only letters and numbers.',
       'password.min' => 'Your password must be at least 8 characters long.'
       ]);
         

     $user = Admininfo::where('email','=',$request->email)->first();
     if ($user) {
        if(Hash::check($request->password,$user->password)){
            $request->session()->put('loginId',$user->id);
            return redirect('/dashboard');
        }else{
         return back()->with('loginfail','This password doesn`t match!')->withInput();
        }
     } else {
        return back()->with('loginfail','This email doesn`t exist!')->withInput();
     }
     
   }
 
    public function route_dashboard()
 
    {

     $numberOfAnnouncement = Announcement::count();
     $numberOfAlumniID = AlumniID::count();
     $numberOfAlumniMem = AlumniMem::count();
     $numberOfStudents = User::whereHas('roles', function ($query) {
        $query->where('name', 'Student');
    })->count();
    
     return view('dashboard.dashboard')->with([
        'numberOfAnnouncement' => $numberOfAnnouncement,
        'numberOfAlumniID' => $numberOfAlumniID,
        'numberOfAlumniMem' => $numberOfAlumniMem,
        'numberOfStudents' => $numberOfStudents
    ]);

    }

    public function adminpassword_update(Request $request)
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
         return redirect('/settings')->with(compact('user'));

      } else {
         return back()
         ->withErrors(['old_password' => 'Old password does not match our records.'])
         ->withInput()
         ->with(session()->flash('failpassword', 'Password change failed!'));
      }
    }

    public function admininfo_update(Request $request)
    {
        $user = Auth::user();
        $input = $request->all();
        $user->update($input);
        Session::flash('accountstatus','You`ve successfully edited your account information!');
        return redirect('/settings')->with(compact('user'));
    }

    public function adminpp_update(Request $request)
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
        return redirect('/settings')->with(compact('user'));
        
    }

    public function create_user_role(Request $request)
    {
        $user = new User();
        $user->first_name = $request->input('first_name');
        $user->middle_name = $request->input('middle_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->gender = $request->input('gender');
        $user->address = $request->input('address');
        $user->save();
    
        $roleId = $request->input('role');
        $role = Role::findById($roleId);
        if (!$role) {
            return redirect('/user-roles')->with('failregister', 'Invalid role ID');
        }
    
        $user->assignRole($role);
    
        Session::flash('status', 'You`ve registered successfully, Try to LOG IN.');
        return redirect('/user-roles');
    }

    public function update_user_role(Request $request)
    {
        $user_id = $request->input('user_id');
        $user = User::find($user_id);
        $user->first_name = $request->input('first_name');
        $user->middle_name = $request->input('middle_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->gender = $request->input('gender');
        $user->address = $request->input('address');
        
        if ($request->has('password')) {
            $user->password = Hash::make($request->input('password'));
        }
    
        $roleId = $request->input('role');
        $role = Role::findById($roleId);
        if (!$role) {
            return redirect('/user-roles')->with('failregister', 'Invalid role ID');
        }
    
        $user->syncRoles([$role]);
    
        $user->update();
    
        Session::flash('status', 'User role updated successfully.');
        return redirect('/user-roles');
    }
    

    public function route_user_role()
    {
        $user_roles = User::with('roles')
        ->whereHas('roles', function ($query) {
            $query->whereIn('name', ['Admin', 'ID Staff']);
        })
        ->get();
       return view('dashboard.users', compact('user_roles'));
    }


    public function db_users_ajaxview($id)
    {
        $user = User::with('roles')->find($id);
        return response()->json([
            'status' => 200,
            'user' => $user,
        ]);
    }

    public function db_users_ajaxedit($id)
    {
        $user = User::find($id);
        return response()->json([
            'status' => 200,
            'user' => $user,
        ]);
    }

    public function delete_user($id)
    {
        $delete_student = User::find($id);
        $delete_student -> delete();
        Session::flash('status','You`ve successfully deleted a User!');
        return redirect('/user-roles')->with('delete_student', $delete_student); 
    }

    public function adminlogout()
    {
     Auth::logout();
     return redirect('/dashboard-login');
    }
}
