<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ZTIMS</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/glyphicons-halflings-regular.ttf')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/landing-page.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome/css/font-awesome.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/tables/datatables.min.css')}}"/>

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom CSS Javascript Plugin -->
    <!-- JavaScripts -->
    <script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/tables/datatables.min.js')}}"></script>

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-static topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="{{url('/')}}">ZTMIS</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <!-- Left Side Of Navbar -->
            @if (Auth::guest())
            @else
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a id="dLabel" data-target="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Customer Requests
                            <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dLabel">
                            <li><a href="{{ route('dp.application.create') }}">Apply for DP</a></li>
                            <li><a href="{{ url('dp/application/customers/index') }}">My Applications</a></li>
                            @role('customer-care')
                            <li><a href="{{ url('dp/application/index') }}">DP Applications</a></li>
                            @endrole
                            @permission('general')
                            <li><a href="{{ url('/my-tickets') }}">My Tickets</a></li>
                            @endpermission
                            @role('customer-care')
                            <li><a href="{{ url('tickets') }}">Assign Tickets</a></li>
                            @endrole
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a id="dLabel" data-target="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Fault Reporting
                            <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dLabel">
                            <li><a href="{{ url('fault/application') }}">My Reported Faults</a></li>
                            <li><a href="{{ url('fault/application/create') }}">Report a Fault</a></li>
                            @role('customer-care')
                            <li><a href="{{ url('fault/application/index') }}">Reported Faults</a></li>
                            @endrole
                            @permission('general')
                            <li><a href="{{ route('faults.tickets') }}">My Tickets</a></li>
                            @endpermission
                            @role('customer-care')
                            <li><a href="{{ url('fault/application/assign/tickets') }}">Assign Tickets</a></li>
                            @endrole
                        </ul>
                    </li>
                    @role('admin')
                    <li class="dropdown">
                        <a id="dLabel" data-target="#" href="http://example.com" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Distribution Points
                            <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dLabel">
                            <li><a href="{{ route('dp.index') }}">Manage Distribution Points</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a id="dLabel" data-target="#" href="http://example.com" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Administration
                            <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dLabel">
                            <li><a href="{{ url('/users') }}">User Management</a></li>
                            <li><a href="{{ url('/roles') }}">Role Management</a></li>
                            <li><a href="{{ url('/reports') }}">Reports</a></li>
                        </ul>
                    </li>
                    @endrole
                    @role('customer-care')
                    <li><a href="{{ url('/clients') }}">Customer Management</a></li>
                    @endrole
                </ul>
            @endif
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <div class="container">
        @yield('content')
    </div>
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#about">About</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#services">Services</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#contact">Contact</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; ZTMIS 2017. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
