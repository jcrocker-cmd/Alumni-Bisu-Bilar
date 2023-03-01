<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use Session;
use Mail;
use DB;

class AnnouncementController extends Controller
{

    public function route_announcement()
    {
        $announce = Announcement::all();
        return view('dashboard.announcement')->with('announce', $announce); 
    }


    public function post_announcement(Request $request)
    {
        $data = [
            'subject' => $request->subject,
            'description' => $request->description,
            'date' => $request->date,
          ];

          $announce = new Announcement;
          $announce->subject = $data['subject'];
          $announce->description = $data['description'];
          $announce->date = $data['date'];
          $announce->save();

            // Get all email addresses from the users table
            $emails = DB::table('signin')->pluck('email')->toArray();

            Mail::send('dashboard.email-template', ['data' => $data], function($message) use ($data, $emails) {
                // Send email to all email addresses
                $message->to($emails);
                $message->subject($data['subject']);
            });

        Session::flash('status','You`ve successfully added a announcement!');
        return redirect('/announcement')->with('announce', $announce); 

          
    }

    public function route_home(Request $request)
    {
        $announce = Announcement::all();
        return view('main.home')->with('announce', $announce); 
    }

    public function delete_announcement($id)
    {
        $delete_annnouncement = Announcement::find($id);
        $delete_annnouncement -> delete();
        Session::flash('status','You`ve successfully deleted a Announcement!');
        return redirect('/announcement')->with('delete_annnouncement', $delete_annnouncement); 
    }

}
