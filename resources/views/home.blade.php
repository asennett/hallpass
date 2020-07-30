@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Superadmin & Admin -->
        @if($user->role_id == '1' || $user->role_id == '2')
          <div class="col-md-10">
              <div class="card">
                  <div class="card-header">Current Passes</div>

                  <div class="card-body">
                      @if (session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                      @endif

                      <ul class="list-group">
                        @foreach($all_recent_hallpasses as $recent_hallpass)
                          <li class="list-group-item"><b>Student:</b> {{ $recent_hallpass->student->fname }} {{ $recent_hallpass->student->lname }},<b>Staff</b>: {{ $recent_hallpass->staff->lname }}, <b>Location</b>: {{ $recent_hallpass->location->name }}</li>
                        @endforeach
                      </ul>
                  </div>
              </div>
          </div>
        <!-- Teacher  -->
        @elseif($user->role_id == '3')
          <div class="col-md-6">
            @if(!$recent_hallpasses_for_teacher_view->isEmpty())
              @foreach($recent_hallpasses_for_teacher_view as $teacher_hallpass)
                <div class="card @if($teacher_hallpass->status == 'pending') bg-warning mb-3 @else bg-success @endif m-2">
                  <h5 class="card-header">{{ $teacher_hallpass->location->name }} Pass</h5>
                  <div class="card-body">
                    @if($teacher_hallpass->status == 'pending')
                      <h4><i>Waiting for Teacher</i></h4> @else <h4><i>Approved</i></h4>
                    @endif

                    <p class="card-text"> <b>For</b>: {{ $teacher_hallpass->student->fname }} {{ $teacher_hallpass->student->lname }}<br /><b>From</b>: {{ $teacher_hallpass->staff->fname }} {{ $teacher_hallpass->staff->lname }}<br /><b>Time Approved</b>: {{ $teacher_hallpass->created_at }}</p>
                    <form method="POST" action="/approve">
                      @csrf
                      <input type="hidden" id="id" name="id" value="{{ $teacher_hallpass->id }}">
                      <button type="submit" class="btn btn-success">Approve</button>
                      <button type="submit" class="btn btn-danger" formaction="/deny">Deny</button>
                    </form>
                  </div>
                </div>
              @endforeach
            @else
              <p>There are no hallpasses waiting approval at this time.</p>
            @endif
          </div>
          <div class="col-md-6">
            @if(!$locations->isEmpty())
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Location</th>
                      <th>Current Occupancy</th>
                      <th>Capacity</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($locations as $location)
                      <tr>
                        <td>{{ $location->name }}</td>
                        <td></td>
                        <td>{{ $location->capacity }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            @else
              <p>There are no locations in the system at this time.</p>
            @endif
          </div>
          <div class="table-responsive">
            @if(!$todays_hallpasses->isEmpty())
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Day, Date, Time</th>
                    <th>Location</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($todays_hallpasses as $hallpass)
                    <tr>
                      <td>{{ $hallpass->student->fname }}</td>
                      <td>{{ $hallpass->student->lname }}</td>
                      <td>{{ $hallpass->created_at->toDayDateTimeString() }}</td>
                      <td>{{ $hallpass->location->name }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            @endif
          </div>
        </div>

        <!-- Students -->
        @elseif($user->role_id == '4')
          @if($student_hallpass)
            <div class="card @if($student_hallpass->status == 'pending') bg-warning mb-3 @else bg-success @endif">
              <h5 class="card-header">{{ $student_hallpass->location->name }} Pass</h5>
              <div class="card-body">
                @if($student_hallpass->status == 'pending')
                  <h4><i>Waiting for Teacher</i></h4>
                @else
                  <h4><i>Approved</i></h4>
                @endif

                <p class="card-text"> <b>For</b>: {{ $student_hallpass->student->fname }} {{ $student_hallpass->student->lname }}<br /><b>From</b>: {{ $student_hallpass->staff->fname }} {{ $student_hallpass->staff->lname }}<br /><b>Time Approved</b>: {{ $student_hallpass->created_at }}</p>

              </div>
            </div>
          @else
          <div class="col-md-6">
            <form method="POST" action="/hallpass">
              @csrf
              <h5>Currently, you do not have any hallpasses.</h5>
              <hr />
                <div class="form-group">
                  <label for="location">Select location:</label>
                  <select class="form-control" id="location" name="location" required>
                    <option> </option>
                    @foreach($locations as $location)
                      <option value="{{ $location->id }}">{{ $location->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="teacher">Select teacher:</label>
                  <select class="form-control" id="staff" name="staff" required>
                    <option> </option>
                    @foreach($teachers as $teacher)
                      <option value="{{ $teacher->id }}">{{ $teacher->fname }} {{ $teacher->lname }}</option>
                    @endforeach
                  </select>
                </div>
                <button type="submit" class="btn btn-outline-primary">Send to Teacher</button>
            </form>
          </div>
          @endif
        @endif
    </div>
</div>
@endsection
