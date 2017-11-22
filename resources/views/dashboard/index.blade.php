@extends('layouts.dash')
@section('content')
    <div class="wrapper">
        <div class="sidebar" data-color="blue" data-image="{{asset('images/sidebar-5.jpg')}}">
        <!--
            Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
            Tip 2: you can also add an image using data-image tag
        -->
        <div class="sidebar-wrapper">
            <div class="logo">
                <h3 href="{{url('/')}}" style="font-size: 20px;"> Health Monitoring System</h3>
                <h3 style="font-size: 10px;"> We care about your Health.</h3>
            </div>
                <ul class="nav">
                <li class="active">
                    <a href="{{url('/user/dashboard')}}">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="{{url('/user/profile')}}">
                        <i class="pe-7s-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li>
                    <a href="{{url('/user/list')}}">
                        <i class="pe-7s-note2"></i>
                        <p>Lists</p>
                    </a>
                </li>
                <li>
                    <a href="{{url('/user/maps')}}">
                        <i class="pe-7s-map-marker"></i>
                        <p>Maps</p>
                    </a>
                </li>
                <li>
                    <a href="{{url('/user/notifications')}}">
                        <i class="pe-7s-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
            <nav class="navbar navbar-default navbar-fixed">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Dashboard</a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-dashboard"></i>
                                    <p class="hidden-lg hidden-md">Dashboard</p>
                                </a>
                            </li>
                            <li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-globe"></i>
                                        <b class="caret hidden-lg hidden-md"></b>
                                        <p class="hidden-lg hidden-md">
                                            5 Notifications
                                            <b class="caret"></b>
                                        </p>
                                  </a>
                                  <ul class="dropdown-menu">
                                    <li><a href="#">Notification 1</a></li>
                                    <li><a href="#">Notification 2</a></li>
                                    <li><a href="#">Notification 3</a></li>
                                    <li><a href="#">Notification 4</a></li>
                                    <li><a href="#">Another notification</a></li>
                                  </ul>
                            </li>
                            <li>
                               <a href="">
                                    <i class="fa fa-search"></i>
                                    <p class="hidden-lg hidden-md">Search</p>
                                </a>
                            </li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li>
                               <a href="{{ route('contact') }}">
                                   <p>Contact Us</p>
                                </a>
                            </li>
                            <li class="dropdown">
                                  <a href="#" class="dropdown-toggle is-hoverable" data-toggle="dropdown">
                                        <p>
                                            Hey {{ Auth::user()->name }}
                                            <b class="caret"></b>
                                        </p>

                                  </a>

                                  <ul class="dropdown-menu">
                                    @guest
                                        <li><a href="{{ route('login') }}">Login</a></li>
                                        <li><a href="{{ route('register') }}">Sign up</a></li>
                                    @else
                                    <li><a href="{{url('/user/dashboard')}}">
                                    <span class="icon">
                                    <i class="fa fa-fw fa-tachometer"></i>
                                    </span>Dashboard
                                    </a></li>
                                    <li>
                                    <a href="{{route('manage.dashboard')}}">
                                    <span class="icon">
                                    <i class="fa fa-fw fa-cog"></i>
                                    </span>Manage
                                    </a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                     @endguest
                                  </ul>
                            </li>
                            <li>
                                <a href="{{route('logout')}}" class="navbar-item" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                <span class="icon">
                                     <i class="fa fa-fw fa-sign-out m-r-5"></i>
                                   </span>
                                    Log out
                                </a>
                                 @include('_includes.forms.logout')
                            </li>
                            <li class="separator hidden-lg"></li>
                        </ul>
                    </div>
                </div>
            </nav>
        @if((Auth::user()->role=="Doctor"))
        @include('_includes.doctor.index')
        @elseif((Auth::user()->role=="Pharmacist"))
        @include('_includes.pharmacist.index')
        @else
        @include('_includes.user.index')
        @endif

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="{{url('/')}}">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="https://github.com/MohamedSeliem/hms">
                                git hub
                            </a>
                        </li>
                        <li>
                            <a href="https://github.com/MohamedSeliem/hms/blob/master/README.md">
                                Documentation
                            </a>
                        </li>
                        <li>
                            <a href="https://github.com/MohamedSeliem/HttpClient">
                                Android Application
                            </a>
                        </li>
                        <li>
                            <a href="https://people.cmix.louisiana.edu/~c00302008/">
                               About Us
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> ,Welcome to HMS Dashboard - We take care of you.
                </p>
            </div>
        </footer>

        </div>
    </div>
@endsection
