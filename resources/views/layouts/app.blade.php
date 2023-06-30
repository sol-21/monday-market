<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Monday Market</title>
    <!-- loader-->
    <link href="{{ asset('admin/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('admin/js/pace.min.js') }}"></script>
    <!--favicon-->
    <link rel="icon" href="{{ asset('admin/images/favicon.ico') }}" type="image/x-icon" />
    <!-- Vector CSS -->
    <link href="{{ asset('admin/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <!-- simplebar CSS-->
    <link href="{{ asset('admin/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <!-- Bootstrap core CSS-->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="{{ asset('admin/css/animate.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="{{ asset('admin/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <!-- Sidebar CSS-->
    <link href="{{ asset('admin/css/sidebar-menu.css') }}" rel="stylesheet" />
    <!-- Custom Style-->
    <link href="{{ asset('admin/css/app-style.css') }}" rel="stylesheet" />
</head>

<body class="bg-theme bg-theme1">
    <!-- Start wrapper-->

    <div id="wrapper">
        <!--Start sidebar-wrapper-->
        <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
            <div class="brand-logo">
                <a href="index.html">
                    <img src="{{ asset('admin/images/logo-icon.png') }}" class="logo-icon" alt="logo icon" />
                    <h5 class="logo-text">Monday Market</h5>
                </a>
            </div>
            <ul class="sidebar-menu do-nicescrol">
                <li class="sidebar-header">Navigations</li>
                <li>
                    <a href="{{ route('home') }}">
                        <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('products.create') }}">
                        <i class="zmdi zmdi-format-list-bulleted"></i> <span>Add Product</span>
                    </a>
                </li>

                
                <li>
                    <a href="{{ route('announcement.create') }}">
                        <i class="zmdi zmdi-face"></i> <span>Send Notification</span>
                    </a>
                </li>

                
            </ul>
        </div>
        <!--End sidebar-wrapper-->

        <!--Start topbar header-->
        <header class="topbar-nav">
            <nav class="navbar navbar-expand fixed-top">
                <ul class="navbar-nav mr-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link toggle-menu" href="javascript:void();">
                            <i class="icon-menu menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">

                        <form class="search-bar d-flex justify-content-between align-items-center" action="{{route('products.adminsearch') }}" method='GET'>
                            @csrf
                            <input type="search" name='search' class="form-control" placeholder="Enter keywords" />
                           <button class="btn "  type='submit'><i class="icon-magnifier text-white"></i></button>
                        </form>
                    </li>
                </ul>

                <ul class="navbar-nav align-items-center right-nav-link">

                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown"
                            href="#">
                            <span class="user-profile"><img src="https://via.placeholder.com/110x110" class="img-circle"
                                    alt="user avatar" /></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item user-details">
                                <a href="javaScript:void();">
                                    <div class="media">
                                        <div class="avatar">
                                            <img class="align-self-start mr-3" src="https://via.placeholder.com/110x110"
                                                alt="user avatar" />
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mt-2 user-title">Sarajhon Mccoy</h6>
                                            <p class="user-subtitle">mccoy@example.com</p>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li class="dropdown-divider"></li>

                            <li class="dropdown-item">

                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>

                        </ul>
                    </li>
                </ul>
            </nav>
        </header>
        <!--End topbar header-->

        <div class="clearfix"></div>

        <div class="content-wrapper">

            <div class="container-fluid">

                <!--Start Dashboard Content-->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">X</a>
                        <strong>{{ session('success') }}</strong>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-warning alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">X</a>
                        <strong>{{ session('error') }}</strong>
                    </div>
                @endif

                @yield('content')

                <!--End Dashboard Content-->

                <!--start overlay-->
                <div class="overlay toggle-menu"></div>
                <!--end overlay-->
            </div>
            <!-- End container-fluid-->
        </div>
        <!--End content-wrapper-->
        <!--Start Back To Top Button-->
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i>
        </a>
        <!--End Back To Top Button-->

        <!--Start footer-->
        {{-- <footer class="footer">
            <div class="container">
                <div class="text-center">Copyright © 2018 Dashtreme Admin</div>
            </div>
        </footer> --}}
        <!--End footer-->

        <!--start color switcher-->
        <div class="right-sidebar">
            <div class="switcher-icon">
                <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
            </div>
            <div class="right-sidebar-content">
                <p class="mb-0">Gaussion Texture</p>
                <hr />

                <ul class="switcher">
                    <li id="theme1"></li>
                    <li id="theme2"></li>
                    <li id="theme3"></li>
                    <li id="theme4"></li>
                    <li id="theme5"></li>
                    <li id="theme6"></li>
                </ul>

                <p class="mb-0">Gradient Background</p>
                <hr />

                <ul class="switcher">
                    <li id="theme7"></li>
                    <li id="theme8"></li>
                    <li id="theme9"></li>
                    <li id="theme10"></li>
                    <li id="theme11"></li>
                    <li id="theme12"></li>
                    <li id="theme13"></li>
                    <li id="theme14"></li>
                    <li id="theme15"></li>
                </ul>
            </div>
        </div>
        <!--end color switcher-->
    </div>
    <!--End wrapper-->

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>

    <!-- simplebar js -->
    <script src="{{ asset('admin/plugins/simplebar/js/simplebar.js') }}"></script>
    <!-- sidebar-menu js -->
    <script src="{{ asset('admin/js/sidebar-menu.js') }}"></script>
    <!-- loader scripts -->
    <script src="{{ asset('admin/js/jquery.loading-indicator.js') }}"></script>
    <!-- Custom scripts -->
    <script src="{{ asset('admin/js/app-script.js') }}"></script>
    <!-- Chart js -->

    <script src="{{ asset('admin/plugins/Chart.js/Chart.min.js') }}"></script>

    <!-- Index js -->
    <script src="{{ asset('admin/js/index.js') }}"></script>
</body>

</html>
