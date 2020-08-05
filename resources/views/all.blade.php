@extends('layouts.app')

@section('content')
  <div class="container">
    <a href="/home" class="float-right"><-Home</a>
      @if(!$all_users_with_hallpasses->isEmpty())
      <h4>Users and Their Hallpasses</h4>
        <div class="table-responsive">
          <table class="table table-bordered table-sm">
            <thead>
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Hallpases</th>
              </tr>
            </thead>
            <tbody>
              @foreach($all_users_with_hallpasses as $user_with_hallpasses)
                <tr>
                  <td>{{ $user_with_hallpasses->fname }}</td>
                  <td>{{ $user_with_hallpasses->lname }}</td>
                  <td><a href="/user-hallpass-list/{{ $user_with_hallpasses->id }}">View Hallpasses</a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @else
        There are no users or hallpasses to load at this time.
      @endif
  </div>
@endsection
