@extends('admin.layout.master')
@section('content')
<div class="container">
  <div class="page-heading">
    <h3>Statistics</h3>
  </div>

  <div class="page-content">
    <section>
      <div class="row row-cols-2 row-cols-lg-3 row-cols-xl-5">
        <div class="col">
          <div class="card">
            <div class="card-body px-3 py-4-5">
              <div class="row">
                <div class="col-md-4">
                  <div class="stats-icon purple">
                    <i class="fas fa-eye text-white fs-2"></i>
                  </div>
                </div>
                <div class="col-md-8">
                  <h6 class="text-muted font-semibold"><a href="{{route('commerce.customer_list')}}"> Total Customer</a></h6>
                  <h6 class="font-extrabold mb-0">{{$total_user}}</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <div class="card-body px-3 py-4-5">
              <div class="row">
                <div class="col-md-4">
                  <div class="stats-icon blue">
                    <i class="fas fa-user text-white fs-2"></i>
                  </div>
                </div>
                <div class="col-md-8">
                  <h6 class="text-muted font-semibold"><a href="{{route('commerce.orders')}}">Total Sale</a></h6>
                  <h6 class="font-extrabold mb-0">{{$total_sale}}</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <div class="card-body px-3 py-4-5">
              <div class="row">
                <div class="col-md-4">
                  <div class="stats-icon green">
                    <i class="fas fa-user-plus text-white fs-2"></i>
                  </div>
                </div>
                <div class="col-md-8">
                  <h6 class="text-muted font-semibold">Total Revenue</h6>
                  <h6 class="font-extrabold mb-0">${{$total_amount}}</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <div class="card-body px-3 py-4-5">
              <div class="row">
                <div class="col-md-4">
                  <div class="stats-icon red">
                    <i class="fas fa-bookmark text-white fs-2"></i>
                  </div>
                </div>
                <div class="col-md-8">
                  <h6 class="text-muted font-semibold"><a href="{{route('commerce.inventory')}}">Total Product</a></h6>
                  <h6 class="font-extrabold mb-0">{{$total_product}}</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <div class="card-body px-3 py-4-5">
              <div class="row">
                <div class="col-md-4">
                  <div class="stats-icon purple">
                    <i class="fas fa-eye text-white fs-2"></i>
                  </div>
                </div>
                <div class="col-md-8">
                  <h6 class="text-muted font-semibold">Total Lead</h6>
                  <h6 class="font-extrabold mb-0">{{$total_lead}}</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="row">
        <div class="col-12 col-lg-6 col-xxl-4 mb-4">
          <div class="card mb-0 h-100">
            <div class="card-header">
              <h4 class="mb-0">Recent Activity</h4>
            </div>
            <div class="card-content pb-4">
                @foreach($activities as $value)
                  <div class="recent-message d-flex px-4 py-3">
                    <div class="avatar avatar-lg">
                      <img src="{{asset('admin/assets/public/images/icon/announcement.png')}}">
                    </div>
                    <div class="name ms-4">
{{--                     order=1, message=1, package=3--}}
                      @if($value->activity_type==1)
                      <h6 class="mb-1">New order Purchase</h6>
                      @elseif($value->activity_type==3)
                      <h6 class="mb-1">New Package Added</h6>
                      @endif
                      <small class="text-muted">at {{$value->date}} {{$value->time}}</small>
                    </div>
                  </div>
                @endforeach
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6 col-xxl-4 mb-4">
          <div class="card mb-0 h-100">
            <div class="card-header">
              <h4 class="mb-0">Recent Orders</h4>
            </div>
            <div class="card-content">
                @foreach($orders as $value)
                    <?php $package=DB::table('packages')->where('id',$value->package_id)->first(); ?>
                  <div class="recent-message d-flex px-4 py-3">
                    <div class="avatar avatar-lg">
                      <img src="{{asset('admin/assets/public/images/icon/shopping-cart.png')}}">
                    </div>
                    <div class="name ms-4 me-1 flex-1">
                      <h6 class="mb-1">{{$package->package_title}}</h6>
                      <span class="badge bg-light-success rounded-pill">Delivered</span>
                    </div>
                    <h5 class="ms-auto">{{$value->amount}}$</h5>
                  </div>
                @endforeach
{{--              <div class="recent-message d-flex px-4 py-3">--}}
{{--                <div class="avatar avatar-lg">--}}
{{--                  <img src="{{asset('admin/assets/public/images/icon/shopping-cart.png')}}">--}}
{{--                </div>--}}
{{--                <div class="name ms-4 me-1 flex-1">--}}
{{--                  <h6 class="mb-1">Predictive dialer 2</h6>--}}
{{--                  <span class="badge bg-light-danger rounded-pill">Not Delivered</span>--}}
{{--                </div>--}}
{{--                <h5 class="ms-auto">250$</h5>--}}
{{--              </div>--}}
{{--              <div class="recent-message d-flex px-4 py-3">--}}
{{--                <div class="avatar avatar-lg">--}}
{{--                  <img src="{{asset('admin/assets/public/images/icon/shopping-cart.png')}}">--}}
{{--                </div>--}}
{{--                <div class="name ms-4 me-1 flex-1">--}}
{{--                  <h6 class="mb-1">Predictive dialer 3</h6>--}}
{{--                  <span class="badge bg-light-success rounded-pill">Delivered</span>--}}
{{--                </div>--}}
{{--                <h5 class="ms-auto">250$</h5>--}}
{{--              </div>--}}
{{--              <div class="recent-message d-flex px-4 py-3">--}}
{{--                <div class="avatar avatar-lg">--}}
{{--                  <img src="{{asset('admin/assets/public/images/icon/shopping-cart.png')}}">--}}
{{--                </div>--}}
{{--                <div class="name ms-4 me-1 flex-1">--}}
{{--                  <h6 class="mb-1">Broadcasting Press 1</h6>--}}
{{--                  <span class="badge bg-light-success rounded-pill">Delivered</span>--}}
{{--                </div>--}}
{{--                <h5 class="ms-auto">250$</h5>--}}
{{--              </div>--}}
{{--              <div class="recent-message d-flex px-4 py-3">--}}
{{--                <div class="avatar avatar-lg">--}}
{{--                  <img src="{{asset('admin/assets/public/images/icon/shopping-cart.png')}}">--}}
{{--                </div>--}}
{{--                <div class="name ms-4 me-1 flex-1">--}}
{{--                  <h6 class="mb-1">Business CRM</h6>--}}
{{--                  <span class="badge bg-light-danger rounded-pill">Not Delivered</span>--}}
{{--                </div>--}}
{{--                <h5 class="ms-auto">250$</h5>--}}
{{--              </div>--}}
            </div>
            <div class="card-footer border-top-0">
              <a href="{{route('commerce.orders')}}" class="btn btn-block btn-xl btn-light-primary font-bold mt-3">See all orders</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
@endsection
