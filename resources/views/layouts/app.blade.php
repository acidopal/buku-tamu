<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Buku Tamu - SMK Informatika Pesat</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        @include('layouts._partials._style')
    </head>


    <body class="enlarged" data-keep-enlarged="true">

        <!-- Begin page -->
        <div id="wrapper">
            
            <!-- ========== Left Sidebar Start ========== -->
            @include('layouts._partials._sidebar')

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Top Bar Start -->
                <div class="topbar">
                 <nav class="navbar-custom">

                    <ul class="list-unstyled topbar-right-menu float-right mb-0">

                        <li class="hide-phone app-search">
                            <form>
                                <input type="text" placeholder="Search..." class="form-control">
                                <button type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                        </li>

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle">
                                <span class="ml-1">Login First..
                                    <i class="mdi mdi-chevron-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h6 class="text-overflow m-0">Silahkan untuk Login !</h6>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fi-head"></i>
                                    <span>Login</span>
                                </a>

                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left">
                                <i class="dripicons-menu"></i>
                            </button>
                        </li>
                        <li>
                            <div class="page-title-box">
                                <h4 class="page-title">Buku Tamu </h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">Buku Tamu - SMK Informatika Pesat</li>
                                </ol>
                            </div>
                        </li>

                    </ul>

                </nav>

                </div>
                <!-- Top Bar End -->



                <!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">
                      <!-- #content -->
                      @yield('content')
                    </div> <!-- container -->
                </div> <!-- content -->

                <footer class="footer text-right">
                    2018 © Bukutamu. - SMK Informatika Pesat
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->
        @include('layouts._partials._script')
    </body>
</html>