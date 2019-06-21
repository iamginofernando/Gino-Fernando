<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title>Expense Manager</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Preview page of Metronic Admin Theme #1 for blank page layout" name="description" />
    <meta content="" name="author" />

    <link rel="shortcut icon" href="favicon.ico" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->

    <!-- Styles -->
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugin/metronic_v.4.7.5/theme/assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugin/metronic_v.4.7.5/theme/assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugin/metronic_v.4.7.5/theme/assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugin/metronic_v.4.7.5/theme/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet">
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ asset('plugin/metronic_v.4.7.5/theme/assets/global/plugins/bootstrap-toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{ asset('plugin/metronic_v.4.7.5/theme/assets/global/css/components.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugin/metronic_v.4.7.5/theme/assets/global/css/plugins.min.css') }}" rel="stylesheet">
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{ asset('plugin/metronic_v.4.7.5/theme/assets/layouts/layout/css/layout.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugin/metronic_v.4.7.5/theme/assets/layouts/layout/css/themes/darkblue.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugin/metronic_v.4.7.5/theme/assets/layouts/layout/css/custom.min.css') }}" rel="stylesheet">
    <!-- END THEME LAYOUT STYLES -->

    @yield('page-css')
</head>

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <div class="page-wrapper">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a style="font-size:18px;padding-top:10px" href="{{env('SITE_BASE')}}">
                        <span class="font-red-mint">Expense</span><span class="font-white">Manager</span></a>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
                </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <span class="username username-hide-on-mobile"> Logout </span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                        <li class="sidebar-toggler-wrapper hide">
                            <div class="sidebar-toggler">
                                <span></span>
                            </div>
                        </li>
                        <li>
                            <div style="text-align:center;">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRxhjevBsibLUCk5QOJ4xHn-F0wvmv9myNeRsxCX_fHwimASXmqFQ" alt="User's Profile" style="border-radius: 50% !important; height:100px; width: 100px;">
                                <p class="font-white">{{ Auth::user()->name }} <a class="font-white" style="padding: 5px;margin: 5px; border: 1px solid #fff; border-radius:50% !important;" data-toggle="modal" href="#manageaccount"><i class="icon-wrench"></i></a></p>
                            </div>

                        </li>
                        <li class="nav-item start ">
                            <a href="{{route('home')}}" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
                        @if(Auth::user()->role_id == 1)
                        <li class="nav-item start ">
                            <a href="#" class="nav-link nav-toggle">
                                <i class="icon-user"></i>
                                <span class="title">User Management</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item start ">
                                    <a href="{{route('role')}}" class="nav-link ">
                                        <i class="icon-users"></i>
                                        <span class="title">Roles</span>
                                    </a>
                                </li>
                                <li class="nav-item start ">
                                    <a href="{{route('users')}}" class="nav-link ">
                                        <i class="icon-user-follow"></i>
                                        <span class="title">Users</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        <li class="nav-item start ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-basket"></i>
                                <span class="title">Expense Management</span>
                                <span class="arrow"></span>
                            </a>

                            <ul class="sub-menu">
                                @if(Auth::user()->role_id == 1)
                                <li class="nav-item start ">
                                    <a href="{{route('expensecateg')}}" class="nav-link ">
                                        <i class="icon-basket-loaded"></i>
                                        <span class="title">Expense Categories</span>
                                    </a>
                                </li>
                                @endif
                                <li class="nav-item start">
                                    <a href="{{route('expense')}}" class="nav-link ">
                                        <i class="icon-basket"></i>
                                        <span class="title">Expenses</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->

            @yield('content')

        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner"> 2019 &copy By
                <a target="_blank" href="http://keenthemes.com">Gino Fernando</a>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->
    </div>
    @include('components.manageaccount')
    <!-- BEGIN CORE PLUGINS -->
    <script src="{{ asset('plugin/metronic_v.4.7.5/theme/assets/global/plugins/jquery.min.js') }}"></script>
    <script src="{{ asset('plugin/metronic_v.4.7.5/theme/assets/global/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugin/metronic_v.4.7.5/theme/assets/global/plugins/js.cookie.min.js') }}"></script>
    <script src="{{ asset('plugin/metronic_v.4.7.5/theme/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('plugin/metronic_v.4.7.5/theme/assets/global/plugins/jquery.blockui.min.js') }}"></script>
    <script src="{{ asset('plugin/metronic_v.4.7.5/theme/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{{ asset('plugin/metronic_v.4.7.5/theme/assets/global/scripts/app.min.js') }}"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('plugin/metronic_v.4.7.5/theme/assets/global/plugins/bootstrap-toastr/toastr.min.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="{{ asset('plugin/metronic_v.4.7.5/theme/assets/layouts/layout/scripts/layout.min.js') }}"></script>
    <script src="{{ asset('plugin/metronic_v.4.7.5/theme/assets/layouts/layout/scripts/demo.min.js') }}"></script>
    <script src="{{ asset('plugin/metronic_v.4.7.5/theme/assets/layouts/global/scripts/quick-sidebar.min.js') }}"></script>
    <script src="{{ asset('plugin/metronic_v.4.7.5/theme/assets/layouts/global/scripts/quick-sidebar.min.js') }}"></script>
    <script src="{{ asset('plugin/metronic_v.4.7.5/theme/assets/layouts/global/scripts/quick-nav.min.js') }}"></script>
    <!-- END THEME LAYOUT SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('plugin/metronic_v.4.7.5/theme/assets/pages/scripts/ui-toastr.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/manageaccount.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    @yield('page-script')

    <script>
        const SITE_BASE = ""; // For users using MAMP, populate application's location
        const BLANK = '';
        const currentUserId = "{{ Auth::user()->user_id }}";

        // for api token
        $.ajaxSetup({
            headers: {
                'Authorization': 'Bearer ' + '{{Auth::user()->api_token}}'
            }
        });
    </script>
</body>

</html>