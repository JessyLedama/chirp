<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
    <head>
        <title>
            Dashboard | CTA 101
        </title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- bootstrap-css -->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" >
        <!-- //bootstrap-css -->
        <!-- Custom CSS -->
        <link href="{{ asset('assets/css/style.css') }}" rel='stylesheet' type='text/css' />
        <link href="{{ asset('assets/css/style-responsive.css') }}" rel="stylesheet"/>
        <link href="{{ asset('css/dashboard.css') }}" rel='stylesheet' type='text/css' />
        <!-- font CSS -->
        <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <!-- font-awesome icons -->
        <link rel="stylesheet" href="{{ asset('assets/css/font.css') }}" type="text/css"/>
        <link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet"> 
        <link rel="stylesheet" href="{{ asset('assets/css/morris.css') }}" type="text/css"/>
        <!-- calendar -->
        <link rel="stylesheet" href="{{ asset('assets/css/monthly.css') }}">
        <!-- //calendar -->
        <!-- //font-awesome icons -->
        <script src="{{ asset('assets/js/jquery2.0.3.min.js') }}"></script>
        <script src="{{ asset('assets/js/raphael-min.js') }}"></script>
        <script src="{{ asset('assets/js/morris.js') }}"></script>
    </head>
    <body>
        <section id="container">
            <!--header start-->
            <header class="header fixed-top clearfix">
                <!--logo start-->
                <div class="brand">
                    <a href="{{ route('chirps') }}" class="logo">
                        <img src="{{ asset('images/logo.png') }}" alt="" class="dash-logo">
                    </a>
                    <div class="sidebar-toggle-box">
                        <div class="fa fa-bars"></div>
                    </div>
                </div>
                <!--logo end-->

                <div class="top-nav clearfix">
                    <!--search & user info start-->
                    <ul class="nav pull-right top-menu">
                        <li>
                            <input type="text" class="form-control search" placeholder=" Search">
                        </li>
                        <!-- user login dropdown start-->
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <img alt="" src="images/2.png">
                                <span class="username">John Doe</span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu extended logout">
                                <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                                <li><a href="login.html"><i class="fa fa-key"></i> Log Out</a></li>
                            </ul>
                        </li>
                        <!-- user login dropdown end -->
                    
                    </ul>
                    <!--search & user info end-->
                </div>
            </header>
            <!--header end-->
            <!--sidebar start-->
            <aside>
                <div id="sidebar" class="nav-collapse">
                    <!-- sidebar menu start-->
                    <div class="leftside-navigation">
                        <ul class="sidebar-menu" id="nav-accordion">
                            <li>
                                <a id="dash" class="admin-link" href="{{ route('dashboard') }}">
                                    <i class="fa fa-dashboard"></i>
                                    <span>
                                        Dashboard
                                    </span>
                                </a>
                            </li>
                            
                            <li class="sub-menu">
                                <a class="admin-link" href="javascript:;">
                                    <i class="fa fa-book"></i>
                                    <span>
                                        Video Categories
                                    </span>
                                </a>

                                <ul class="sub">
                                    <li>
                                        <a class="admin-link" href="{{ route('admin.categories.index') }}">
                                            All Video Categories
                                        </a>
                                    </li>
                                    
                                    <li>
                                        <a class="admin-link" href="{{ route('admin.categories.create') }}">
                                            New Video Category
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-video-camera"></i>
                                    <span>
                                        Videos
                                    </span>
                                </a>

                                <ul class="sub">
                                    <li>
                                        <a class="admin-link" href="{{ route('admin.videos.index') }}">
                                            All Videos
                                        </a>
                                    </li>
                                    
                                    <li>
                                        <a class="admin-link" href="{ route('admin.videos.create') }}">
                                            New Video
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a class="admin-link" href="{{ route('admin.orders.index') }}">
                                    <i class="fa fa-shopping-cart"></i>
                                    Orders
                                </a>
                            </li>

                            <li>
                                <a class="admin-link" href="{{ route('admin.users.index') }}">
                                    <i class="fa fa-users"></i>
                                    Members
                                </a>
                            </li>

                            <li>
                                <a class="admin-link" href="{{ route('chirps') }}">
                                    <i class="fa fa-home"></i>
                                    <span>Home Page</span>
                                </a>
                            </li>
                        </ul>            </div>
                    <!-- sidebar menu end-->
                </div>
            </aside>
            <!--sidebar end-->