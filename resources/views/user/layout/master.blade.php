<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business VoicePro</title>
    @toastr_css
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    <!-- Perfect Scrollbar CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/public/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">

    <!-- Filepond Image -->
    <link rel="stylesheet" href="{{asset('admin/assets/public/vendors/filepond/filepond.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/public/vendors/filepond/filepond-plugin-image-preview.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/public/vendors/filepond/filepond-plugin-file-poster.min.css')}}">
    <!-- <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" /> -->
    <!-- Quill Form Editor CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/public/vendors/quill/quill.bubble.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/public/vendors/quill/quill.snow.css')}}">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/public/css/theme.min.css')}}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
@jquery
@toastr_js
@toastr_render
<body>
<div id="app">
    <div id="sidebar" class="active">
        <div class="sidebar-wrapper active" data-scrollbar>
            <div class="sidebar-header">
                <div class="d-flex justify-content-between">
                    <div class="logo">
                        <a href="{{url('user-index')}}"><img src="{{asset('admin/assets/public/images/logo/logo.png')}}" alt="Logo" srcset=""> <span class="fw-semi-blod fs-1">VoicePro</span></a>
                    </div>
                    <div class="toggler">
                        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                    </div>
                </div>
            </div>
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class="sidebar-title">Menu</li>
                    <li class="sidebar-item">
                        <a href="{{url('user-index')}}" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-item has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Pages</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item">
                                <a href="{{route('user.orders')}}">Order Information</a>
                            </li>
                            <li class="submenu-item">
                                <a href="{{route('user.inventory')}}">Package Information</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a href="{{route('userMessage.create')}}" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Message</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="{{url('/')}}" target="_blank" class='sidebar-link'>
                            <span>Website</span>
                        </a>
                    </li>

                </ul>
            </div>
            <!-- <button class="sidebar-toggler btn x"><span class="fas fa-times"></span></button> -->
        </div>
    </div>

    <div id="main" class="layout-navbar">
        <header class='mb-3'>
            <nav class="navbar navbar-expand navbar-light ">
                <div class="container-fluid">
                    <a href="#" class="burger-btn d-block">
                        <i class="bi bi-justify fs-3"></i>
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown me-1">
{{--                                <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                    <i class='bi bi-envelope bi-sub fs-4 text-gray-600'></i>--}}
{{--                                </a>--}}
{{--                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">--}}
{{--                                    <li>--}}
{{--                                        <h6 class="dropdown-header">Mail</h6>--}}
{{--                                    </li>--}}
{{--                                    <li><a class="dropdown-item" href="#">No new mail</a></li>--}}
{{--                                </ul>--}}
                            </li>
                            <li class="nav-item dropdown me-3">
{{--                                <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                    <i class='bi bi-bell bi-sub fs-4 text-gray-600'></i>--}}
{{--                                </a>--}}
{{--                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">--}}
{{--                                    <li>--}}
{{--                                        <h6 class="dropdown-header">Notifications</h6>--}}
{{--                                    </li>--}}
{{--                                    <li><a class="dropdown-item">No notification available</a></li>--}}
{{--                                </ul>--}}
                            </li>
                        </ul>
                        <div class="dropdown">
                            <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="user-menu d-flex">
                                    <div class="user-name text-end me-3">
                                        <h6 class="mb-0 text-gray-600">{{Auth::user()->f_name}} {{Auth::user()->l_name}}</h6>
                                        <p class="mb-0 text-sm text-gray-600">User</p>
                                    </div>
                                    <div class="user-img d-flex align-items-center">
                                        <div class="avatar avatar-md">
                                            <img src="{{asset('admin/assets/public/images/faces/1.jpg')}}">
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                <li>
                                    <h6 class="dropdown-header">Hello, {{Auth::user()->f_name}} {{Auth::user()->l_name}}</h6>
                                </li>
{{--                                <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My--}}
{{--                                        Profile</a></li>--}}
{{--                                <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>--}}
{{--                                        Settings</a></li>--}}
{{--                                <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-wallet me-2"></i>--}}
{{--                                        Wallet</a></li>--}}
{{--                                <li>--}}
{{--                                    <hr class="dropdown-divider">--}}
{{--                                </li>--}}
{{--                                <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>--}}
                                <li>
                                    <a href="{{ route('logout') }}" class="dropdown-item"  onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i class="icon-mid bi bi-box-arrow-left me-2"></i>  Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

    {{--        <div id="main">--}}
    {{--            <header class="mb-3">--}}
    {{--                <a href="#" class="burger-btn d-block d-xl-none">--}}
    {{--                    <i class="bi bi-justify fs-3"></i>--}}
    {{--                </a>--}}
    {{--            </header>--}}

    @yield('content')

    <!-- <footer>
   <div class="footer clearfix mb-0 text-muted">
     <div class="float-start">
       <p>2021 &copy; Mazer</p>
     </div>
     <div class="float-end">
       <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="http://ahmadsaugi.com">A. Saugi</a></p>
     </div>
   </div>
 </footer> -->
    </div>
</div>

<!-- Bootstrap JS -->
<script src="{{asset('admin/assets/public/vendors/@popperjs/popper.min.js')}}"></script>
<script src="{{asset('admin/assets/public/vendors/bootstrap/bootstrap.min.js')}}"></script>
<!-- IS JS -->
<script src="{{asset('admin/assets/public/vendors/is/is.min.js')}}"></script>

<!-- Polyfill JS -->
<script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>

<!-- FontAwesome JS -->
<script src="{{asset('admin/assets/public/vendors/fontawesome/all.min.js')}}"></script>

<!-- Perfect Scrollbar JS -->
<script src="{{asset('admin/assets/public/vendors/perfect-scrollbar/perfect-scrollbar.min.js)')}}"></script>

<!-- Filepond Image -->
<script src="{{asset('admin/assets/public/vendors/filepond/filepond-plugin-image-preview.min.js')}}"></script>
<!-- <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js)}}"></script> -->
<script src="{{asset('admin/assets/public/vendors/filepond/filepond.min.js')}}"></script>
<script src="{{asset('admin/assets/public/vendors/simple-datatables/simple-datatables.js')}}"></script>
<!-- Quill Form Editor JS -->
<script src="{{asset('admin/assets/public/vendors/quill/quill.min.js')}}"></script>

<!-- Theme JS -->
<script src="{{asset('admin/assets/public/js/theme.js')}}"></script>
</body>

</html>


















<ul class="submenu" style="display: none">
                                <li class="submenu-item">
                                    <a href="general-time.html">General Time</a>
                                </li>
    <li class="submenu-item">
        <a href="jamat-time.html">Jamat Time</a>
    </li>
    <div>
        <li class="submenu-item">
            <div>
                <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i class="fas fa-power-off"></i> Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </div>
</ul>
