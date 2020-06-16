@extends('dashboard')
@section('content')
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
        $(function () {

            if($("#submit_flag").attr('name')=='true')
            {
              $("#student-card").hide();
              $("#employee-card").hide();
              $("#back-butt").show();
              if($("#type").attr('name')=='student')
              {
                $("#employee-form").hide();
                $("#student-form").show();
              }
              if($("#type").attr('name')=='employee')
              {
                $("#employee-form").show();
                $("#student-form").hide();
              }
            }
            $("#employee-card").click(function () {
                if ($(this).attr('name') == "Yes") {
                    $("#employee-form").show();
                    $("#student-card").hide();
                    $("#employee-card").hide();
                    $("#back-butt").show();
                    $(this).val("No");
                }
            });
            $("#student-card").click(function () {
                if ($(this).attr('name') == "Yes") {
                    $("#student-form").show();
                    $("#student-card").hide();
                    $("#employee-card").hide();
                    $("#back-butt").show();
                    $(this).val("No");
                }
            });
            $("#back-butt").click(function () {
                    $("#student-form").hide();
                    $("#employee-form").hide();
                    $("#student-card").show();
                    $("#employee-card").show();
                    $("#back-butt").hide();
                    $(this).val("No");
            });
            $("#payment").click(function () {
                var pay=['upi','credit_card','debit_card'];
                pay.splice( pay.indexOf($(this).val()), 1 );
                $('#'+$(this).val()).show();
                console.log(pay);
                pay.map(payment);
                
            });
            function payment(x)
            {
              $("#"+x).hide()
            }
        });
</script>
<input type="hidden" id="submit_flag" name="{{Session::get('submit_flag') ?? 'false'}}"/>
<input type="hidden" id="type" name="{{Session::get('type') ?? ''}}"/>
<div class="card-container">
  <div class="card-formatter">
    <div class="col-sm-4" id="employee-card" name="Yes">
        <div class="card">
          <div class="card-image">
            <img class="img-responsive center-block" src="{{ asset('css/icons/employee.svg') }}">
          </div>
          <div class="card-content">
              <span class="card-title">Employees</span>
              <br/>
              <h5 class="card-title">Create Pass</h5>
          </div>
        </div>
    </div>
    <div class="col-sm-4" id="student-card" name="Yes">
      <div class="card">
        <div class="card-image">
          <img class="img-responsive center-block" src="{{ asset('css/icons/student.svg') }}">
        </div>
        <div class="card-content">
            <span class="card-title">Students</span>
            <br/>
            <h5 class="card-title">Create Pass</h5>
        </div>
      </div>
    </div>
  </div>
  <div id="back-butt" style="display: none">
       <i class="glyphicon glyphicon-arrow-left "><span style="margin-left: 7px">back</span></i> 
  </div>
  <div id="employee-form" style="display: none">
  @include('employee')
  </div>
  <div id="student-form" style="display: none">
  @include('student') 
  </div>

</div>
@endsection

