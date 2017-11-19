@extends('layouts.dash')
@section('content')
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="{{asset('images/sidebar-5.jpg')}}">
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
                <li>
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
                <li class="active">
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
                    <a class="navbar-brand" href="#">Notifications</a>
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
                                    <b class="caret hidden-sm hidden-xs"></b>
                                    <span class="notification hidden-sm hidden-xs">5</span>
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
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Notifications</h4>
                        <p class="category">Handcrafted by our friend <a target="_blank" href="https://github.com/mouse0270">Robert McIntosh</a>. Please checkout the <a href="http://bootstrap-notify.remabledesigns.com/" target="_blank">full documentation.</a></p>

                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Notifications Style</h5>
                                <div class="alert alert-info">
                                    <span>This is a plain notification</span>
                                </div>
                                <div class="alert alert-info">
                                    <button type="button" aria-hidden="true" class="close">×</button>
                                    <span>This is a notification with close button.</span>
                                </div>
                                <div class="alert alert-info alert-with-icon" data-notify="container">
                                    <button type="button" aria-hidden="true" class="close">×</button>
                                    <span data-notify="icon" class="pe-7s-bell"></span>
                                    <span data-notify="message">This is a notification with close button and icon.</span>
                                </div>
                                <div class="alert alert-info alert-with-icon" data-notify="container">
                                    <button type="button" aria-hidden="true" class="close">×</button>
                                    <span data-notify="icon" class="pe-7s-bell"></span>
                                    <span data-notify="message">This is a notification with close button and icon and have many lines. You can see that the icon and the close button are always vertically aligned. This is a beautiful notification. So you don't have to worry about the style.</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5>Notification states</h5>
                                <div class="alert alert-info">
                                    <button type="button" aria-hidden="true" class="close">×</button>
                                    <span><b> Info - </b> This is a regular notification made with ".alert-info"</span>
                                </div>
                                <div class="alert alert-success">
                                    <button type="button" aria-hidden="true" class="close">×</button>
                                    <span><b> Success - </b> This is a regular notification made with ".alert-success"</span>
                                </div>
                                <div class="alert alert-warning">
                                    <button type="button" aria-hidden="true" class="close">×</button>
                                    <span><b> Warning - </b> This is a regular notification made with ".alert-warning"</span>
                                </div>
                                <div class="alert alert-danger">
                                    <button type="button" aria-hidden="true" class="close">×</button>
                                    <span><b> Danger - </b> This is a regular notification made with ".alert-danger"</span>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="places-buttons">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 text-center">
                                    <h5>Notifications Places
                                        <p class="category">Click to view notifications</p>
                                    </h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 col-md-offset-3">
                                    <button class="btn btn-default btn-block" onclick="demo.showNotification('top','left')">Top Left</button>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-default btn-block" onclick="demo.showNotification('top','center')">Top Center</button>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-default btn-block" onclick="demo.showNotification('top','right')">Top Right</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 col-md-offset-3">
                                    <button class="btn btn-default btn-block" onclick="demo.showNotification('bottom','left')">Bottom Left</button>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-default btn-block" onclick="demo.showNotification('bottom','center')">Bottom Center</button>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-default btn-block" onclick="demo.showNotification('bottom','right')">Bottom Right</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


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




    
@endsection