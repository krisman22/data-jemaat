<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@isset($title)
            {{ $title }} | 
        @endisset Data Jemaat BNKP</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- inline css/script
		============================================ -->
    @yield('scriptshead')
    
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/favicon.ico')}}">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <script src ="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
    <script src ="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js" defer ></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href={{ asset('css/bootstrap.min.css') }}>
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href={{ asset('css/font-awesome.min.css') }}>
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href={{ asset('css/owl.carousel.css') }} >
    <link rel="stylesheet" href={{ asset('css/owl.theme.css') }}>
    <link rel="stylesheet" href={{ asset('css/owl.transitions.css') }}>
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href={{ asset('css/animate.css') }}>
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href={{ asset('css/normalize.css') }}>
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href={{ asset('css/meanmenu.min.css') }}>
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href={{ asset('css/main.css') }}>
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href={{ asset('css/educate-custon-icon.css') }}>
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href={{ asset('css/morrisjs/morris.css') }}>
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href={{ asset('css/scrollbar/jquery.mCustomScrollbar.min.css') }}>
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href={{ asset('css/metisMenu/metisMenu.min.css') }}>
    <link rel="stylesheet" href={{ asset('css/metisMenu/metisMenu-vertical.css') }}>
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href={{ asset('css/calendar/fullcalendar.min.css') }}>
    <link rel="stylesheet" href={{ asset('css/calendar/fullcalendar.print.min.css') }}>
    <!-- x-editor CSS
		============================================ -->
    <link rel="stylesheet" href={{ asset('css/editor/select2.css') }}>
    <link rel="stylesheet" href={{ asset('css/editor/datetimepicker.css') }}>
    <link rel="stylesheet" href={{ asset('css/editor/bootstrap-editable.css') }}>
    <link rel="stylesheet" href={{ asset('css/editor/x-editor-style.css') }}>
    <!-- normalize CSS
        ============================================ -->
    <link rel="stylesheet" href={{ asset('css/data-table/bootstrap-table.css') }}>
    <link rel="stylesheet" href={{ asset('css/data-table/bootstrap-editable.css') }}>
    <!-- Buttons
        ============================================ -->
    <link rel="stylesheet" href={{ asset('css/buttons.css') }}>
    <!-- Modals
        ============================================ -->
        <link rel="stylesheet" href={{ asset('css/modals.css') }}>
    <!-- Form
        ============================================ -->
        <link rel="stylesheet" href={{ asset('css/form/all-type-forms.css') }}>
    <!-- datepicker
        ============================================ -->
        <link rel="stylesheet" href={{ asset('css/datapicker/datepicker3.css') }}>
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href={{ asset('style.css') }}>
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href={{ asset('css/responsive.css') }}>
    <!-- modernizr JS
		============================================ -->
    <script src={{ asset('js/vendor/modernizr-2.8.3.min.js') }}></script>
    <!-- Awsomeicon
        ============================================ -->
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    
    
    
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href={{ asset('/') }}><img class="main-logo" src={{ asset('img/logo/logo.png') }} alt="" /></a>
                <strong><a href={{ asset('/') }}><img src={{ asset('img/logo/logosn.png') }} width="30px" alt="" /></a></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1" style='font-size:17px'>
                        <li class="{{Request::is("/")?'active':''}}" >
                            <a title="Home" href={{ asset('/') }}>
								   <span class="fas fa-church"></span>
								   <span class="mini-click-non">Dashboard</span>
								</a>
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="fas fa-user-friends" style='font-size:17px'></span> <span class="mini-click-non">Jemaat</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li class="{{Request::is("data-jemaat")?'active':''}} || {{Request::is("data-jemaat/profile/*")?'active':''}}"><a title="Data Jemaat" href={{asset('/data-jemaat')}}><span class="mini-sub-pro">Data Jemaat</span></a></li>                            
                                {{-- <li class="{{Request::is("all-jemaat")?'active':''}}"><a title="All Students" href={{asset('/all-jemaat')}}><span class="mini-sub-pro">All Students</span></a></li> --}}
                                <li class="{{Request::is("tambah-jemaat")?'active':''}}"><a title="Tambah Jemaat" href={{asset('/tambah-jemaat')}}><span class="mini-sub-pro">Tambah Jemaat</span></a></li>
                                {{-- <li class="{{Request::is("lihat-data-jemaat")?'active':''}}"><a title="Edit Students" href={{asset('/lihat-data-jemaat')}}><span class="mini-sub-pro">Edit Student</span></a></li> --}}
                                {{-- <li><a title="Students Profile" href="student-profile.html"><span class="mini-sub-pro">Student Profile</span></a></li> --}}
                            </ul>
                        </li>
                        <li class="{{Request::is("kartu-jemaat")?'active':''}}" >
                            <a title="Kartu Jemaat" href={{ asset('/kartu-jemaat') }}>
								   <span class="fas fa-id-card" style='font-size:17px'></span>
								   <span class="mini-click-non">Kartu Jemaat</span>
								</a>
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="fas fa-table"></span> <span class="mini-click-non">Jemaat InAktif</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li class="{{Request::is("data-jemaatmeninggal") ? 'active' : ''}}"><a href="{{asset('/data-jemaatmeninggal')}}"><span class="mini-sub-pro">Meninggal</span></a></li>                            
                                <li class="{{Request::is("data-jemaatpindah") ? 'active' : ''}}"><a href="{{asset('/data-jemaatpindah')}}"><span class="mini-sub-pro">Pindah</span></a></li>                            
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="fas fa-table"></span> <span class="mini-click-non">Rekap Data</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li class="{{Request::is("rekap-lingkungan") ? 'active' : ''}}"><a href="{{asset('/rekap-lingkungan')}}"><span class="mini-sub-pro">Lingkungan</span></a></li>                            
                                <li class="{{Request::is("rekap-kepalakeluarga") ? 'active' : ''}}"><a href="{{asset('/rekap-kepalakeluarga')}}"><span class="mini-sub-pro">Kepala Keluarga</span></a></li>                            
                                <li class="{{Request::is("rekap-jenis-kelamin") ? 'active' : ''}}"><a href="{{asset('/rekap-jenis-kelamin')}}"><span class="mini-sub-pro">Jenis Kelamin</span></a></li>                            
                                <li class="{{Request::is("rekap-jenis-usia") ? 'active' : ''}}"><a href="{{asset('/rekap-jenis-usia')}}"><span class="mini-sub-pro">Jenis Usia</span></a></li>                            
                                <li class="{{Request::is("rekap-status-perkawinan") ? 'active' : ''}}"><a href="{{asset('/rekap-status-perkawinan')}}"><span class="mini-sub-pro">Status Perkawinan</span></a></li>                            
                                <li class="{{Request::is("rekap-pendidikan") ? 'active' : ''}}"><a href="{{asset('/rekap-pendidikan')}}"><span class="mini-sub-pro">Pendidikan</span></a></li>                            
                                <li class="{{Request::is("rekap-pekerjaan") ? 'active' : ''}} || {{Request::is("rekap-pekerjaan/*") ? 'active' : ''}}"><a href="{{asset('/rekap-pekerjaan')}}"><span class="mini-sub-pro">Pekerjaan</span></a></li>                            
                                <li class="{{Request::is("rekap-jemaat-bergabung") ? 'active' : ''}}"><a href="{{asset('/rekap-jemaat-bergabung')}}"><span class="mini-sub-pro">Jemaat Bergabung</span></a></li>                       
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="fas fa-chart-bar"></span> <span class="mini-click-non">Grafik</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li class="{{Request::is("grafik-lingkungan") ? 'active' : ''}}"><a href="{{asset('/grafik-lingkungan')}}"><span class="mini-sub-pro">Lingkungan</span></a></li>                            
                                <li class="{{Request::is("grafik-jenis-kelamin") ? 'active' : ''}}"><a href="{{asset('/grafik-jenis-kelamin')}}"><span class="mini-sub-pro">Jenis Kelamin</span></a></li>                            
                                <li class="{{Request::is("grafik-jenis-usia") ? 'active' : ''}}"><a href="{{asset('/grafik-jenis-usia')}}"><span class="mini-sub-pro">Jenis Usia</span></a></li>                            
                                <li class="{{Request::is("grafik-status-perkawinan") ? 'active' : ''}}"><a href="{{asset('/grafik-status-perkawinan')}}"><span class="mini-sub-pro">Status Perkawinan</span></a></li>                            
                                <li class="{{Request::is("grafik-pendidikan") ? 'active' : ''}}"><a href="{{asset('/grafik-pendidikan')}}"><span class="mini-sub-pro">Pendidikan</span></a></li>                            
                                <li class="{{Request::is("grafik-pekerjaan") ? 'active' : ''}} || {{Request::is("grafik-pekerjaan/*") ? 'active' : ''}}"><a href="{{asset('/grafik-pekerjaan')}}"><span class="mini-sub-pro">Pekerjaan</span></a></li>                            
                                <li class="{{Request::is("grafik-jemaat-bergabung") ? 'active' : ''}}"><a href="{{asset('/grafik-jemaat-bergabung')}}"><span class="mini-sub-pro">Jemaat Bergabung</span></a></li>  
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="{{asset('/')}}"><img class="main-logo" src="{{asset('img/logo/logo.png')}}" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
													<i class="educate-icon educate-nav"></i>
												</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        {{-- <div class="header-top-menu tabl-d-n">
                                            <ul class="nav navbar-nav mai-top-nav">
                                                <li class="nav-item"><a href="#" class="nav-link">Home</a>
                                                </li>
                                                <li class="nav-item"><a href="#" class="nav-link">About</a>
                                                </li>
                                                <li class="nav-item"><a href="#" class="nav-link">Services</a>
                                                </li>
                                                <li class="nav-item dropdown res-dis-nn">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">Project <span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span></a>
                                                    <div role="menu" class="dropdown-menu animated zoomIn">
                                                        <a href="#" class="dropdown-item">Documentation</a>
                                                        <a href="#" class="dropdown-item">Expert Backend</a>
                                                        <a href="#" class="dropdown-item">Expert FrontEnd</a>
                                                        <a href="#" class="dropdown-item">Contact Support</a>
                                                    </div>
                                                </li>
                                                <li class="nav-item"><a href="#" class="nav-link">Support</a>
                                                </li>
                                            </ul>
                                        </div> --}}
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item dropdown">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-message edu-chat-pro" aria-hidden="true"></i><span class="indicator-ms"></span></a>
                                                    <div role="menu" class="author-message-top dropdown-menu animated zoomIn">
                                                        <div class="message-single-top">
                                                            <h1>Message</h1>
                                                        </div>
                                                        {{-- <ul class="message-menu">
                                                            <li>
                                                                <a href="#">
                                                                    <div class="message-img">
                                                                        <img src="img/contact/1.jpg" alt="">
                                                                    </div>
                                                                    <div class="message-content">
                                                                        <span class="message-date">16 Sept</span>
                                                                        <h2>Advanda Cro</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="message-img">
                                                                        <img src="img/contact/4.jpg" alt="">
                                                                    </div>
                                                                    <div class="message-content">
                                                                        <span class="message-date">16 Sept</span>
                                                                        <h2>Sulaiman din</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="message-img">
                                                                        <img src="img/contact/3.jpg" alt="">
                                                                    </div>
                                                                    <div class="message-content">
                                                                        <span class="message-date">16 Sept</span>
                                                                        <h2>Victor Jara</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="message-img">
                                                                        <img src="img/contact/2.jpg" alt="">
                                                                    </div>
                                                                    <div class="message-content">
                                                                        <span class="message-date">16 Sept</span>
                                                                        <h2>Victor Jara</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul> --}}
                                                        <div class="message-view">
                                                            <a href="#">View All Messages</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-bell" aria-hidden="true"></i><span class="indicator-nt"></span></a>
                                                    <div role="menu" class="notification-author dropdown-menu animated zoomIn">
                                                        <div class="notification-single-top">
                                                            <h1>Notifications</h1>
                                                        </div>
                                                        {{-- <ul class="notification-menu">
                                                            <li>
                                                                <a href="#">
                                                                    <div class="notification-icon">
                                                                        <i class="educate-icon educate-checked edu-checked-pro admin-check-pro" aria-hidden="true"></i>
                                                                    </div>
                                                                    <div class="notification-content">
                                                                        <span class="notification-date">16 Sept</span>
                                                                        <h2>Advanda Cro</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="notification-icon">
                                                                        <i class="fa fa-cloud edu-cloud-computing-down" aria-hidden="true"></i>
                                                                    </div>
                                                                    <div class="notification-content">
                                                                        <span class="notification-date">16 Sept</span>
                                                                        <h2>Sulaiman din</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="notification-icon">
                                                                        <i class="fa fa-eraser edu-shield" aria-hidden="true"></i>
                                                                    </div>
                                                                    <div class="notification-content">
                                                                        <span class="notification-date">16 Sept</span>
                                                                        <h2>Victor Jara</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="notification-icon">
                                                                        <i class="fa fa-line-chart edu-analytics-arrow" aria-hidden="true"></i>
                                                                    </div>
                                                                    <div class="notification-content">
                                                                        <span class="notification-date">16 Sept</span>
                                                                        <h2>Victor Jara</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul> --}}
                                                        <div class="notification-view">
                                                            <a href="#">View All Notification</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="nav-item">

                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
															<img src="{{asset('img/logo/cross-logo.jpg')}}" alt="" />
															<span class="admin-name">{{ Auth::user()->name }}</span>
															<i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
														</a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        {{-- <li><a href="#"><span class="edu-icon edu-home-admin author-log-ic"></span>My Account</a>
                                                        </li>
                                                        <li><a href="#"><span class="edu-icon edu-user-rounded author-log-ic"></span>My Profile</a>
                                                        </li>
                                                        <li><a href="#"><span class="edu-icon edu-money author-log-ic"></span>User Billing</a>
                                                        </li> --}}
                                                        <li><a href="#"><span class="edu-icon edu-settings author-log-ic"></span>Settings</a>
                                                        </li>
                                                        <li><a href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                            <span class="edu-icon edu-locked author-log-ic"></span>Log Out                                                         
                                                        </a>
                                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                @csrf
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <div class="col-md-1"></div>                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">                                        
                                        <li><a href="{{asset('/')}}">Dashboard</a></li>
                                        <li><a data-toggle="collapse" data-target="#Charts" href="#">Data Jemaat <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul class="collapse dropdown-header-top">
                                                <li><a href="{{asset('/data-jemaat')}}">Data Jemaat</a></li>
                                                <li><a href="{{asset('/tambah-jemaat')}}">Tambah Jemaat</a></li>
                                            </ul>
                                        </li>
                                        <li class="{{Request::is("kartu-jemaat")?'active':''}}" >
                                            <a title="Kartu Jemaat" href={{ asset('/kartu-jemaat') }}>
                                                   <span class="fas fa-id-card" style='font-size:17px'></span>
                                                   <span class="mini-click-non">Kartu Jemaat</span>
                                                </a>
                                        </li>
                                        <li>
                                            <a class="has-arrow" href="#" aria-expanded="false"><span class="fas fa-table"></span> <span class="mini-click-non">Rekap Data</span></a>
                                            <ul class="submenu-angle" aria-expanded="false">
                                                <li class="{{Request::is("rekap-lingkungan") ? 'active' : ''}}"><a href="{{asset('/rekap-lingkungan')}}"><span class="mini-sub-pro">Lingkungan</span></a></li>                            
                                                <li class="{{Request::is("rekap-jenis-kelamin") ? 'active' : ''}}"><a href="{{asset('/rekap-jenis-kelamin')}}"><span class="mini-sub-pro">Jenis Kelamin</span></a></li>                            
                                                <li class="{{Request::is("rekap-jenis-usia") ? 'active' : ''}}"><a href="{{asset('/rekap-jenis-usia')}}"><span class="mini-sub-pro">Jenis Usia</span></a></li>                            
                                                <li class="{{Request::is("rekap-status-perkawinan") ? 'active' : ''}}"><a href="{{asset('/rekap-status-perkawinan')}}"><span class="mini-sub-pro">Status Perkawinan</span></a></li>                            
                                                <li class="{{Request::is("rekap-pendidikan") ? 'active' : ''}}"><a href="{{asset('/rekap-pendidikan')}}"><span class="mini-sub-pro">Pendidikan</span></a></li>                            
                                                <li class="{{Request::is("rekap-pekerjaan") ? 'active' : ''}} || {{Request::is("rekap-pekerjaan/*") ? 'active' : ''}}"><a href="{{asset('/rekap-pekerjaan')}}"><span class="mini-sub-pro">Pekerjaan</span></a></li>                            
                                                <li class="{{Request::is("rekap-jemaat-bergabung") ? 'active' : ''}}"><a href="{{asset('/rekap-jemaat-bergabung')}}"><span class="mini-sub-pro">Jemaat Bergabung</span></a></li>                       
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="has-arrow" href="#" aria-expanded="false"><span class="fas fa-chart-bar"></span> <span class="mini-click-non">Grafik</span></a>
                                            <ul class="submenu-angle" aria-expanded="false">
                                                <li class="{{Request::is("grafik-lingkungan") ? 'active' : ''}}"><a href="{{asset('/grafik-lingkungan')}}"><span class="mini-sub-pro">Lingkungan</span></a></li>                            
                                                <li class="{{Request::is("grafik-jenis-kelamin") ? 'active' : ''}}"><a href="{{asset('/grafik-jenis-kelamin')}}"><span class="mini-sub-pro">Jenis Kelamin</span></a></li>                            
                                                <li class="{{Request::is("grafik-jenis-usia") ? 'active' : ''}}"><a href="{{asset('/grafik-jenis-usia')}}"><span class="mini-sub-pro">Jenis Usia</span></a></li>                            
                                                <li class="{{Request::is("grafik-status-perkawinan") ? 'active' : ''}}"><a href="{{asset('/grafik-status-perkawinan')}}"><span class="mini-sub-pro">Status Perkawinan</span></a></li>                            
                                                <li class="{{Request::is("grafik-pendidikan") ? 'active' : ''}}"><a href="{{asset('/grafik-pendidikan')}}"><span class="mini-sub-pro">Pendidikan</span></a></li>                            
                                                <li class="{{Request::is("grafik-pekerjaan") ? 'active' : ''}} || {{Request::is("grafik-pekerjaan/*") ? 'active' : ''}}"><a href="{{asset('/grafik-pekerjaan')}}"><span class="mini-sub-pro">Pekerjaan</span></a></li>                            
                                                <li class="{{Request::is("grafik-jemaat-bergabung") ? 'active' : ''}}"><a href="{{asset('/grafik-jemaat-bergabung')}}"><span class="mini-sub-pro">Jemaat Bergabung</span></a></li>  
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcome-area">
                {{-- <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading">
                                            <form role="search" class="sr-input-func">
                                                <input type="text" placeholder="Search..." class="search-int form-control">
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Dashboard</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">...</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>       
        </div>
        <!-- Content 
            ========================================-->
        @yield('content')
    </div>

    <!-- jquery
		============================================ -->
    <script src={{ asset('js/vendor/jquery-1.12.4.min.js') }}></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src={{ asset('js/bootstrap.min.js') }}></script>
    <!-- wow JS
		============================================ -->
    <script src={{ asset('js/wow.min.js') }}></script>
    <!-- price-slider JS
		============================================ -->
    <script src={{ asset('js/jquery-price-slider.js') }}></script>
    <!-- meanmenu JS
		============================================ -->
    <script src={{ asset('js/jquery.meanmenu.js') }}></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src={{ asset('js/owl.carousel.min.js') }}></script>
    <!-- sticky JS
		============================================ -->
    <script src={{ asset('js/jquery.sticky.js') }}></script>
    <!-- scrollUp JS
		============================================ -->
    <script src={{ asset('js/jquery.scrollUp.min.js') }}></script>
    <!-- counterup JS
		============================================ -->
    <script src={{ asset('js/counterup/jquery.counterup.min.js') }}></script>
    <script src={{ asset('js/counterup/waypoints.min.js') }}></script>
    <script src={{ asset('js/counterup/counterup-active.js') }}></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src={{ asset('js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}></script>
    <script src={{ asset('js/scrollbar/mCustomScrollbar-active.js') }}></script>
    <!-- metisMenu JS
		============================================ -->
    <script src={{ asset('js/metisMenu/metisMenu.min.js') }}></script>
    <script src={{ asset('js/metisMenu/metisMenu-active.js') }}></script>
    <!-- morrisjs JS
		============================================ -->
    <script src={{ asset('js/morrisjs/raphael-min.js') }}></script>
    <script src={{ asset('js/morrisjs/morris.js') }}></script>
    <script src={{ asset('js/morrisjs/morris-active.js') }}></script>
    <!-- morrisjs JS
		============================================ -->
    <script src={{ asset('js/sparkline/jquery.sparkline.min.js') }}></script>
    <script src={{ asset('js/sparkline/jquery.charts-sparkline.js') }}></script>
    <script src={{ asset('js/sparkline/sparkline-active.js') }}></script>
    <!-- calendar JS
		============================================ -->
    <script src={{ asset('js/calendar/moment.min.js') }}></script>
    <script src={{ asset('js/calendar/fullcalendar.min.js') }}></script>
    <script src={{ asset('js/calendar/fullcalendar-active.js') }}></script>
    <!-- icheck JS
		============================================ -->
    <script src={{ asset('js/icheck/icheck.min.js') }}></script>
    <script src={{ asset('js/icheck/icheck-active.js') }}></script>
     <!-- datapicker JS
		============================================ -->
    <script src={{ asset('js/datapicker/bootstrap-datepicker.js') }}></script>
    <script src={{ asset('js/datapicker/datepicker-active.js') }}></script>
     <!-- input-mask JS
		============================================ -->
        {{-- <script src={{ asset('js/input-mask/jasny-bootstrap.min.js') }}></script> --}}
        <!-- chosen JS
            ============================================ -->
        {{-- <script src={{ asset('js/chosen/chosen.jquery.js') }}></script>
        <script src={{ asset('js/chosen/chosen-active.js') }}></script> --}}
        <!-- select2 JS
            ============================================ -->
        {{-- <script src={{ asset('js/select2/select2.full.min.js') }}></script>
        <script src={{ asset('js/select2/select2-active.js') }}></script> --}}
        <!-- ionRangeSlider JS
            ============================================ -->
        {{-- <script src={{ asset('js/ionRangeSlider/ion.rangeSlider.min.js') }}></script>
        <script src={{ asset('js/ionRangeSlider/ion.rangeSlider.active.js') }}></script> --}}
        <!-- rangle-slider JS
            ============================================ -->
        {{-- <script src={{ asset('js/rangle-slider/jquery-ui-1.10.4.custom.min.js') }}></script>
        <script src={{ asset('js/rangle-slider/jquery-ui-touch-punch.min.js') }}></script>
        <script src={{ asset('js/rangle-slider/rangle-active.js') }}></script> --}}
        <!-- knob JS
            ============================================ -->
        {{-- <script src={{ asset('js/knob/jquery.knob.js') }}></script>
        <script src={{ asset('js/knob/knob-active.js') }}></script> --}}

    <!-- Select2
        =========================================== -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>        
    <!-- plugins JS
		============================================ -->
    <script src={{ asset('js/plugins.js') }}></script>
    <!-- main JS
		============================================ -->
    <script src={{ asset('js/main.js') }}></script>
    <!-- tawk chat JS
		============================================ -->
    {{-- <script src={{ asset('js/tawk-chat.js') }}></script> --}}
    <!-- data table JS
        ============================================ -->
    <script src={{ asset('js/data-table/bootstrap-table.js') }}></script>
    <script src={{ asset('js/data-table/tableExport.js') }}></script>
    <script src={{ asset('js/data-table/data-table-active.js') }}></script>
    <script src={{ asset('js/data-table/bootstrap-table-editable.js') }}></script>
    <script src={{ asset('js/data-table/bootstrap-editable.js') }}></script>
    <script src={{ asset('js/data-table/bootstrap-table-resizable.js') }}></script>
    <script src={{ asset('js/data-table/colResizable-1.5.source.js') }}></script>
    <script src={{ asset('js/data-table/bootstrap-table-export.js') }}></script>
    <!-- Moment JS
        ============================================ -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.12.0/moment.js"></script>
    <!--  editable JS
        ============================================ -->
    <script src={{ asset('js/editable/jquery.mockjax.js') }}></script>
    <script src={{ asset('js/editable/mock-active.js') }}></script>
    <script src={{ asset('js/editable/select2.js') }}></script>
    <script src={{ asset('js/editable/moment.min.js') }}></script>
    <script src={{ asset('js/editable/bootstrap-datetimepicker.js') }}></script>
    <script src={{ asset('js/editable/bootstrap-editable.js') }}></script>
    <script src={{ asset('js/editable/xediable-active.js') }}></script>
    <!-- Chart JS
		============================================ -->
    <script src={{ asset('js/chart/jquery.peity.min.js') }}></script>
    <script src={{ asset('js/peity/peity-active.js') }}></script>
    <!-- tab JS
        ============================================ -->
    <script src={{ asset('js/tab.js') }}></script>
    <!-- Date Time Picker JS
        ============================================ -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
    
    <!-- extend scrip on blade
        ============================================ -->
    @yield('scripts')

</body>

</html>