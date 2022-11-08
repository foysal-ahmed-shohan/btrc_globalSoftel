@extends('admin.layout.master')
@section('content')
    <section class="container">
        {{-- <h1 class="mt-5 mb-3">File Uploader Widget</h1>--}}
        <form method="POST" class="mt-5" action="{{ route('documentFile.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="file-upload-box row gap-3">
                <div class="col-md file-row">
                    <div class="file-upload-sub-box">
                        <input id="file-upload" required class="upload-box" type="file" name="file_document" multiple>
                        <div class="progress">
                            <div class="bar"></div>
                            <div class="percent">0%</div>
                        </div>
                        <label for="upload_costum" class="file-upload-label text-white">
                            <h3 id="file-title" class="file-name">Drag & Drop files here</h3>
                            <button id="file-submit" class="disabled">Open the file browser</button>
                        </label>
                    </div>
                </div>
                <div class="col-md p-3">
                    <div class="d-flex gap-4">
                        <input class="file-description border w-50 p-3" required type="date" name="date" id="">
                        <input class="file-description border w-50 p-3" type="time" name="time" id="">
                    </div>
                    <br>
                    <textarea placeholder="Note" class="file-description border w-100 p-3" name="note" id="" cols="30" rows="5"></textarea>
                    <button type="submit" class="mt-4 login-button w-100">Submit</button>
                </div>
            </div>
        </form>

        <div class="mt-3 mb-5">
            <div class="card card-style" style="height: 300px; overflow: auto;">
                <div class="card-body">
                    <h5 class="card-title border-bottom pb-2 px-0">File History</h5>
                    <div class="mt-3">
                        <table class="text-dark table">
                            <thead class="bg-white text-dark">
                            <tr>
                                <th>File Name</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Note</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($files as $value)
                                <tr>
                                    <td>{{$value->file_original_name}}</td>
                                    <td>{{date('d M, Y', strtotime($value->date))}}</td>
                                    <td>{{date('h:s:i A', strtotime($value->time))}}</td>
                                    <td>{{$value->note}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="w-100">
        <svg class="lower-wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#0B444A" fill-opacity="1" d="M0,192L26.7,192C53.3,192,107,192,160,197.3C213.3,203,267,213,320,229.3C373.3,245,427,267,480,282.7C533.3,299,587,309,640,282.7C693.3,256,747,192,800,165.3C853.3,139,907,149,960,170.7C1013.3,192,1067,224,1120,218.7C1173.3,213,1227,171,1280,133.3C1333.3,96,1387,64,1413,48L1440,32L1440,320L1413.3,320C1386.7,320,1333,320,1280,320C1226.7,320,1173,320,1120,320C1066.7,320,1013,320,960,320C906.7,320,853,320,800,320C746.7,320,693,320,640,320C586.7,320,533,320,480,320C426.7,320,373,320,320,320C266.7,320,213,320,160,320C106.7,320,53,320,27,320L0,320Z">
            </path>
        </svg>
    </div>
@endsection
@section('extra_script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
    <script type="text/javascript">
        var SITEURL = "{{URL('/')}}";
        $(function() {
            $(document).ready(function() {
                var bar = $('.bar');
                var percent = $('.percent');

                $('form').ajaxForm({
                    beforeSend: function() {
                        var percentVal = '0%';
                        bar.width(percentVal)
                        percent.html(percentVal);
                    },
                    uploadProgress: function(event, position, total, percentComplete) {
                        var percentVal = (percentComplete-1) + '%';
                        bar.width(percentVal)
                        percent.html(percentVal);
                    },
                    complete: function(xhr) {
                        //alert('File Has Been Uploaded Successfully');
                        window.location.href = SITEURL + "/" + "documentFile/create";
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('submit', 'form', function() {
                $('button').attr('disabled', 'disabled');
            });
        });
    </script>
@endsection
