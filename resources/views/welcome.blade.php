<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    </head>
    <body>
            <div class="sidenav">
                <div class="login-main-text">
                    <h2><b>Welcome to</b><br> Bus Pass Online Portal</h2>
                    <p>Login Landing Page</p>
                </div>
            </div>
            <div class="main">
                @if(isset(Auth::user()->email))
                    <script>
                        window.location="/dashboard";
                    </script>
                @endif
                <h2 class='form-heading'>Login</h3>
                @if($message ?? ''== Session::get('error'))
                    <div class="alert alert-success">
                       <span>{{ $message ?? '' }}</span>
                    </div>
                @endif

                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        <u1>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </u1>
                    </div>
                @endif
                <form method="post" action="{{ url('/checklogin')}}">
                    {{ csrf_field() }}
                    <div class='form-group'>
                        <label>Enter Email</label>
                        <input type="email" name='email' class="form-control"/>
                    </div>
                    <div class='form-group'>
                        <label>Enter Password</label>
                        <input type="password" name='password' class="form-control"/>
                    </div>
                    <div class='form-group'>
                        <input type="submit" name='login' class="btn btn-black" value="Login"/>
                    </div>
                </form>
                <a href="{{url('/register')}}" class="btn btn-secondary">Register</a>
            </div>
    </body>
</html>
