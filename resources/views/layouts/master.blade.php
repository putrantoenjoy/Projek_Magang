<!doctype HTML5>
<html>
{{-- <head>
    <meta name="generator" content="Hugo 0.87.0" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
    <meta name="description" content="Nifty is a responsive admin dashboard template based on Bootstrap 5 framework. There are a lot of useful components.">
    <title>Dashboard</title>
    <!-- STYLESHEETS -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~--- -->
    <!-- Fonts [ OPTIONAL ] -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&amp;family=Ubuntu:wght@400;500;700&amp;display=swap" rel="stylesheet">
    <!-- Bootstrap CSS [ REQUIRED ] -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.75a07e3a3100a6fed983b15ad1b297c127a8c2335854b0efc3363731475cbed6.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Nifty CSS [ REQUIRED ] -->
    <link rel="stylesheet" href="assets/css/nifty.min.4d1ebee0c2ac4ed3c2df72b5178fb60181cfff43375388fee0f4af67ecf44050.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head> --}}
<head>
    <meta name="generator" content="Hugo 0.87.0" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
    <meta name="description" content="Nifty is a responsive admin dashboard template based on Bootstrap 5 framework. There are a lot of useful components.">
    <title>Dashboard</title>
    <!-- STYLESHEETS -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~--- -->
    <!-- Fonts [ OPTIONAL ] -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&amp;family=Ubuntu:wght@400;500;700&amp;display=swap" rel="stylesheet">
    <!-- Bootstrap CSS [ REQUIRED ] -->
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.75a07e3a3100a6fed983b15ad1b297c127a8c2335854b0efc3363731475cbed6.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    {{-- <link href="{{ asset('node_modules/froala-editor/css/froala_editor.pkgd.min.css') }}" rel="stylesheet" type="text/css" /> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.2.0/css/froala_editor.min.css" integrity="sha512-G6PT5gDSYDKUq3VZqV4iKw6XNaz9jQd9zslIf+uJcgelmqSFOwmv7UM+QW3NRphYsGmG0Dlb1nNLp6HX/pwf3A==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    

    <link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />

    <!-- Nifty CSS [ REQUIRED ] -->
    {{-- <script type="text/javascript" src="{{ asset('node_modules/froala-editor/js/froala_editor.pkgd.min.js') }}"></script> --}}
    <link rel="stylesheet" href="{{ url('assets/css/nifty.min.4d1ebee0c2ac4ed3c2df72b5178fb60181cfff43375388fee0f4af67ecf44050.css') }}">
    
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet">
    <style>
        .tags-input-wrapper {
            display: flex;
            flex-wrap: wrap;
            border: 1px solid #ddd;
            padding: 5px;
            border-radius: 5px;
            max-width: 600px;
        }

        .tags-input-wrapper input {
            border: none;
            outline: none;
            flex: 1;
            padding: 5px;
        }
    </style>
    <style>
       .mainnav__menu.nav.flex-column .nav-link.active {
            background-color: #0C58CA;
        }

        .btn-primary {
            background-color: #0c58ca;
            color: white;
            border: none;
        }
        .btn-success {
            background-color: #10ca0c;
            color: white;
            border: none;
        }
        .btn-danger {
            background-color: #ca0c0c;
            color: white;
            border: none;
        }

        .navbar a:hover::after,
        .navbar .active::after,
        .navbar .active:focus::after,
        .navbar li:hover>a::after {
            content: '';
            position: absolute; 
            bottom: 2px;
            left: 0px;
            width: 100%;
            height: 2px;
            background-color: #fff;
            z-index: -1;
        }
    </style>
</head>

<body class="jumping">
    <!-- PAGE CONTAINER -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <div id="root" class="root mn--max hd--expanded">
        <!-- CONTENTS -->
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <section id="content" class="content" style="background-color: #e9e9e9">
        {{-- <div class="position-absolute" style="background-color: #0c58ca; height: 150px; width: 100%"></div> --}}
        @yield('content')
            <!-- FOOTER -->
            <footer class="content__boxed mt-auto">
                <div class="content__wrap py-3 py-md-1 d-flex flex-column flex-md-row align-items-md-center">
                    <div class="text-nowrap mb-4 mb-md-0">Copyright &copy; 2024 <a href="#" class="ms-1 btn-link fw-bold">PT Basawa Solusi Teknologi</a></div>
                    <nav class="nav flex-column gap-1 flex-md-row gap-md-3 ms-md-auto" style="row-gap: 0 !important;">
                        <a class="nav-link px-0" href="#">Policy Privacy</a>
                        <a class="nav-link px-0" href="#">Terms and conditions</a>
                        <a class="nav-link px-0" href="#">Contact Us</a>
                    </nav>
                </div>
            </footer>
            <!-- END - FOOTER -->
        </section>
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <!-- END - CONTENTS -->
        <!-- HEADER -->
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <header class="header">
            <div class="header__inner" style="background-color: #1770f7">
                <!-- Brand -->
                <div class="header__brand" style="background-color: #1e78ff">
                    <div class="brand-wrap">
                        <!-- Brand logo -->
                        <a href="{{ route('dashboard') }}" class="brand-img stretched-link">
                            <img src="{{ asset('logo/logo.png') }}" alt="logo" class="logo" width="40" height="40">
                        </a>
                        <!-- Brand title -->
                        <div class="brand-title">PT Nusa Data Prima</div>
                        <!-- You can also use IMG or SVG instead of a text element. -->
                    </div>
                </div>
                <!-- End - Brand -->
                <div class="header__content" style="background-color: #1770f7">
                    <!-- Content Header - Left Side: -->
                    <div class="header__content-start">
                        <!-- Navigation Toggler -->
                        <button type="button" onclick="hideNav()" class="nav-toggler header__btn btn btn-icon btn-sm" aria-label="Nav Toggler">
                            <i class="demo-psi-view-list"></i>
                        </button>
                           </div>
                    <!-- End - Content Header - Left Side -->
                    <!-- Content Header - Right Side: -->
                    {{-- <div class="header__content-end">
                         <!-- User dropdown -->
                        <div class="dropdown">
                            <!-- Toggler -->
                            <button class="header__btn btn btn-icon btn-sm" type="button" data-bs-toggle="dropdown" aria-label="User dropdown" aria-expanded="false">
                                <i class="demo-psi-bell "></i>
                            </button>
                            <!-- User dropdown menu -->
                            <div class="dropdown-menu dropdown-menu-end w-md-300px">
                                <!-- User dropdown header -->
                                <div class="border-bottom px-3 py-2 mb-3">
                                    <h5>Notifikasi</h5>
                                </div>
                                <div class="list-group list-group-borderless" data-bs-spy = "scroll" data-bs-target="#data_notif">
                                    <div id="data_notif" class="list-group-borderless" style="overflow-y: scroll;height: 200px">
                                        <div class="text-center">
                                          <h4>Belum ada notifikasi!</h4>
                                        </div>
                                    </div>
                                </div>
                        <!-- End - User dropdown -->
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </header>
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <!-- END - HEADER -->
        <!-- MAIN NAVIGATION -->
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <nav id="mainnav-container" class="mainnav">
            <div class="mainnav__inner">
                <!-- Navigation menu -->
                <div class="mainnav__top-content scrollable-content pb-5">
                    <!-- Profile Widget -->
                    <div class="mainnav__profile mt-3 d-flex3" id="navhide">
                        {{-- <div class="mt-2 d-mn-max"></div> --}}
                        <div class="d-flex">
                            <img class="mainnav__avatar img-md rounded-circle border me-3" alt="Profile Picture" src="{{ url('assets/img/profile-photos/4.png') }}">
                            <div class="d-flex flex-column justify-content-center">
                                <h4 class="m-0">{{ Auth::user()->name }}</h4>
                                <p class="m-0">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                        <div class="mininav-content collapse d-mn-max">
                            <div class="d-grid">
                                <!-- User name and position -->
                                <button class="d-block btn shadow-none p-2" data-bs-toggle="collapse" data-bs-target="#usernav" aria-expanded="false" aria-controls="usernav">
                                    <span class="d-flex justify-content-center align-items-center">
                                        {{-- <h6 class="mb-0 me-3"> {{ Auth::user()->first_name}} </h6> --}}
                                    </span>
                                    {{-- <small class="text-muted">{{ Auth::user()->username }}</small> --}}
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- End - Profile widget -->
                @include('layouts.navigation')
                </div>
                <!-- End - Navigation menu -->
                <!-- Bottom navigation menu -->
                <div class="mainnav__bottom-content border-top pb-2">
                    <ul id="mainnav" class="mainnav__menu nav flex-column">
                        <li class="nav-item has-sub">
                            {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                @csrf
                                <button type="submit" role="button" class="nav-link mininav-toggle collapsed">
                                    <i class="demo-pli-unlock fs-5 me-2"></i>
                                    <span class="nav-label ms-1">Logout</span>
                                </button>
                                </form> --}}
                            <a type="button" data-bs-toggle="modal" data-bs-target="#LogOutstaticBackdrop" class="nav-link mininav-toggle collapsed" aria-expanded="false">
                                <i class="demo-pli-unlock fs-5 me-2"></i>
                                <span class="nav-label ms-1">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End - Bottom navigation menu -->
            </div>
        </nav>
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <!-- END - MAIN NAVIGATION -->
    </div>
    @include('modal_logout')
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <!-- END - PAGE CONTAINER -->
    <!-- SCROLL TO TOP BUTTON -->
    <div class="scroll-container">
        <a href="#root" class="scroll-page rounded-circle ratio ratio-1x1" aria-label="Scroll button"></a>
    </div>
    <script>
        function hideNav(){
            var x = document.getElementById("navhide")
            if(x.style.display === "none"){
                x.style.display = "block";
            }else{
                x.style.display = "none";
            }
        }
    </script>
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <!-- END - SCROLL TO TOP BUTTON -->
    <!-- JAVASCRIPTS -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <!-- Bootstrap JS [ OPTIONAL ] -->
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/bootstrap.min.bdf649e4bf3fa0261445f7c2ed3517c3f300c9bb44cb991c504bdc130a6ead19.js" defer></script>
    <!-- Nifty JS [ OPTIONAL ] -->
    <script src="{{ url('assets/js/nifty.min.b53472f123acc27ffd0c586e4ca3dc5d83c0670a3a5e120f766f88a92240f57b.js') }}" defer></script>
    <!-- Plugin scripts [ OPTIONAL ] -->
    <script src="{{ url('assets/pages/dashboard-1.min.07239cfbfa13a684f5c4668d5282cf217c7793bc57557b4ec22c36740ffb5bf1.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.2.0/js/froala_editor.min.js" integrity="sha512-w4jW1LYhfHs76gpWwx7itIM5HHvvw0Co2AJA60Xgqiljzj7jGnaRyV/CxOFO5PCbUuxVeBuKlgPr6qoq3eoUmw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>