@extends('admin.layout.master')
@section('content')
<section class="container">
    <div class="user-box p-3 mt-4">
        <h3 class="text-dark">User List</h3>
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
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>1</td>
                    <td>Nur Tesla</td>
                    <td>assraf.nur@gmail.com</td>
                    <td>21 February 2022</td>
                    <td>10:00 AM</td>
                    <td>
                        <div>
                            <a title="Edit" href=""><i class="bi bi-pencil-square text-dark"></i></a>
                            <a title="Delete" href=""><i class="bi bi-trash3-fill text-dark ms-3"></i></a>
                        </div>
                    </td>
                </tr>


                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
