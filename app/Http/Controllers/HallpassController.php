<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hallpass;
use App\User;

use Auth;

class HallpassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $valid_request = $request->validate([
        'location' => 'required',
        'staff' => 'required',
      ]);

      $user = Auth::user();

      $new_hallpass = new Hallpass;
      $new_hallpass->location_id = $request->location;
      $new_hallpass->student_id = $user->id;
      $new_hallpass->staff_id = $request->staff;
      $new_hallpass->save();

      return back();
    }

    public function approve(Request $request)
    {
      $hallpass = Hallpass::find($request->id);
      $hallpass->status = 'approved';
      $hallpass->save();

      return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $hallpass = Hallpass::where('id',$request->id)->first();
      $hallpass->delete();

      return back();
    }

    // This function may be better suited on a Users Controller.
    public function all()
    {
      $user = Auth::user();
      if($user->role_id == 1 || $user->role_id == 2){
        $all_users_with_hallpasses = User::where('role_id','4')->with('hallpasses')->get()->sortBy('lname');

        return view('all',compact('all_users_with_hallpasses'));
      }
    }

    public function list($id)
    {
      $user = Auth::user();
      if($user->role_id == 1 || $user->role_id = 2){
        $student_hallpasses = Hallpass::where('student_id',$id)->where('status','approved')->with('location','staff')->latest()->get();

        // return $student_hallpasses;

        return view('list',compact('student_hallpasses'));
      }

      return back();
    }
}
