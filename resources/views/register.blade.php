<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    </head>
    <body>
            <div class="sidenav">
                <div class="login-main-text">
                    <h2><b>Welcome to</b><br> Bus Pass Online Portal</h2>
                    <p>Registration Page</p>
                </div>
            </div>
            <div class="main">
            <h2 class='form-heading'>Register</h3>
                <form method="post" action="{{ url('/addUser')}}">
                {{ csrf_field() }}
                    <h6>{{ $error ?? '' }}</h6>
                    <div class='form-group'>
                        <label>Enter Bus Id</label>
                        <input type="number" name='id' class="form-control" value="{{ $input['id'] ?? '' }}" required/>
                    </div>
                    <div class='form-group'>
                        <label>Enter your name</label>
                        <input type="text" name='name' class="form-control" value="{{ $input['name'] ?? '' }}" required/>
                    </div>
                    <input type="hidden" name="token" value="{{csrf_token()}}">
                    <div class='form-group'>
                        <label>Enter Email</label>
                        <input type="email" name='email' class="form-control" value="{{ $input['email'] ?? '' }}" required/>
                    </div>
                    <div class='form-group'>
                        <label>Enter Password</label>
                        <input type="password" name='password' class="form-control" required/>
                    </div>
                    
                    <div class='form-group'>
                        <label>Re-Enter Password</label>
                        <input type="password" name='re-enter-password' class="form-control" required/>
                        <span class="alert-danger">{{ $password ?? '' }}</span>
                    </div>
                    <div class='form-group'>
                        <input type="submit" name='register' class="btn btn-black" value="Register"/>
                    </div>
                </form>
                <a href="{{url('/')}}">back to Login</a>
            </div>
    </body>
</html>
