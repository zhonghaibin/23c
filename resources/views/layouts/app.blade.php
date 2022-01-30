<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta property="lang" content="en"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=no,
    width=device-width,initial-scale=1.0" />
    <link href="{{ asset('assets/css/app.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/bootstrap.css')}}"  rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/icons.min.css')}}"  rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/libs/custombox/custombox.min.css')}}" rel="stylesheet">
    <script src="{{ asset('assets/js/vue.js')}}" ></script>
    <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.6/dist/clipboard.min.js"></script>
    <style type="text/css">
        [v-cloak] {
            display: none;
        }
    </style>
</head>
<body>

<div id="wrapper">
    <div class="navbar-custom">
        <div class="logo-box"></div>
        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile disable-btn waves-effect">
                    <i class="fe-menu"></i>
                </button>
            </li>
            <li>
                <h4 class="page-title-main"></h4>
            </li>
        </ul>
    </div>
    <div class="left-side-menu">
        <div class="slimscroll-menu">
            <div class="user-box text-center">
                <a href="/">   <img src="./images/logo.jpg" alt="user-img" title="Mat Helme"
                                    class="img-thumbnail avatar-lg"></a>


                <div class="dropdown" data-toggle="tooltip" data-placement="bottom" title="Edit profile">
                    <a href="" class="text-dark h5 mt-2 mb-1 d-block">
                        @if (Auth::check())
                        {{Auth::user()->user_id}}
                        @endif
                    </a>
                    <div class="dropdown-menu user-pro-dropdown">
                    </div>
                </div>
                <div class="text-muted">
                    @if (Auth::check())
                    {{Auth::user()->rank_name}}
                    @endif
                </div>

                    <ul class="list-inline" style="font-size: 25px;margin-bottom: 0px !important;">
                        <li class="list-inline-item">
                            <a href="{{ route('profileMaintenance') }}" class="text-muted">
                                <i class="mdi mdi-settings" data-toggle="tooltip" data-placement="bottom"
                                   title="Change Password & Support No"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();  document.getElementById('logout-form').submit();"
                               class="text-custom">
                                <i class="mdi mdi-power" data-toggle="tooltip" data-placement="bottom" title="Logout"></i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>


            </div>

            <div id="sidebar-menu">
                <ul class="metismenu" id="side-menu">
                    <li class="menu-title">Navigation</li>
                    <li>
                        <a href="{{ route('inbox') }}">
                            <i class="mdi mdi-email-variant"></i>
                            <span> Inbox </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('registrationLink') }}">
                            <i class="mdi mdi-console-line"></i>
                            <span> Create Registration Link </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('registration') }}">
                            <i class="mdi mdi-account"></i>
                            <span> Registration </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('agentListing') }}">
                            <i class="mdi mdi-account-group"></i>
                            <span> Agent Listing </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('appointment') }}">
                            <i class="mdi mdi-phone"></i>
                            <span> Appointment </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('salesReport') }}">
                            <i class="mdi mdi-folder"></i>
                            <span> Sales Report </span>
                        </a>
                    </li>
                    @if (Auth::check() &&Auth::user()->rank==1)
                        <li>
                            <a href="{{ route('administration') }}">
                                <i class="mdi mdi-access-point"></i>
                                <span> Administration </span>
                            </a>
                        </li>
                    @endif

                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div id="app" class="content-page">
        @yield('content')
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        © 2021－2022 23csolutions.com
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="./assets/js/jquery/jquery-1.11.1.min.js"></script>
<script src="./assets/js/vendor.min.js"></script>
<script src="./assets/js/app.min.js"></script>
<script src="./assets/libs/custombox/custombox.legacy.min.js"></script>
<script src="./assets/libs/custombox/custombox.min.js"></script>
@yield('script')
</body>
</html>
