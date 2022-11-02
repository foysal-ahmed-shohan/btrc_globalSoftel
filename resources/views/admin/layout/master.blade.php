<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Business VoicePro</title>
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
  @toastr_css
  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <!-- Bootstrap Icons CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">

    <!-- Filepond Image -->
  <link rel="stylesheet" href="{{asset('admin/assets/public/vendors/filepond/filepond.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/assets/public/vendors/filepond/filepond-plugin-image-preview.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/assets/public/vendors/filepond/filepond-plugin-file-poster.min.css')}}">
  <!-- <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" /> -->
  <!-- Quill Form Editor CSS -->
  <link rel="stylesheet" href="{{asset('admin/assets/public/vendors/quill/quill.bubble.css')}}">
  <link rel="stylesheet" href="{{asset('admin/assets/public/vendors/quill/quill.snow.css')}}">
  <!-- Simple Datatable CSS -->
  <link rel="stylesheet" href="{{asset('admin/assets/public/vendors/simple-datatables/style.css')}}">
  <!-- Flatpkr CSS -->
  <link rel="stylesheet" href="{{asset('admin/assets/public/vendors/flatpickr/flatpickr.min.css')}}">
  <!-- Flatpkr CSS -->
  <link rel="stylesheet" href="{{asset('admin/assets/public/vendors/choices.js/choices.min.css')}}">
  <!-- Perfect Scrollbar CSS -->
  <link rel="stylesheet" href="{{asset('admin/assets/public/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
  <!-- Theme CSS -->
{{--  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">--}}
  <link rel="stylesheet" href="{{asset('admin/assets/public/css/theme.min.css')}}">
    <script type="text/javascript">
        var base_url='<?php echo url('/');?>';
    </script>
</head>

<body>
@jquery
@toastr_css
@toastr_js
  <div id="app">
    <?php
        $site_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $url_page = Str::contains($site_url, '/pages'); //true or false
        $url_package = Str::contains($site_url, '/package'); //true or false
        $url_package_category = Str::contains($site_url, '/package_category'); //true or false
        $url_commerce = Str::contains($site_url, '/commerce'); //true or false
        $url_contact = Str::contains($site_url, '/contact'); //true or false
        $url_adminNoteStatus = Str::contains($site_url, '/adminNoteStatus'); //true or false
        $url_dashboard = Str::contains($site_url, '/admin-index'); //true or false
    ?>
    <div id="sidebar" class="active">
      <div class="sidebar-wrapper active" data-scrollbar>
        <div class="sidebar-header">
          <div class="d-flex justify-content-between">
            <div class="logo">
              <a href="{{url('admin-index')}}"><img src="{{asset('admin/assets/public/images/logo/logo.png')}}" alt="Logo" srcset=""> <span
                  class="fw-semi-blod fs-1">VoicePro</span></a>
            </div>
            <div class="toggler">
              <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
          </div>
        </div>
        <div class="sidebar-menu">
          <ul class="menu">
            <li class="sidebar-title">Menu</li>
            @if($url_dashboard=='true')
            <li class="sidebar-item active">
              @else
            <li class="sidebar-item">
              @endif
              <a href="{{url('admin-index')}}" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
              </a>
            </li>
            @if($url_page=='true')
            <li class="sidebar-item has-sub active">
              @else
            <li class="sidebar-item has-sub">
              @endif
              <a href="#" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                <span>Pages</span>
              </a>
              @if($url_page=='true')
              <ul class="submenu active">
                @else
                <ul class="submenu">
                  @endif

                  <li class="submenu-item">
                    <a href="{{route('pages.create_pages')}}">Add Page</a>
                  </li>
                  <li class="submenu-item">
                    <a href="{{route('pages.page_list')}}">Page List</a>
                  </li>
                </ul>
            </li>
            @if($url_package=='true')
            <li class="sidebar-item has-sub active">
              @else
            <li class="sidebar-item has-sub">
              @endif
              <a href="#" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                <span>Packages</span>
              </a>
              @if($url_package=='true')
              <ul class="submenu active">
                @else
                <ul class="submenu">
                  @endif
                  <li class="submenu-item">
                    <a href="{{route('package.index')}}">All Package</a>
                  </li>
                  <li class="submenu-item">
                    <a href="{{route('package.create')}}">Add Package Item</a>
                  </li>

                </ul>
            </li>
            {{--                    @if($url_package_category=='true')--}}
            {{--                        <li class="sidebar-item has-sub active">--}}
            {{--                    @else--}}
            <li class="sidebar-item has-sub">
              {{--                    @endif--}}
              <a href="#" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                <span>Packages Category</span>
              </a>
              {{--                    @if($url_package_category=='true')--}}
              {{--                     <ul class="submenu active">--}}
              {{--                    @else--}}
              <ul class="submenu">
                {{--                    @endif--}}
                <li class="submenu-item">
                  <a href="{{route('package_category.create')}}">Add Package Category</a>
                </li>
                <li class="submenu-item">
                  <a href="{{route('package_category.index')}}">Package Category List</a>
                </li>
              </ul>
            </li>
            @if($url_commerce=='true')
            <li class="sidebar-item has-sub active">
              @else
            <li class="sidebar-item has-sub">
              @endif
              <a href="#" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                <span>Commerce</span>
              </a>
              @if($url_commerce=='true')
              <ul class="submenu active">
                @else
                <ul class="submenu">
                  @endif
                  <li class="submenu-item">
                    <a href="{{route('commerce.orders')}}">Orders</a>
                  </li>
                  <li class="submenu-item">
                    <a href="{{route('commerce.customer_list')}}">Customers</a>
                  </li>
                  <li class="submenu-item">
                    <a href="{{route('commerce.inventory')}}">Inventory</a>
                  </li>
                    <li class="submenu-item">
                        <a href="{{route('adminCustomer.create')}}">Customer Added</a>
                    </li>
                </ul>
            </li>

            {{--                    <li class="sidebar-item">--}}
            {{--                        <a href="#" class='sidebar-link'>--}}
            {{--                            <i class="bi bi-stack"></i>--}}
            {{--                            <span>Newsletter</span>--}}
            {{--                        </a>--}}
            {{--                    </li>--}}

            @if($url_contact=='true')
            <li class="sidebar-item has-sub active">
              @else
            <li class="sidebar-item has-sub">
              @endif
              <a href="#" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                <span>Leads</span>
              </a>
              @if($url_contact=='true')
              <ul class="submenu active">
                @else
                <ul class="submenu">
                  @endif
                  {{--                            <li class="submenu-item active">--}}
                  <li class="submenu-item">
                    <a href="{{route('contact.show','subscribe')}}">Subscriber</a>
                  </li>
                  <li class="submenu-item">
                    <a href="{{route('contact.show','contact')}}">Leads</a>
                  </li>
                  {{--                            <li class="submenu-item">--}}
                  {{--                                <a href="{{route('contact.show','sip')}}">Sip Trunk</a>--}}
                  {{--                            </li>--}}
                  {{--                            <li class="submenu-item">--}}
                  {{--                                <a href="{{route('contact.show','fax')}}">Fax Broadcastin</a>--}}
                  {{--                            </li>--}}
                  {{--                            <li class="submenu-item">--}}
                  {{--                                <a href="{{route('contact.show','political')}}">Political</a>--}}
                  {{--                            </li>--}}
                  {{--                            <li class="submenu-item">--}}
                  {{--                                <a href="{{route('contact.show','economy')}}">Economy Package</a>--}}
                  {{--                            </li>--}}
                  {{--                            <li class="submenu-item">--}}
                  {{--                                <a href="{{route('contact.show','premium')}}">Premium Package</a>--}}
                  {{--                            </li>--}}
                </ul>
            </li>

            @if($url_adminNoteStatus=='true')
            <li class="sidebar-item has-sub active">
              @else
            <li class="sidebar-item has-sub">
              @endif
              <a href="#" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                <span>Setting</span>
              </a>
              @if($url_adminNoteStatus=='true')
              <ul class="submenu active">
                @else
                <ul class="submenu">
                  @endif
                  <li class="submenu-item">
                    <a href="{{route('adminNoteStatus.index')}}">Note Status</a>
                  </li>
                </ul>
            </li>
                      <li class="sidebar-item has-sub">

                          <a href="#" class='sidebar-link'>
                              <i class="bi bi-stack"></i>
                              <span>Blog</span>
                          </a>
                          <ul class="submenu">
                              <li class="submenu-item"><a href="{{route('admin-blog.index')}}">Blog List</a></li>
                              <li class="submenu-item"><a href="{{route('admin-blog.create')}}">Add Blog</a></li>
                              <li class="submenu-item"><a href="{{route('admin.draft_blog_list')}}">Drafted Blog List</a></li>
                              <li class="submenu-item"><a href="{{route('blog-category.index')}}">Blog Category</a></li>
                              <li class="submenu-item"><a href="{{route('admin.comment_request')}}">Comment Request</a></li>
                          </ul>
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
{{--                <li class="nav-item dropdown me-1">--}}
{{--                  <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                    <i class='bi bi-envelope bi-sub fs-4 text-gray-600'></i>--}}
{{--                  </a>--}}
{{--                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">--}}
{{--                    <li>--}}
{{--                      <h6 class="dropdown-header">Mail</h6>--}}
{{--                    </li>--}}
{{--                    <li><a class="dropdown-item" href="#">No new mail</a></li>--}}
{{--                  </ul>--}}
{{--                </li>--}}
{{--                <li class="nav-item dropdown me-3">--}}
{{--                  <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                    <i class='bi bi-bell bi-sub fs-4 text-gray-600'></i>--}}
{{--                  </a>--}}
{{--                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">--}}
{{--                    <li>--}}
{{--                      <h6 class="dropdown-header">Notifications</h6>--}}
{{--                    </li>--}}
{{--                    <li><a class="dropdown-item">No notification available</a></li>--}}
{{--                  </ul>--}}
{{--                </li>--}}
              </ul>
              <div class="dropdown">
                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                  <div class="user-menu d-flex">
                    <div class="user-name text-end me-3">
                      <h6 class="mb-0 text-gray-600">{{Auth::user()->f_name}} {{Auth::user()->l_name}}</h6>
                      <p class="mb-0 text-sm text-gray-600">Admin</p>
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
                    <h6 class="dropdown-header">Hello, John!</h6>
                  </li>
                  <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                      Profile</a></li>
                  <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                      Settings</a></li>
                  <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-wallet me-2"></i>
                      Wallet</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  {{--                                <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>--}}
                  <li>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a>
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
{{--  <link rel="stylesheet" href="{{asset('visitor/additional_cssJs/toastr.min.css')}}">--}}
  <script src="{{asset('admin/assets/public/vendors/@popperjs/popper.min.js')}}"></script>
  <script src="{{asset('admin/assets/public/vendors/bootstrap/bootstrap.min.js')}}"></script>
  <!-- IS JS -->
  <script src="{{asset('admin/assets/public/vendors/is/is.min.js')}}"></script>
  <!-- Polyfill JS -->
  <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
  <!-- FontAwesome JS -->
  <script src="{{asset('admin/assets/public/vendors/fontawesome/all.min.js')}}"></script>
  <!-- Filepond Image -->
  <script src="{{asset('admin/assets/public/vendors/filepond/filepond-plugin-image-preview.min.js')}}"></script>
  <!-- <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js)}}"></script> -->
  <script src="{{asset('admin/assets/public/vendors/filepond/filepond.min.js')}}"></script>
  <script src="{{asset('admin/assets/public/vendors/simple-datatables/simple-datatables.js')}}"></script>
  <!-- Quill Form Editor JS -->
  <script src="{{asset('admin/assets/public/vendors/quill/quill.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <!-- Simple Datatable -->
  <script src="{{asset('admin/assets/public/vendors/simple-datatables/simple-datatables.js')}}"></script>
  <!-- Simple Datatable -->
  <script src="{{asset('admin/assets/public/vendors/flatpickr/flatpickr.min.js')}}"></script>
  <!-- Simple Datatable -->
  <script src="{{asset('admin/assets/public/vendors/choices.js/choices.min.js')}}"></script>
  <!-- Perfect Scrollbar JS -->
  <script src="{{asset('admin/assets/public/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>

  <script src="{{asset('admin/assets/public/js/theme.js')}}"></script>
  <script src="{{ asset('js/app.js') }}"></script>
    @yield('extra_script')
</body>
</html>
