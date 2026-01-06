@extends('frontend.layouts.master')

@section('content')
    <!-- Navbar Start -->

        @include('frontend.layouts.navbar')

    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url({{ asset('') }}frontend/img/carousel-bg-1.jpg);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 mb-3 animated slideInDown">Photo Album</h1>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Photo Album Start -->
    <div class="container wow fadeIn" data-wow-delay="0.1s">
        <h3 class="text-primary text-uppercase mb-5">// Photo Album //</h3>
        <div class="row g-4">
            @if($data)
            @foreach($data as $d)
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" src="{{ asset('backend/PhotoGallery/PhotoGalleryImage') }}/{{ $d->image }}" alt="" style="width: 100%;height: 200px;">
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
    <!-- Photo Album End -->

    <!-- Main Content End -->
@endsection
