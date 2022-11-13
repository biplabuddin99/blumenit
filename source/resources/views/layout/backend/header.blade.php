

<!-- Navigation Bar-->
<header id="topnav">
    <!-- Topbar Start -->
    <div class="navbar-custom">
        <div class="container-fluid">
            <ul class="list-unstyled topnav-menu float-right mb-0">

                <li class="dropdown notification-list">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle nav-link">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </li>

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{asset('asset/images/users/user-1.jpg')}}" alt="user-image" class="rounded-circle">
                        <span class="pro-user-name ml-1">
                        {{Session::get('identity')}} <i class="mdi mdi-chevron-down"></i> 
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>

                        <!-- item-->
                        <a href="{{route('superadmin.profile')}}" class="dropdown-item notify-item">
                            <i class="fe-user"></i>
                            <span>My Account</span>
                        </a>

                        <div class="dropdown-divider"></div>
                        <!-- item-->
                        <a href="{{route('logout')}}" class="dropdown-item notify-item">
                            <i class="fe-log-out"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="{{route(Session::get('identity').'.dashboard')}}" class="logo text-center">
                    <span class="logo-lg">
                        <img src="{{asset($head[0]->logo_image )}}" alt="" height="50px">
                    </span>
                    <span class="logo-sm">
                        <img src="{{asset($head[0]->favicon )}}" alt="" height="40px">
                    </span>
                </a>
            </div>

        </div> <!-- end container-fluid-->
    </div>
    <!-- end Topbar -->