<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business VoicePro</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&amp;family=Rubik:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet">

    <!-- Overlay Scrollbars CSS -->
    <link rel="stylesheet" href="{{asset('visitor/assets/public/vendors/overlayscrollbars/OverlayScrollbars.min.cs')}}">

    <!-- Theme CSS -->
    <!-- <link rel="stylesheet" href="assets/public/css/theme-rtl.min.css"> -->
    <link rel="stylesheet" href="{{asset('visitor/assets/public/css/theme.min.css')}}">
</head>

<body>

<!-- Sign In Section Start -->
<section class="p-0 min-vh-100">
    <div class="container-fluid px-0">
        <div class="row gx-0">
            <div class="col-lg-6 d-none d-lg-block">
                <img src="{{asset('visitor/assets/public/img/login.jpg')}}" class="img-fluid h-100 min-vh-100 fit-cover" alt="">
            </div>
            <div class="col-lg-6 bg-white d-flex align-items-center">
                <div class="w-xxl-50 w-md-75 w-100 mx-auto py-6 px-4">
                    <div class="text-center pb-5">
                        <a class="navbar-brand m-0" href="index.html"><img src="{{asset('visitor/assets/public/img/logo.png')}}" width="80px" alt=""></a>
                    </div>
                    <h2 class="text-center mb-5">Sign In</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="input-group rounded-pill mb-3">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="text" value="foysal@gmail.com" class="form-control form-control-lg  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password"  value="foysal@gmail.com" class="form-control form-control-lg" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary btn-lg fs-1 w-100">Sign In</button>
                        </div>
                    </form>
                    <hr class="my-4" />
                    <div class="text-center">
                        <p><a class="text-primary" href="">Forgot Password?</a></p>
                        <p>Don't have an account? <a href="" class="text-primary">Sign Up Now</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Sign In Section End -->


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

<!-- Overlay Scrollbar JS -->
<script src="{{asset('visitor/assets/public/vendors/overlayscrollbars/OverlayScrollbars.min.js')}}"></script>

<!-- Theme JS -->
<script src="{{asset('visitor/assets/public/js/theme.js')}}"></script>
</body>

</html>
