@extends('admin.layout.master')
@section('content')
<section class="container">
    <div class="user-box p-3 mt-4">
        <h3 class="text-dark">User Login Activity List</h3>
        <div class="under-line bg-black mb-3"></div>

        <div>
            <table id="myTable" class="text-dark table">
                <thead class="bg-white text-dark">
                <tr>
                    <th>Sl.</th>
                    <th>User Type</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Ip Address</th>
{{--                    <th>Action</th>--}}
                </tr>
                </thead>
                <tbody>
                @php $key=1; @endphp
                @foreach($activities as $value)
                <tr>
                    <td>{{$key++}}</td>
                    <td>@if($value->is_admin==1)Admin @else User @endif</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->date}}</td>
                    <td>{{$value->time}}</td>
                    <td>{{$value->ip_address}}</td>
{{--                    <td>--}}
{{--                        <div>--}}
{{--                            <a title="Edit" href=""><i class="bi bi-pencil-square text-dark"></i></a>--}}
{{--                            <a title="Delete" href=""><i class="bi bi-trash3-fill text-dark ms-3"></i></a>--}}
{{--                        </div>--}}
{{--                    </td>--}}
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
