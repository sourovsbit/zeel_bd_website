@extends('frontend.layouts.master')
@extends('frontend.layouts.meta')

@section('content')
    @include('frontend.layouts.navbar')

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section main-content mt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                        <span>{{ $data->name }}'s Message</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <div class="container-xxl">
        <section class="p-5">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Image Column -->
                    <div class="col-lg-4 mb-4 mb-lg-0 text-center">
                        @php
                            $path = public_path('/backend/Administrative/AdministrativeImage/'.$data->image);
                        @endphp
                        @if(file_exists($path) && !empty($data->image))
                            <img src="{{ asset('/backend/Administrative/AdministrativeImage/'.$data->image) }}" alt="{{ $data->name }}" class="img-fluid rounded shadow" style="max-height: 300px; object-fit: cover;">
                        @else
                            <img src="{{ asset('frontend/assets/default-profile.png') }}" alt="Default Image" class="img-fluid rounded shadow" style="max-height: 300px; object-fit: cover;">
                        @endif
                    </div>

                    <!-- Content Column -->
                    <div class="col-lg-8">
                        <div class="inner-column text-justify">
                            <h2 class="mb-4">{{ $data->name }}'s Message</h2>
                            <div class="sec-title">
                                <p>{!! $data->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
