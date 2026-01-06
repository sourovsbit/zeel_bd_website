@extends('frontend.layouts.master')

@extends('frontend.layouts.meta')

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
                        <span>Privacy Policy</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <div class="container-xxl">
        <section class="p-5">
            <div class="container">
                <div class="row">
                    <!-- Content Column -->
                    <div class="content-column col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="sec-title">
                                <p>{!! $data->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Main Content End -->
@endsection
