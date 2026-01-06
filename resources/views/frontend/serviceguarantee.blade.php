@extends('frontend.layouts.master')

@section('content')
    <!-- Navbar Start -->

        @include('frontend.layouts.navbar')

    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid page-header p-0" style="background-image: url({{ asset('') }}assets/img/banner.png);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-dark mb-3 animated slideInDown"> Our Service Guarantee</h1>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Service Guarantee Start -->
    <div class="content">
        <div class="container-xxl">
            <div class="container p-5 mt-5 mb-5 bg-light">
                {!! $data->description !!}
            </div>
        </div>
    </div>
    <!-- Service Guarantee End -->

    <!-- Main Content End -->
@endsection
