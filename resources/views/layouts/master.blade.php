<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- App title -->
        <title>@yield('title')</title>
        <!-- Scripts -->
         <!-- Sweet Alert -->
         <link href="{{asset('plugins/bootstrap-sweetalert/sweet-alert.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

         <!-- DataTables -->
         <link href="{{asset('plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
         <link href="{{asset('plugins/datatables/buttons.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
         <link href="{{asset('plugins/datatables/fixedHeader.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
         <link href="{{asset('plugins/datatables/responsive.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
         <link href="{{asset('plugins/datatables/scroller.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
         <link href="{{asset('plugins/datatables/dataTables.colVis.css')}}" rel="stylesheet" type="text/css"/>
         <link href="{{asset('plugins/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
         <link href="{{asset('plugins/datatables/fixedColumns.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
 

        <!-- App css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/core.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/components.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/pages.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/menu.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{asset('plugins/switchery/switchery.min.css')}}">
        
          <!-- Styles -->
        {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="{{asset('assets/js/modernizr.min.js')}}"></script>

    </head>

    <body class="fixed-left">
        @include('sweetalert::alert')

        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">
                  <div class="spinner-wrapper">
                    <div class="rotator">
                      <div class="inner-spin"></div>
                      <div class="inner-spin"></div>
                    </div>
                  </div>
                </div>
            </div>
        </div>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="{{ route('dashboard') }}" class="logo"><span>Faaajs<span> Aneefat</span></span><i class="mdi mdi-cube"></i></a>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">

                        <!-- Navbar-left -->
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <button class="button-menu-mobile open-left waves-effect waves-light">
                                    <i class="mdi mdi-menu"></i>
                                </button>
                            </li>
                        </ul>

                        <!-- Right(Notification) -->
                        <ul class="nav navbar-nav navbar-right">
                            {{-- {{dd($inventoryDatas)}} --}}
                            @if (isset($inventoryDatas) && !empty($inventoryDatas))
                            <li>
                                <a href="#" class="right-menu-item dropdown-toggle" data-toggle="dropdown">
                                    <i class="mdi mdi-bell"></i>
                                   
                                    <span class="badge up bg-danger">{{count($inventoryDatas)? count($inventoryDatas) : '' }}</span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right dropdown-lg user-list notify-list">
                                    <li>
                                        <h5>Notifications on Low Product</h5>
                                    </li>
                                    @foreach ($inventoryDatas as $inventory)
                                    <li>
                                        <a href="{{route('inventory.viewlowitem')}}" class="user-list-item">
                                            <div class="icon bg-danger">
                                                <i class="mdi mdi-comment"></i>
                                            </div>
                                            <div class="user-desc">
                                                <span class="name">{{$inventory->productname}}</span>
                                                <span class="time">Product Remains: {{$inventory->productremain}}</span>
                                            </div>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>                                
                            @else
                            <li>
                                <a href="#" class="right-menu-item dropdown-toggle" data-toggle="dropdown">
                                    <i class="mdi mdi-bell"></i>
                                   
                                    <span class="badge up bg-danger"></span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right dropdown-lg user-list notify-list">
                                    <li>
                                        <h5>Notifications</h5>
                                    </li>
                                    <li>
                                        <a href="#" class="user-list-item">
                                            <div class="icon bg-success">
                                                <i class="mdi mdi-comment"></i>
                                            </div>
                                            <div class="user-desc">
                                                <span class="name"> No News</span>
                                                <hr>
                                                {{-- <span class="time">1 day ago</span> --}}
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>        
                            @endif
                           

                            <li class="dropdown user-box">
                                <a href="" class="dropdown-toggle waves-effect waves-light user-link" data-toggle="dropdown" aria-expanded="true">
                                    <img src="{{asset(Auth::user()->avatar)}}" alt="user-img" class="img-circle user-img">
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                    <li>
                                        <h5>Hi, {{ Auth::user()->name }}</h5>
                                    </li>
                                    <li><a href="javascript:void(0)"><i class="ti-user m-r-5"></i> Profile</a></li>
                                    <li><a href="javascript:void(0)"><i class="ti-settings m-r-5"></i> Settings</a></li>
                                    <li><a class="dropdown-item text-danger" href="{{ route('logout') }}" 
                                        onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"><i class="glyphicon glyphicon-log-out"></i>
                                            {{ __('Logout') }}
                                            
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                         <!-- end navbar-right -->

                    </div><!-- end container -->
                </div><!-- end navbar -->
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <div class="user-details">
                            <div class="overlay"></div>
                            <div class="text-center">
                                <img src="{{asset(Auth::user()->avatar)}}" alt="" class="thumb-md img-circle">
                            </div>
                            <div class="user-info">
                                <div>
                                    <a href="#setting-dropdown" class="dropdown-toggle text-center" data-toggle="dropdown" aria-expanded="false"><h5 class="text-warning">{{ Auth::user()->name }}</h5> </a>
                                </div>
                            </div>
                        </div>

                        <ul>
                        	{{-- <li class="menu-title">Data Inputs And Analysis</li> --}}
                            @if (Auth::user()->isAdmin)
                                <li>
                                    <a href="{{ route('dashboard') }}" class="waves-effect"><i class="fa fa-dashboard"></i><span> Dashboard </span></a>
                                </li>    
                            @endif
                            
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class=" mdi mdi-chart-histogram"></i><span> Inventory </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('inventory.view')}}"> Enter & View Inventory Items</a></li>
                                    <li><a href="{{route('inventory.viewlowitem')}}"> Update Inventory Items</a></li>
                                    <li><a href="{{route('stock.view')}}"> View Inventory Flows</a></li>
                                   
                                    
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-cart"></i><span> Sales </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('sales.view')}}"> Enter & View Sales</a></li>
                                    {{-- <li><a href="email-read.html"> Item Categories Setup</a></li> --}}
                                    <li><a href="#"> Sales Reports</a></li>
                                </ul>
                            </li>

                            @if (Auth::user()->isAdmin)
                                <li class="menu-title">Settings</li>

                                <li class="has_sub">
                                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-settings"></i><span> Setup </span> <span class="menu-arrow"></span></a>
                                    <ul class="list-unstyled">
                                        <li><a href="{{route('category.view')}}"> Item Categories Setup</a></li>
                                        <li><a href="{{route('measure.view')}}"> Item UOM Setup</a></li>
                                        <li><a href="{{route('supplier.view')}}"> Enter & View Suppliers</a></li>
                                    </ul>
                                </li>
                                <li class="has_sub">
                                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account"></i><span> Users </span> <span class="menu-arrow"></span></a>
                                    <ul class="list-unstyled">
                                        <li><a href="{{route('user.view')}}">Enter & View Users</a></li>
                                        <li><a href="chart-morris.html">Users Sales</a></li>
                                    </ul>
                                </li>

                                <li class="has_sub">
                                    <a href="javascript:void(0);" class="waves-effect"><i class=" ti-receipt"></i><span> Reports </span> <span class="menu-arrow"></span></a>
                                    <ul class="list-unstyled">
                                        <li><a href="chart-flot.html">Enter & View Users</a></li>
                                        <li><a href="chart-morris.html">Users Sales</a></li>
                                    </ul>
                                </li>
                            @endif
                        {{-- </ul> --}}
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>
               
                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">@yield('breadcrumb') </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li class="text-primary">
                                            {{ Auth::user()->name }}
                                        </li>
                                        <li class="text-primary">
                                            @yield('menuname')
                                        </li>
                                        <li class="active text-primary">
                                            @yield('submenu')
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->
                            <div class="row">


                                
                                {{-- <div class="col-sm-12">
                                    <div class="p-20">
                                        <div class="row blog-column-wrapper">
                                            <div class="col-md-12"> --}}
                                                <main class="py-4">
                                                    @yield('content')
                                                </main>
                                                
                                            {{-- </div> <!-- end col -->
                                        </div>
                                        <!-- end row -->
                                    </div> --}}
                                {{-- </div> <!-- end col --> --}}
                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                    </div> <!-- container -->
                </div> <!-- content -->

                <footer class="footer text-center">
                    <h5 class="text-center">
                        {{date('l, F d, Y')}}
                    </h5>
                </footer>

            </div>

        </div>
        <!-- END wrapper -->

    {{-- laravel junction --}}
{{--     
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}

        {{-- <main class="py-4">
            @yield('content')
        </main> --}}


        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/detect.js')}}"></script>
        <script src="{{asset('assets/js/fastclick.js')}}"></script>
        <script src="{{asset('assets/js/jquery.blockUI.js')}}"></script>
        <script src="{{asset('assets/js/waves.js')}}"></script>
        <script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
        <script src="{{asset('assets/js/jquery.scrollTo.min.js')}}"></script>
        <script src="{{asset('plugins/switchery/switchery.min.js')}}"></script>


        <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/dataTables.bootstrap.js')}}"></script>

        <script src="{{asset('plugins/datatables/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/buttons.bootstrap.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/jszip.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/pdfmake.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/vfs_fonts.js')}}"></script>
        <script src="{{asset('plugins/datatables/buttons.html5.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/buttons.print.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/dataTables.fixedHeader.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/dataTables.keyTable.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/responsive.bootstrap.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/dataTables.scroller.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/dataTables.colVis.js')}}"></script>
        <script src="{{asset('plugins/datatables/dataTables.fixedColumns.min.js')}}"></script>

         <!-- init -->
         <script src="{{asset('assets/pages/jquery.datatables.init.js')}}"></script>

        <!-- isotope plugin -->
        <script type="text/javascript" src="{{asset('plugins/isotope/js/isotope.pkgd.min.js')}}"></script>


         <!-- Counter js  -->
         <script src="{{asset('plugins/waypoints/jquery.waypoints.min.js')}}"></script>
         <script src="{{asset('plugins/counterup/jquery.counterup.min.js')}}"></script>
 
         <!-- Flot chart js -->
         <script src="{{asset('plugins/flot-chart/jquery.flot.min.js')}}"></script>
         <script src="{{asset('plugins/flot-chart/jquery.flot.time.js')}}"></script>
         <script src="{{asset('plugins/flot-chart/jquery.flot.tooltip.min.js')}}"></script>
         <script src="{{asset('plugins/flot-chart/jquery.flot.resize.js')}}"></script>
         <script src="{{asset('plugins/flot-chart/jquery.flot.pie.js')}}"></script>
         <script src="{{asset('plugins/flot-chart/jquery.flot.selection.js')}}"></script>
         <script src="{{asset('plugins/flot-chart/jquery.flot.crosshair.js')}}"></script>
 
         <script src="{{asset('plugins/moment/moment.js')}}"></script>
         <script src="{{asset('plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
 
 
         <!-- Dashboard init -->
         <script src="{{asset('assets/pages/jquery.dashboard_2.js')}}"></script>
 
        <!-- Sweet-Alert  -->
        <script src="{{asset('plugins/bootstrap-sweetalert/sweet-alert.min.js')}}"></script>
        <script src="{{asset('assets/pages/jquery.sweet-alert.init.js')}}"></script>

         <!-- App js -->
         <script src="{{asset('assets/js/jquery.core.js')}}"></script>
         <script src="{{asset('assets/js/jquery.app.js')}}"></script>
         @yield('script')
         <script>
        
            $('.blog-column-wrapper').isotope({
                itemSelector: '.col-md-6',
                percentPosition: true,
                masonry: {
                    columnWidth: '.col-md-6'
                }
            });

        </script>

    </div>
    </body>
</html>