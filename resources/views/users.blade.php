@extends('layouts.app')

@section('content')
  <div class="container">
    <a href="/home" class="float-right"><-Home</a>
      @if(!$all_users->isEmpty())
        <div class="table table-responsive">
          <table class="table table-bordered table-sm">
            <thead>
              <th>First Name</th>
              <th>Last name</th>
              <th>Email</th>
              <th>Reset Password</th>
              <th>Delete User</th>
            </thead>
            <tbody>
              @foreach($all_users as $user)
                <tr>
                  <td>{{ $user->fname }}</td>
                  <td>{{ $user->lname }}</td>
                  <td>{{ $user->email }}</td>
                  <td><a href="/reset-password">Reset Password</a></td>
                  <td><a href="/delete-user" class="text-danger">Delete User</a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @endif
    </div>
  </div>
@endsection
