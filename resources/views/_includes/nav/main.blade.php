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
                   <span class="nav-toggle">
                      <span></span>
                      <span></span>
                      <span></span>
                    </span>
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
                        <a class="navbar-link">Hey {{ Auth::user()->name }}</a>
                        <div class="navbar-dropdown is-right" style="overflow: visible;" >
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
                        <a href="{{route('manage.dashboard')}}" class="navbar-item">
                        <span class="icon">
                        <i class="fa fa-fw fa-cog m-r-5"></i>
                        </span>Manage
                        </a>
                        <hr class="navbar-divider">
                        <a href="{{route('logout')}}" class="navbar-item" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        <span class="icon">
                             <i class="fa fa-fw fa-sign-out m-r-5"></i>
                           </span>
                            Logout
                        </a>
                         @include('_includes.forms.logout')
                        </div>
                    @endif
            </div>
        </nav>