@extends('dashboard')
@section('content')
<div class="container-fluid">
                    @foreach($data as $id=>$value)
                      <div class="row">
                          <div class="student-info col-md-12">
                                <img class=" col-md-3 student-image img-responsive card-icon" src="{{ asset($value['image']) }}">
                                <div class="col-md-8 student-data">
                                    @foreach($value['data'] as $id=>$value)
                                    <div>
                                        <span class="col-md-5">{{$id}} :</span>
                                        <span class="col-md-5">{{$value}}</span>
                                        <br/>
                                    </div>
                                    @endforeach
                                </div>
                          </div>
                      </div>
                      @endforeach
    </div>
@endsection

