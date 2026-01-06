@extends('frontend.layouts.master')

@section('meta')

<meta property="og:title" content="{{ $data->service_name }}">
<meta property="og:description" content="{{ $data->meta_description }}">
<meta property="og:image" content="https://dammamused.com/backend/CompanyProfile/CompanyProfileIcon/1610936015.png">
<meta property="og:url" content="https://dammamused.com">
<meta property="og:type" content="website">
<meta name="keywords" content="{{ $data->meta_tag }}">

@endsection



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
                                <h1>{{ $data->service_name }}</h1><br>
                                <h3>{{ $data->service_name }} <a href="tel:+{{$company->phone}}">{{$company->phone}}</a>  على الجوال او واتساب</h3><br>
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
                                    {!! $data->description !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content End -->
@endsection
