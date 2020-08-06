<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\User;

class UsersController extends Controller
{
    public function users()
    {
      $user = Auth::user();

      //If Auth user has role admin or superadmin return all Users.
      if($user->role_id == 1 || $user->role_id == 2){
        $all_users = User::get()->sortBy('lname');

        return view('users',compact('all_users'));
      }
    }
}
