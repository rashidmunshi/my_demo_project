<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/css/icons.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/libs/datatables/dataTables.bootstrap4.css') }}" type="text/css">

<link rel="stylesheet" href="{{ asset('assets/libs/datatables/buttons.bootstrap4.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/libs/datatables/select.bootstrap4.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/libs/datatables/responsive.bootstrap4.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/libs/ladda/ladda-themeless.min.css') }}" type="text/css">
<link rel="stylesheet" href="//cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
@yield('css')
<div>


    <!-- Topbar Start -->
    <div class="navbar-custom">
        <ul class="list-unstyled topnav-menu float-right mb-0">
            <li class="d-none d-sm-block">
                <form class="app-search">
                    <div class="app-search-box">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search...">
                            <div class="input-group-append">
                                <button class="btn" type="submit">
                                    <i class="fe-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </li>
            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{ asset('upload/image/'. Auth::user()->image) }}" alt="user-image" class="rounded-circle">
                    <span class="pro-user-name ml-1">
                        {{ Auth::user()->fullname }} <i class="mdi mdi-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <!-- item-->
                    <a href="{{ route('admin.updateform') }}" class="dropdown-item notify-item">
                        <i class="fe-user"></i>
                        <span>Edit Profile</span>
                    </a>

                    <!-- item-->
                    <a href="{{ route('admin.changepass') }}" class="dropdown-item notify-item">
                        <i class="fe-settings"></i>
                        <span>Change Password</span>
                    </a>

                    <!-- item-->
                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <a href="{{ route('admin.logout') }}" class="dropdown-item notify-item">
                        <i class="fe-log-out"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </li>
        </ul>

        <!-- LOGO -->
        <div class="logo-box mt-3">
            <a href="index.html" class="logo text-center">
                <span class="logo-lg ">
                    <img src={{ URL::asset('assets/images/logo-light.png') }} alt="" height="18">
                    <!-- <span class="logo-lg-text-light">UBold</span> -->
                </span>
                <span class="logo-sm">
                    <!-- <span class="logo-sm-text-dark">U</span> -->
                    <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="24">
                </span>
            </a>
        </div>
        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="fe-menu"></i>
                </button>
            </li>
        </ul>
    </div>
    <!-- end Topbar -->

    <!-- ========== Left Sidebar Start ========== -->

    <!-- End Sidebar -->

    <div class="clearfix"></div>

    <!-- Sidebar -left -->

</div>
