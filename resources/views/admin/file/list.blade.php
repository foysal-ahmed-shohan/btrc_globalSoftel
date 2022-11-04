@extends('admin.layout.master')
@section('content')

<section class="container mt-4">
    <div class="file-view-box p-3 mb-5">
        <h3 class="text-white">Uploaded File</h3>
        <div class="under-line"></div>

        <div class="mt-2 p-3">
            <div class="row gap-4 view-box">
                <div class="card col-lg-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <img class="file-icon" src="{{asset('admin/Images/files-icon.png')}}" alt="">
                            </div>
                            <div class="col-8">
                                <a title="Download" class="download-file-button2" href=""><i
                                        class="bi text-black px-2 py-2 fs-3 bi-box-arrow-down"></i></a>
                                <a title="Delete" class="download-file-button text-danger px-2 py-0 fs-3" href="">
                                    <i class="bi bi-trash3-fill"></i>
                                </a>
                                <small>
                                    File Name: profile.jpeg
                                </small>
                                <small>
                                    Date of Upload: <br>
                                    27 july 1971
                                </small>
                                <small class="">
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Natus eaque,
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card col-lg-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <img class="file-icon" src="/Images/files-icon.png" alt="">
                            </div>
                            <div class="col-8">
                                <a title="Download" class="download-file-button2" href=""><i
                                        class="bi text-black px-2 py-2 fs-3 bi-box-arrow-down"></i></a>
                                <small>
                                    File Name: profile.jpeg
                                </small>
                                <small>
                                    Date of Upload: <br>
                                    27 july 1971
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card col-lg-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <img class="file-icon" src="/Images/files-icon.png" alt="">
                            </div>
                            <div class="col-8">
                                <a title="Download" class="download-file-button2" href=""><i
                                        class="bi text-black px-2 py-2 fs-3 bi-box-arrow-down"></i></a>
                                <small>
                                    File Name: profile.jpeg
                                </small>
                                <small>
                                    Date of Upload: <br>
                                    27 july 1971
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card col-lg-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <img class="file-icon" src="/Images/files-icon.png" alt="">
                            </div>
                            <div class="col-8">
                                <a title="Download" class="download-file-button2" href=""><i
                                        class="bi text-black px-2 py-2 fs-3 bi-box-arrow-down"></i></a>
                                <small>
                                    File Name: profile.jpeg
                                </small>
                                <small>
                                    Date of Upload: <br>
                                    27 july 1971
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card col-lg-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <img class="file-icon" src="/Images/files-icon.png" alt="">
                            </div>
                            <div class="col-8">
                                <a title="Download" class="download-file-button2" href=""><i
                                        class="bi text-black px-2 py-2 fs-3 bi-box-arrow-down"></i></a>
                                <small>
                                    File Name: profile.jpeg
                                </small>
                                <small>
                                    Date of Upload: <br>
                                    27 july 1971
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card col-lg-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <img class="file-icon" src="/Images/files-icon.png" alt="">
                            </div>
                            <div class="col-8">
                                <a title="Download" class="download-file-button2" href=""><i
                                        class="bi text-black px-2 py-2 fs-3 bi-box-arrow-down"></i></a>
                                <small>
                                    File Name: profile.jpeg
                                </small>
                                <small>
                                    Date of Upload: <br>
                                    27 july 1971
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="w-100">
    <svg class="lower-wave fixed-bottom" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#0B444A" fill-opacity="1"
              d="M0,32L34.3,37.3C68.6,43,137,53,206,101.3C274.3,149,343,235,411,256C480,277,549,235,617,213.3C685.7,192,754,192,823,202.7C891.4,213,960,235,1029,224C1097.1,213,1166,171,1234,138.7C1302.9,107,1371,85,1406,74.7L1440,64L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
        </path>
    </svg>
</div>

@endsection
