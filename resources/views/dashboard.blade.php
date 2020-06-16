<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Dashboard</title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="{{asset('css/custom.css')}}">

         <!-- jQuery CDN -->
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
            <!-- Bootstrap Js CDN -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>
    <body>
        @if(isset(Auth::user()->email))
            <div class="wrapper sidebar-color">
                <!-- Sidebar Holder -->
                <nav id="sidebar" >
                    <div class="sidebar-header ">
                        <h3 class="text-center">Bus Pass Portal
                        </h3>
                        <strong>BPP</strong>
                    </div>

                    <ul class="list-unstyled components">
                        <li>
                            <a href="/dashboard">
                                <i class="pe-7s-graph"></i>
                                Home 
                            </a>
                        </li>
                        <li class="active">
                            <a href="#bookSubmenu" data-toggle="collapse" aria-expanded="false">
                                <i class="glyphicon glyphicon-list-alt"></i>
                                Pass Section
                            </a>
                            <ul class="collapse list-unstyled" id="bookSubmenu">
                                <li>
                                <a href="/pass">
                                    <i class="glyphicon glyphicon-plus"></i>
                                    Create Pass
                                </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#catSubmenu" data-toggle="collapse" aria-expanded="false">
                                <i class="glyphicon glyphicon-user"></i>
                                Passenger Details
                            </a>
                            <ul class="collapse list-unstyled" id="catSubmenu">
                                <li>
                                <a href="/listing/student">
                                    <i class="glyphicon glyphicon-education"></i>
                                    Students
                                </a>
                                </li>
                                <li>
                                <a href="/listing/employee">
                                    <i class="glyphicon glyphicon-list"></i>
                                    Employees
                                </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="/about">
                                <i class="glyphicon glyphicon-font"></i>
                                About 
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/logout')}}">
                                <i class="glyphicon glyphicon-remove"></i>
                                Logout User
                            </a>
                        </li>
                    </ul>
                </nav>

                <!-- Page Content Holder -->
                <div id="content">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <span><b>Bus Pass Portal</b></span>
                                <span class="navbar-right" >
                                    <a href="{{url('/logout')}}">
                                        Logout User
                                    </a>
                                </span>
                            </div>
                        </div>
                    </nav>
                    <div class="mainContentArea">
                    @if (Request::path() == 'dashboard')
                        @include('home')
                    @endif
                    @yield('content')
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#sidebarCollapse').on('click', function () {
                        $('#sidebar').toggleClass('active');
                    });
                });
            </script>
        @else
                <script>window.location="/";</script>
        @endif
    </body>
</html>
