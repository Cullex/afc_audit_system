<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Investigations Register</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user" content="{{ json_encode($user) }}">
    <link rel="shortcut icon" href="images/fav.ico">
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <link href="/css/app.css" rel="stylesheet" type="text/css" />
</head>

<body data-layout="detached" class="loading">
<div id="app">
    <div class="navbar-custom topnav-navbar topnav-navbar-white">
        <div class="container-fluid">
            <a href="/" class="topnav-logo">
            <span class="topnav-logo-lg">
                <img src="images/logo_sm.png" alt="" height="65">
            </span>
                <span class="topnav-logo-sm">
                <img src="images/logo_sm.png" alt="" height="65">
            </span>
            </a>
            <ul class="list-unstyled topbar-right-menu float-right mb-0">
                <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <span class="account-user-avatar border border-primary rounded-circle">
                            <img src="{{ asset('images/avatar-1.jpg') }}" alt="user-image" class="rounded-circle">
                        </span>
                        <span>
                            <span class="account-user-name">{{ \Illuminate\Support\Str::limit(auth()->user()->name .' '. auth()->user()->last_name, 20 , '...')  }}</span>
                            <span class="account-position text-capitalize">{{ \Illuminate\Support\Str::limit( auth()->user()->email, 10 , '...')  }}</span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                        <router-link to="/settings" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-edit mr-1"></i>
                            <span>Settings</span>
                        </router-link>
                        <form id="logout-form" action="/logout" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a @click.prevent="logout" href="#" class="dropdown-item notify-item">
                            <i class="mdi mdi-logout mr-1"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>
            <a class="button-menu-mobile disable-btn">
                <div class="lines">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </a>
        </div>
    </div>
    <div style="margin-top: 70px" class="container-fluid">
        <div class="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu left-side-menu-detached">
                <ul class="metismenu side-nav py-4">
                    <li class="side-nav-title side-nav-item mt-2">Navigation</li>
                    <a href="/" class="side-nav-link">
                        <i class="uil-home-alt"></i>
                        <span class="badge badge-success float-right"></span>
                        <span> Dashboard </span>
                    </a>
                        <li class="side-nav-title side-nav-item mt-2">Menu</li>
                        <router-link to="/admin/addRecord" class="side-nav-link"  active-class="text-primary">
                            <i class="uil-comment-alt-plus"></i>
                            <span> Add Record </span>
                        </router-link>
                        <router-link to="/admin/reviewedRecords" class="side-nav-link"  active-class="text-primary">
                            <i class="uil-comment-alt-verify"></i>
                            <span> Reviewed Records</span>
                        </router-link>
                        <router-link to="/admin/currencyConvertor" class="side-nav-link"  active-class="text-primary">
                            <i class="uil-money-bill"></i>
                            <span> Rates Calculator </span>
                        </router-link>
                        <router-link to="/admin/notedRecords" class="side-nav-link"  active-class="text-primary">
                            <i class="uil-comment-alt-check"></i>
                            <span>Noted Records</span>
                        </router-link>
                        <router-link to="/users" class="side-nav-link"  active-class="text-primary">
                            <i class="uil-user"></i>
                            <span> Users Management </span>
                        </router-link>
                        <router-link to="/admin/accessUsers" class="side-nav-link"  active-class="text-primary">
                            <i class="uil-book-reader"></i>
                            <span> Roles Management </span>
                        </router-link>
                        <router-link to="/admin/allRecords" class="side-nav-link"  active-class="text-primary">
                            <i class="uil-bookmark-full"></i>
                            <span> All Records </span>
                        </router-link>
                        <router-link to="/admin/systemReports" class="side-nav-link"  active-class="text-primary">
                            <i class="uil-rss"></i>
                            <span> System Reports </span>
                        </router-link>
                    <div class="clearfix"></div>
                    <!-- Sidebar -left -->
                </ul>
            </div>
            <!-- Left Sidebar End -->

            <div style="margin-top: 30px" class="content-page">
                <div class="content">
                    @yield('content')
                </div>
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                ??{{ now()->format('Y') }}  {{ 'Developed By Sidney Richards | 071 376 4301' }}
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets/js/vendor.min.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
