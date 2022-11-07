<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('admin/CSS/style.css')}}">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <title>Login Page</title>
</head>

<body class="login-page-body">
@jquery
@toastr_js
@toastr_render
<form method="POST" action="{{ route('login') }}">
@csrf
<section>
    <div class="login-box mx-auto">
        <h1 class="text-white text-center">Log in</h1>
        <p class="text-center mt-5 mb-3">Log in and start managing your files!</p>

        <input type="email" placeholder="email" id="exampleInputEmail1" class="input-field w-100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
        @error('email')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
        <input type="password" placeholder="password"  id="exampleInputEmail1" class="input-field w-100 mt-4 @error('password') "is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
        @error('password')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
        <div class="d-flex justify-content-between mt-4">
            <div>
                <input type="checkbox" class="check ms-1" id="exampleCheck1">
                <label class="form-check-label ms-2" for="exampleCheck1">Remember me</label>
            </div>

            <a class="forgot-text mb-1">Forgot password?</a>
        </div>

        <button type="submit" class="login-button w-100 mt-3">Login</button>
    </div>
    <div>
        <img class="bottom-lines fixed-bottom" src="{{asset('admin/Images/back-lines.png')}}" alt="">
    </div>
</section>
</form>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
</script>
</body>

</html>
