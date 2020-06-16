@extends('dashboard')
@section('content')
@if(!empty(Session::get('id')))
<h1 class="success-card"> <i class="glyphicon glyphicon-ok"></i>  Success</h1>
<div class="col-sm-12">
    <div class='col-sm-5'>
        <img class="img-responsive  qr-code center-block img-fluid" src="{{ asset('storage/'.Session::get('id')['qr_path'])}}">
    </div>
    <div class="user-details col-sm-7">
        <h3 class="header">details</h3>
        <span class="user-name">
        {{ucfirst(Session::get('id')['fname'])." ".ucfirst(Session::get('id')['lname'])}} 
        </span>
        <div>
            <span class="other-details">{{ucfirst(Session::get('id')['passenger_type'])}} </span>
        </div>
        <div>
            <span class="user-email">{{Session::get('id')['email']}} </span>
        </div>
        <div>
            <span class="user-dates"> Amount: {{Session::get('id')['amount']}} Rupees</span>
        </div>
        <div>
            <img class="icons-img" src="{{ asset('css/icons/source.svg') }}"></img>
            <span class="user-dates"> {{Session::get('id')['from']}}</span>
            <img class="icons-img" src="{{ asset('css/icons/arrow.svg') }}"></img>
            <img class="icons-img" src="{{ asset('css/icons/final.svg') }}"></img>
            <span class="user-dates">{{Session::get('id')['to']}}</span>
        </div>
        <div>
            <span class="user-dates"> Expiry Date: {{Session::get('id')['expiry_date']}}</span>
            <span class="user-dates"> Issue Date: {{Session::get('id')['issue_date']}} </span>
        </div>  
    </div>
</div>
@else
    <script>window.location="/dashboard"</script>
@endif
@endsection