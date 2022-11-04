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
    <title>File Upload</title>
</head>

<body class="file-upload-page-body">
<section class="">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <!-- <a class="navbar-brand" href="#">

            </a> -->
            <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mx-auto gap-4">
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="{{route('documentFile.index')}}">File View</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white border-bottom" href="{{route('documentFile.create')}}">Upload Files</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('documentFile.create')}}">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('documentFile.create')}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('documentFile.create')}}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</section>

@yield('content')

<script>
    var input = document.getElementById('file-upload');
    var infoArea = document.getElementById('file-title');
    var button = document.getElementById('file-submit');

    input.addEventListener('change', showFileName);

    function showFileName(event) {
        var input = event.srcElement;
        var fileName = input.files[0].name;
        infoArea.innerText = 'File name: ' + fileName;
        button.style.display = "none";
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
</script>
</body>

</html>
