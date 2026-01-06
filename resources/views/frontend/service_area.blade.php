@extends('frontend.layouts.master')

@extends('frontend.layouts.meta')

@section('content')
    <!-- Navbar Start -->

        @include('frontend.layouts.navbar')

    <!-- Navbar End -->

    <div class="content">
        <!-- Sell Your Furniture Section Two -->
        <section class="pt-3">
            <div class="container">
                <div class="row">
                    <!-- Content Column -->
                    <div class="content-column col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-5">
                        <div class="inner-column">
                            <div class="sec-title text-center">
                                <h1>{{ $data->category_name }}</h1><br>
                                <h3>{{ $data->category_name }} <a href="tel:+{{$company->phone}}">{{$company->phone}}</a>  على الجوال او واتساب</h3><br>
                                <a href="tel:+{{$company->phone}}" class="theme-btn btn-style-three btn-danger" style="background: red;"><span class="btn-title">اتصل للحصول على تقدير السعر</span><i class="fa fa-phone"></i></a><br>
                                <a href="https://wa.me/{{$company->sales_phone}}" class="theme-btn btn-style-three btn-success" style="background: green;"><span class="btn-title">واتس اب في اي وقت</span><i class="fab fa-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Sell Your Furniture Section Two -->

        <div class="container-xxl">
            <div class="container">
                <div class="row">
                    <!-- Content Column -->
                    <div class="content-column col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="sec-title">
                                <p>
                                    {!! $data->short_details !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Content Column -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <iframe src="{{ $data->map }}" frameborder="0" width="50%" height="300px"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content End -->
@endsection
