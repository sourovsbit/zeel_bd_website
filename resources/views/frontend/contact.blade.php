@extends('frontend.layouts.master')
@extends('frontend.layouts.meta')

@section('content')
    <!-- Navbar Start -->
    @include('frontend.layouts.navbar')

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section main-content mt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Contact</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Map Section Begin -->
    <div class="map spad">
        <div class="container">
            <div class="map-inner">
                <iframe
                    src="{{ $company->map }}"
                    height="305" style="border:0" allowfullscreen="">
                </iframe>
            </div>
        </div>
    </div>
    <!-- Map Section End -->

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-title text-center mb-5">
                        <h4>Get in Touch</h4>
                        <p class="text-muted">Have questions or need more information? Reach out to us via phone, email, or visit our office. We’re here to help!</p>
                    </div>
                    <div class="contact-widget">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="cw-item text-center mb-4">
                                    <div class="ci-icon mb-3">
                                        <i class="ti-location-pin fa-2x text-primary"></i>
                                    </div>
                                    <div class="ci-text">
                                        <span class="d-block font-weight-bold">Address</span>
                                        <p class="mb-0">{!! $company->address !!}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="cw-item text-center mb-4">
                                    <div class="ci-icon mb-3">
                                        <i class="ti-mobile fa-2x text-primary"></i>
                                    </div>
                                    <div class="ci-text">
                                        <span class="d-block font-weight-bold">Phone</span>
                                        <p class="mb-0">{{ $company->phone }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="cw-item text-center mb-4">
                                    <div class="ci-icon mb-3">
                                        <i class="ti-email fa-2x text-primary"></i>
                                    </div>
                                    <div class="ci-text">
                                        <span class="d-block font-weight-bold">Email</span>
                                        <p class="mb-0">{{ $company->email }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Main Content End -->
@endsection
