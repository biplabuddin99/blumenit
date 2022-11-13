<div class="topbar-menu">
    <div class="container-fluid">
        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">
                <li class="has-submenu">
                    <a href="{{route(Session::get('identity').'.dashboard')}}"><i class="mdi mdi-view-dashboard"></i>Dashboard</a>
                </li>
                <li class="has-submenu">
                    <a href="{{route(Session::get('identity').'.manufacturer.index')}}"><i class="mdi mdi-factory"></i>Manufacturer</a>
                </li>
                <li class="has-submenu">
                    <a href="#"> <i class="mdi mdi-file-tree"></i>Category  <div class="arrow-down"></div></a>
                    <ul class="submenu megamenu">
                        <li>
                            <ul>
                                <li><a href="{{route(Session::get('identity').'.categoryy.index')}}">Category</a></li>
                                <li><a href="{{route(Session::get('identity').'.subcategory.index')}}">Sub Category</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="has-submenu">
                    <a href="{{route(Session::get('identity').'.product.index')}}"><i class="mdi mdi-monitor-cellphone-star"></i>Product</a>
                </li>
                <li class="has-submenu">
                    <a href="{{route(Session::get('identity').'.order.index')}}"><i class="mdi mdi-cart"></i>Order <span class="badge badge-pill badge-success">{{App\Models\Order::where('status',0)->count()}}</span></a>
                </li>
                <li class="has-submenu">
                    <a href="{{route(Session::get('identity').'.admincustomer.index')}}"><i class="mdi mdi-users"></i>Customer</a>
                </li>
                <li class="has-submenu">
                    <a href="{{route(Session::get('identity').'.corporate_setting_inq.list')}}"><i class="mdi mdi-users"></i>Corporate Inquiry</a>
                </li>

                <li class="has-submenu">
                    <a href="#">
                        <i class="mdi mdi-settings"></i>Setting <div class="arrow-down"></div></a>
                    <ul class="submenu">
                        <li class="has-submenu">
                            <a href="#">Home Page <div class="arrow-down"></div></a>
                            <ul class="submenu">
                                <li><a href="{{route(Session::get('identity').'.headerview.index')}}">Header</a></li>
                                <li><a href="{{route(Session::get('identity').'.header.index')}}">Logo</a></li>
                                <li><a href="{{route(Session::get('identity').'.company.index')}}">Home Section_1</a></li>
                                <li><a href="{{route(Session::get('identity').'.headersupport.index')}}">Home header support</a></li>
                                <li><a href="{{route(Session::get('identity').'.footersupport.index')}}">Home footer support</a></li>
                                <li><a href="{{route(Session::get('identity').'.homesec1.index')}}">Home Section 1</a></li>
                                <li><a href="{{route(Session::get('identity').'.homesec2.index')}}">Home Section 2</a></li>
                                <li><a href="{{route(Session::get('identity').'.homesec3.index')}}">Home Section 3</a></li>
                                <li><a href="{{route(Session::get('identity').'.homesec4.index')}}">Home Section 4</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="#">Footer<div class="arrow-down"></div></a>
                            <ul class="submenu">
                                <li>
                                    <a href="{{route(Session::get('identity').'.homefootcol1.index')}}">Footer 1st column</a>
                                </li>
                                <li>
                                    <a href="{{route(Session::get('identity').'.homefootcol4.index')}}">Footer 4th column</a>
                                </li>
                                <li>
                                    <a href="{{route(Session::get('identity').'.homefootsocial.index')}}">Footer Social</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="{{route(Session::get('identity').'.corporate_setting.index')}}">Corporate Settings</a></li>
                        <li><a href="{{route(Session::get('identity').'.slide.index')}}">Slide</a></li>
                        <li><a href="{{route(Session::get('identity').'.aboutsetting.edit')}}">About Us Setting</a></li>
                        <li><a href="{{route(Session::get('identity').'.admins.index')}}">Admin Users</a></li>
                        <li><a href="{{route(Session::get('identity').'.gs.edit')}}">General Settings</a></li>
                        <li><a href="{{route(Session::get('identity').'.shipping.index')}}">Shipping Settings</a></li>
                        <li><a href="{{route(Session::get('identity').'.categorysetting.edit')}}">Category Page Settings</a></li>
                        <li><a href="{{route(Session::get('identity').'.gamesetting.edit')}}">Gaming Page Settings</a></li>
                        <li><a href="{{route(Session::get('identity').'.phoneext.index')}}">Contact country code</a></li>
                        <li class="has-submenu">
                            <a href="#">Location<div class="arrow-down"></div></a>
                            <ul class="submenu">
                                <li><a href="{{route(Session::get('identity').'.country.index')}}">Country</a></li>
                                <li><a href="{{route(Session::get('identity').'.state.index')}}">State</a></li>
                                <li><a href="{{route(Session::get('identity').'.city.index')}}">City</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- End navigation menu -->
            <div class="clearfix"></div>
        </div><!-- end #navigation -->
    </div><!-- end container -->
</div><!-- end navbar-custom -->
</header>
<!-- End Navigation Bar-->
