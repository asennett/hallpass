<?php

namespace App\Http\Controllers;
use App\Hallpass;
use App\Location;
use App\User;

use DateTime;
use Carbon\Carbon;
use Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Get logged in user
        $user = Auth::user();

        //If logged in user is a student, check if student has a current hallpass. If the child does not have a hallpass or if the hallpass has expired, give the student the option to request another hallpass. Hallpasses will expire in 15 minutes from request.
        if ($user->role_id == '1' || $user->role_id == '2') {
          $all_recent_hallpasses = Hallpass::where('created_at','>=',Carbon::now()->subMinutes(15)->toDateTimeString())->with('student','staff','location')->get()->sortBy('student.lname');

          return view('home',compact('user','all_recent_hallpasses'));

        // If logged in user is a teacher, get all of the hallpass requests for this teacher from within that past fifteen minutes.
        } else if ($user->role_id == '3') {
          $recent_hallpasses_for_teacher_view = Hallpass::where('staff_id',$user->id)->where('created_at','>=',Carbon::now()->subMinutes(15)->toDateTimeString())->get();

          // Get live count of all individuals in location.
          //
          $locations = Location::get();

          // Get all of the hallpasses from today.
          $todays_hallpasses = Hallpass::where('staff_id',$user->id)->whereDate('created_at',Carbon::now())->with('student','location')->get();

          return view('home',compact('user','locations','recent_hallpasses_for_teacher_view','todays_hallpasses'));

        //If logged in user is a student, check if student has a current hallpass. If the child does not have a hallpass or if the hallpass has expired, give the student the option to request another hallpass.
        } else {
          $student_hallpass = Hallpass::where('student_id',$user->id)->where('created_at','>=',Carbon::now()->subMinutes(15)->toDateTimeString())->first();
          $locations = Location::all();
          $teachers = User::where('role_id','3')->get();

          return view('home',compact('user','student_hallpass','locations','teachers'));
        }
    }
}
