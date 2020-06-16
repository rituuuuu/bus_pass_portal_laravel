@extends('dashboard')
@section('content')
<div class="card-container">
  <div class="row card-formatter">
    <div class="col-sm-3 ">
      <div class="card">
        <div class="card-image">
          <img class="img-responsive center-block" src="{{ asset('css/icons/employee.svg') }}">
        </div>

        <div class="card-content">
            <span class="card-title">Employees</span>
        </div>

        <div class="card-action">
          <a href="#" target="new_blank">Create Pass</a>
        </div>
      </div>

    </div>
    <div class="col-sm-3">
      <div class="card">
        <div class="card-image">
          <img class="img-responsive center-block" src="{{ asset('css/icons/student.svg') }}">
        </div>
        <div class="card-content">
            <span class="card-title">Students</span>
        </div>
        <div class="card-action">
          <a href="#" target="new_blank">Create Pass</a>
        </div>
      </div>

    </div>


  </div>

</div>
@endsection

