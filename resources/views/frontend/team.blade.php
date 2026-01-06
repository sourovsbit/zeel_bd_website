@extends('frontend.layouts.master')

@section('content')
    <!-- Navbar Start -->

        @include('frontend.layouts.navbar')

    <!-- Navbar End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section main-content mt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Team</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->


    <!-- Team Start -->

    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 order-1 order-lg-2">
                    <div class="product-list">
                        <div class="row">
                            @if($data)
                            @foreach($data as $d)
                            <div class="col-lg-3 col-sm-3">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img src="{{ asset('backend/Employee/EmployeeImage') }}/{{ $d->image }}" alt="" style="height: 320px;border-radius: 20px;">
                                    </div>
                                    <div class="pi-text">
                                        <h5>{{$d->name}}</h5>
                                        <div class="product-price">{{$d->designation}}</div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="loading-more">
                        <i class="icon_loading"></i>
                        <a href="#">
                            Loading More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Team End -->

    <!-- Main Content End -->
@endsection
