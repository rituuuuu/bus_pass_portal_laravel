

<div class="cotainer">
<div class='row justify-content-center'>
    <div class="card-header"><span class="card-span">Employee Pass Registration</span></div>
    <div class="form-content">
        <form class='col-sm-9' method="post" action="{{ url('/addPassHolder/employee')}}" enctype="multipart/form-data">
        <h5 class="alert-danger">{{Session::get('ferror') ?? ''}}</h5> 
            {{ csrf_field() }}
                <div class='form-group row'>
                    <label class="col-md-4 col-form-label text-md-right">Enter Employee First Name</label>
                    <input type="text" name='fname' class="form-control col-md-6" value="{{ $input['id'] ?? '' }}" required/>
                </div>
                <div class='form-group row'>
                    <label class="col-md-4 col-form-label text-md-right" >Enter Employee Last name</label>
                    <input type="text" name='lname' class="form-control col-md-6" value="{{ $input['name'] ?? '' }}" required/>
                </div>
                <input type="hidden" name="token" value="{{csrf_token()}}">
                <div class='form-group row'>
                    <label class="col-md-4 col-form-label text-md-right" >Enter Email</label>
                    <input type="email" name='email' class="form-control col-md-6" value="{{ $input['email'] ?? '' }}" required/>
                </div>
                <div class='form-group row'>
                    <label class="col-md-4 col-form-label text-md-right">Enter Contact Number</label>
                    <input type="number" name='contact_number' class="form-control col-md-6" required/>
                </div>
                <div class='form-group row'>	
                    <label class="col-md-4 col-form-label text-md-right">From</label>	
                    <select class="form-control col-md-1" id="from" name='from'>	
                        <option value="">Select Area</option>	
                        @foreach($cities as $city)	
                            <option value="{{$city}}">{{$city}}</option>	
                        @endforeach	
                    </select>	
                </div>	
                <div class='form-group row'>	
                    <label class="col-md-4 col-form-label text-md-right">To</label>	
                    <select class="form-control col-md-1" id="to" name='to'>	
                        <option value="">Select Area</option>	
                        @foreach($cities as $city)	
                            <option value="{{$city}}">{{$city}}</option>	
                        @endforeach	
                    </select>	
                </div>	
                <div class='form-group row'>	
                    <label class="col-md-4 col-form-label text-md-right">Distance</label>	
                    <input type="number" name='distance' class="form-control col-md-6" required/>	
                </div>

                <div class='form-group row'>
                    <label class="col-md-4 col-form-label text-md-right" >Validity of Pass</label>
                    <select class="form-control col-md-6" id="plan" name='plan'>
                        <option value="2">2 months</option>
                        <option value="4">4 months</option>
                        <option value="6">6 months</option>
                        <option value="8">8 months</option>
                        <option value="12">12 months</option>
                    </select> 
                </div>
                <div class='form-group row'>
                    <label class="col-md-4 col-form-label text-md-right" >Upload Document</label>
                    <input type="file" name='file' class="form-control col-md-6" required/>	
                </div>
                <div class='form-group row'>
                    <label class="col-md-4 col-form-label text-md-right" >Make Payment</label>
                    <select class="form-control col-md-1" id="payment" name='payment'>
                        <option value="">Select Payment_mode</option>
                        @foreach($payment_mode as $id=>$value)
                            <option value="{{$id}}">{{$value}}</option>
                        @endforeach
                    </select>
                </div>
                <div id='upi' style="display: none">
                        <div class='form-group row'>
                            <label class="col-md-4 col-form-label text-md-right" >UPI url</label>
                            <input type="email" placeholder="example@upi.com" class="form-control col-md-6" />	
                        </div>
                </div>
                <div id='credit_card' style="display: none">
                        <div class='form-group row'>
                            <label class="col-md-4 col-form-label text-md-right" >Credit Card Number</label>
                            <input type="password" maxlength="14"  placeholder="XXXX-XXXX-XXXX-XXXX" name='card-number' class="form-control col-md-6" />	
                        </div>
                        <div class='form-group row'>
                            <label class="col-md-5 col-form-label text-md-right" >Expiration Date</label>
                            <div class='form-inline'>
                                <input type="number" maxlength="2"  placeholder="Month" name='month' class='date' />/	
                                <input type="number" maxlength="4" name='year' placeholder="Year"  class='date' />	
                            </div>
                        </div>
                        <div class='form-group row'>
                            <label class="col-md-4 col-form-label text-md-right" >CVV code</label>
                            <input type="input" maxlength="3" name='card-number' class="form-control col-md-6" />	
                        </div>
                </div>
                <div id='debit_card' style="display: none">
                        <div class='form-group row'>
                            <label class="col-md-4 col-form-label text-md-right" >Debit Card Number</label>
                            <input type="password" maxlength="14" placeholder="XXXX-XXXX-XXXX-XXXX" name='card-number' class="form-control col-md-6" />	
                        </div>
                        <div class='form-group row'>
                            <label class="col-md-5 col-form-label text-md-right" >Expiration Date</label>
                            <div class='form-inline'>
                                <input type="number" maxlength="2"  placeholder="Month" name='month' class='date' />/	
                                <input type="number" maxlength="4"  name='year' placeholder="Year"  class='date' />	
                            </div>
                        </div>
                        <div class='form-group row'>
                            <label class="col-md-4 col-form-label text-md-right" >CVV code</label>
                            <input type="input"  maxlength="3"  name='card-number' class="form-control col-md-6" />	
                        </div>
                </div>
                <div class='form-group row'>
                    <input type="submit" name='register' class=" form-button btn btn-black" value="Register and Genrate QR code"/>
                </div>
        </form>
    </div>
</div>
</div>