<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Health Monitoring System') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar has-shadow">
            <div class="container">
                <div class="navbar-brand">
                    <a class="navbar-item is-paddingless brand-item" href="{{route('home')}}">
                        <img src="{{asset('images/hms-logo.png')}}" alt="HMS logo" width="200px" height="50px">
                    </a>
                    <a class="navbar-item is-tab is-hidden-mobile m-l-10" href="#">About</a>
                    <a class="navbar-item is-tab is-hidden-mobile" href="#">Solution</a>
                    <a class="navbar-item is-tab is-hidden-mobile" href="#">Events</a>
                    <a class="navbar-item is-tab is-hidden-mobile" href="#">Resources</a>
                    <a class="navbar-item is-tab is-hidden-mobile" href="#">Contact Us</a>
                </div>

                <div class="navbar-menu">
                    <div class="navbar-start">
                    <a class="navbar-item is-tab is-hidden-tablet is-active" href="#">About</a>
                    <a class="navbar-item is-tab is-hidden-tablet" href="#">Solution</a>
                    <a class="navbar-item is-tab is-hidden-tablet" href="#">Resources</a>
                    <a class="navbar-item is-tab is-hidden-tablet" href="#">Contact Us</a>
                    </div>
                    @if(Auth::guest())
                        <a href="{{ route('login') }}" class="navbar-item is-tab">Login</a>
                        <a href="{{ route('register') }}" class="navbar-item is-tab">Sign up</a>
                    @else
                        <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">Hey Seliem</a>
                        <div class="navbar-dropdown is-right" >
                        <a href="#" class="navbar-item">
                        <span class="icon">
                        <i class="fa fa-fw fa-user-circle-o m-r-5"></i>
                        </span>Profile
                        </a>

                        <a href="#" class="navbar-item">
                        <span class="icon">
                        <i class="fa fa-fw fa-bell m-r-5"></i>
                        </span>Notifications
                        </a>
                        <a href="#" class="navbar-item">
                        <span class="icon">
                        <i class="fa fa-fw fa-cog m-r-5"></i>
                        </span>Manage
                        </a>
                        <hr class="navbar-divider">
                        <a href="#" class="navbar-item">
                        <span class="icon">
                         <i class="fa fa-fw fa-sign-out m-r-5"></i>
                        </span>
                         Logout
                         </a>
                        </div>
                    @endif
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
