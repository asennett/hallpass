@extends('layouts.app')

@section('content')
  <div class="container">
    <a href="/all" class="float-right"><-Back to all students</a>
      @if(!$student_hallpasses->isEmpty())
        <div class="table-responsive">
          <table class="table table-bordered table-sm">
            <thead>
              <tr>
                <th>Location</th>
                <th>Day, Date, Time</th>
                <th>Teacher</th>
              </tr>
            </thead>
            <tbody>
              @foreach($student_hallpasses as $hallpass)
                <tr>
                  <td>{{ $hallpass->location->name }}</td>
                  <td>{{ $hallpass->created_at->toDayDateTimeString() }}</td>
                  <td>{{ $hallpass->staff->fname }} {{ $hallpass->staff->lname }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @else
        There are no hallpasses for this user at this time.
      @endif
    </div>
  </div>
@endsection
