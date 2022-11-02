<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Business VoicePro</title>
  @toastr_css
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <!-- font awesome link -->
    <script src="https://kit.fontawesome.com/b38b068c48.js" crossorigin="anonymous"></script>
  <?php
    $site_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $site_url=str_replace("https://www.","https://",$site_url);
    $canonical_url=$site_url;
    $url_slug=substr($site_url,33);
   // $url_slug=substr($site_url,42);//local
    $blog_url=$site_url;
    $seo_value=DB::table('pages')->where('slug',$url_slug)->first();
    $blog_view_check = Str::contains($blog_url, '/blogs/');
    $resource_view_check = Str::contains($blog_url, '/resources/');
    //$site_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $ip_address=\Request::ip();
    date_default_timezone_set('US/Eastern');
    $date = date('M d, Y');
    $time = date('h:iA').' EST';
    DB::table('user_url_hits_records')
        ->insert([
            'ip_address' => $ip_address,
            'site_url' => $site_url,
            'date'=>$date,
            'time'=>$time]);
    ?>
  <link rel="canonical" href="{{$canonical_url}}" />
  @if($seo_value)
  <title>{{$seo_value->title}}</title>
  <meta name="description" content="{{$seo_value->meta_description}}">
  <meta name="keywords" content="{{$seo_value->meta_tag}}">
  <meta name="SEO title" content="{{$seo_value->seo_title}}">
  <meta property="og:title" content="{{$seo_value->seo_title}}" />
  {{--        <meta property="og:image" content="{{asset($seo_value->cover_image)}}" />--}}
  <meta property="og:type" content="{{$site_url}}" />
  @endif
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&amp;family=Rubik:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
  <!-- Theme CSS -->
  <!-- <link rel="stylesheet" href="assets/public/css/theme-rtl.min.css"> -->
  <link rel="stylesheet" href="{{asset('visitor/assets/public/css/theme.css')}}">
  {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
  {{--    this one for stripe--}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  {{--    stripe required end--}}
</head>

<body>
@jquery
@toastr_css
@toastr_js
  <!-- Nav Section Start -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-4 d-block" data-navbar-on-scroll="data-navbar-on-scroll">
    <div class="container"><a class="navbar-brand" href="index.html"><img src="{{asset('visitor/assets/public/img/logo.png')}}" height="45" alt="logo" /> <span
          class="fs-3 fw-medium text-900">VoicePro</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
      <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto pt-2 pt-lg-0 font-base">
          <li class="nav-item px-2"><a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a></li>
          <li class="nav-item dropdown px-2">
            <a class="d-inline-block py-2 text-900 text-decoration-none dropdown-toggle" href="#" id="solutionNav" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Solution
            </a>
            <ul class="dropdown-menu" aria-labelledby="solutionNav">
              <li><a class="dropdown-item" href="{{route('visitor.large_business')}}">Small Business</a></li>
              <li><a class="dropdown-item" href="{{route('visitor.small_business')}}">Large Business</a></li>
              <li><a class="dropdown-item" href="{{route('visitor.crm')}}">CRM</a></li>
              <li><a class="dropdown-item" href="{{route('visitor.fax_broadcasting')}}">Fax Broadcasting</a></li>
              <li><a class="dropdown-item" href="{{route('visitor.sms_broadcasting')}}">SMS Broadcasting</a></li>
              <li><a class="dropdown-item" href="{{route('visitor.political_campaign')}}">Political Campaign</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="{{route('visitor.call_center')}}">Call Center</a></li>
            </ul>
          </li>
          <li class="nav-item px-2"><a class="nav-link" aria-current="page" href="{{route('visitor.sip_trunk')}}">Sip Trank</a></li>
          <li class="nav-item dropdown px-2">
            <a class="d-inline-block py-2 text-900 text-decoration-none dropdown-toggle" href="#" id="packagesNav" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              VOIP Packages
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="{{route('visitor.economy_package')}}">Economy</a></li>
              <li><a class="dropdown-item" href="{{route('visitor.premium_package')}}">Premium</a></li>
            </ul>
          </li>
          <li class="nav-item px-2"><a class="nav-link" aria-current="page" href="{{route('visitor.contact')}}">Contact</a></li>
          <li class="nav-item px-2"><a class="nav-link" aria-current="page" href="{{route('blog.index')}}">Blog</a></li>
          @if (Auth::check())
          <li class="nav-item px-2"><a class="nav-link" aria-current="page" href="{{route('admin.index')}}">Dashboard</a></li>
          @endif

        </ul>
        <div class="d-flex flex-column flex-lg-row align-items-start align-items-lg-stretch px-2">
          <a class="btn btn-primary order-1 order-lg-0" href="{{route('login')}}">Sign In</a>
          {{--                cart--}}
          {{--                <button class="btn btn-outline-light btn-sm ms-2 position-relative" type="button" data-bs-toggle="offcanvas" data-bs-target="#cartOffcanvas">--}}
          {{--                    <i class="fas fa-shopping-cart text-800 position-lg-relative"></i>--}}
          {{--                    <span class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-primary p-1 fs--1 d-flex flex-center"--}}
          {{--                          style="height: 1.5rem; width: 1.5rem;">3</span></button>--}}
        </div>
      </div>
    </div>
  </nav>
  <!-- Nav Section End -->

  <!-- Cart OffCanvas Start -->
  <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="cartOffcanvas" aria-labelledby="cartOffcanvas">
    <div class="offcanvas-header bg-light">
      <h4>Cart</h4>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body position-relative">
      <div class="mb-4 px-2">

        <div class="border-bottom py-2 row">
          <div class="col">
            <h5 class="card-title">Economy Package</h5>
            <a href="#!" class="text-danger">Remove</a>
          </div>
          <div class="col-auto">
            <p class="text-500 mb-0">$500</p>
          </div>
          <div class="col-auto">
            <p class="text-500 mb-0">x1</p>
          </div>
        </div>
        <div class="border-bottom py-2 row">
          <div class="col">
            <h5 class="card-title">Economy Package</h5>
            <a href="#!" class="text-danger">Remove</a>
          </div>
          <div class="col-auto">
            <p class="text-500 mb-0">$500</p>
          </div>
          <div class="col-auto">
            <p class="text-500 mb-0">x1</p>
          </div>
        </div>
        <div class="border-bottom py-2 row">
          <div class="col">
            <h5 class="card-title">Economy Package</h5>
            <a href="#!" class="text-danger">Remove</a>
          </div>
          <div class="col-auto">
            <p class="text-500 mb-0">$500</p>
          </div>
          <div class="col-auto">
            <p class="text-500 mb-0">x1</p>
          </div>
        </div>
      </div>
      <div class="position-absolute bottom-0 start-0 w-100">
        <button class="btn btn-primary fs-1 w-100 rounded-0">Proceed To Checkout ($1500)</button>
      </div>
    </div>
  </div>

  @yield('content')

  <footer class="bg-light py-4 py-lg-6">
    <div class="container">
      <div class="row">
        <div class="col-lg-2 col-md-4 col-6">
          <h4>Important</h4>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link ps-0" href="#">Economy Package</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ps-0" href="#">Premium Package</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ps-0" href="#">SIP Trunk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ps-0">Small Business</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ps-0">Large Business</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-4 col-6">
          <h4>Support</h4>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link ps-0" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ps-0" href="#">Career</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ps-0" href="#">Privacy Policy</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ps-0">Terms & Conditions</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ps-0">Get A Quote</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-4 text-center align-self-center d-none d-lg-block">
          <div class="navbar-brand mb-4"><img src="{{asset('visitor/assets/public/img/logo.png')}}" height="200" alt="logo" /></div>
          <!-- <p>Our main goal is to improve customer experience and efficiency with an all-in-one solution voice, video, chat, contact, and call center.</p> -->

        </div>
        <div class="col-md-4 col-12 mt-4 mt-md-0">
          <h4 class="mb-3">Company</h4>
          <div class="mb-2"><i class="fas fa-phone-alt"></i> <a class="text-700" href="tel:5714630100">(571) 463 0100</a></div>
          <div class="mb-4"><i class="fas fa-envelope"></i> <a class="text-700" href="mailto:sales@businessvoicepro.com">sales@businessvoicepro.com</a></div>
          <div class="d-flex">
            <img src="{{asset('visitor/assets/public/img/paypal-stripe-logo.png')}}" class="img-fluid me-3 w-50" alt="">
            <img src="{{asset('visitor/assets/public/img/godaddy-secured-image.gif')}}" class="img-fluid w-50" alt="">
          </div>
        </div>
      </div>
      <div class="mt-5 border-top pt-4">
        <p class="text-center mb-0">Ⓒ Copyright by Voice Pro, LLC™ | All rights reserved | 2021</p>
      </div>
    </div>
  </footer>
  <div class="position-fixed end-0 bottom-0">
    <button data-scroll-to data-offset-top id="scroll-to" class="btn bg-dark text-light icon-item icon-item-lg fs-3 mb-4"><i class="fas fa-chevron-up"></i></button>
  </div>
  <!-- Footer End -->

  <!-- Bootstrap JS -->
  <script src="{{asset('visitor/assets/public/vendors/@popperjs/popper.min.js')}}"></script>
  <script src="{{asset('visitor/assets/public/vendors/bootstrap/bootstrap.min.js')}}"></script>

  <!-- IS JS -->
  <script src="{{asset('visitor/assets/public/vendors/is/is.min.js')}}"></script>

  <!-- Polyfill JS -->
  <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>

  <!-- FontAwesome JS -->
  <script src="{{asset('visitor/assets/public/vendors/fontawesome/all.min.js')}}"></script>

  <!-- Big Picture JS -->
  <script src="{{asset('visitor/assets/public/vendors/bigpicture/BigPicture.min.js')}}"></script>
  <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  <!-- Theme JS -->
  <script src="{{asset('visitor/assets/public/js/theme.js')}}"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
</body>

</html>
