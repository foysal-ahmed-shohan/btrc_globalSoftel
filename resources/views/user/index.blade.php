@extends('user.layout.master')
@section('content')
    <div class="container">
        <div class="page-heading">
            <h3>Statistics</h3>
        </div>

        <div class="page-content">
            <section class="row">
                <div class="col-12 col-lg-9">
                    <div class="row">
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon purple">
                                                <i class="fas fa-eye text-white fs-2"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Total Expense</h6>
                                            <h6 class="font-extrabold mb-0">${{$total_amount}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon blue">
                                                <i class="fas fa-user text-white fs-2"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Last Order</h6>
                                            @if(isset($payment_info->date))
                                            <h6 class="font-extrabold mb-0">{{$payment_info->date}}</h6>
                                            @else
                                                <h6 class="font-extrabold mb-0">--</h6>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
{{--                        <div class="col-6 col-lg-3 col-md-6">--}}
{{--                            <div class="card">--}}
{{--                                <div class="card-body px-3 py-4-5">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-md-4">--}}
{{--                                            <div class="stats-icon green">--}}
{{--                                                <i class="fas fa-user-plus text-white fs-2"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-8">--}}
{{--                                            <h6 class="text-muted font-semibold">Last order Expired Date</h6>--}}
{{--                                            <h6 class="font-extrabold mb-0">$45</h6>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon red">
                                                <i class="fas fa-bookmark text-white fs-2"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Total Order</h6>
                                            <h6 class="font-extrabold mb-0">{{$order_count}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

