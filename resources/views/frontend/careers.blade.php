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
                        <span>Career Opportunities</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <div class="container p-5">
        <div class="row">
            @if($data)
            @php $count = 0; @endphp
            @foreach($data as $d)
            <div class="col-lg-3 col-md-6 {{ $count >= 8 ? 'd-none extra-job' : '' }}">
                <div class="card job-card text-center p-3">
                    <img src="{{ asset('backend/Career/CareerImage/') }}/{{ $d->image }}" class="job-image" alt="{{ $d->job_title }}">
                    <h5 class="job-title mt-2">{{ $d->job_title }}</h5>
                    <span class="p-2">{!! $d->short_details !!}</span>
                    <a href="mailto:{{ $company->email }}?subject={{ $d->job_title }}" class="btn btn-primary">APPLY NOW</a>
                </div>
            </div>
            @php $count++; @endphp
            @endforeach

            <div class="col-lg-12">
                <div class="loading-more text-center mt-4">
                    <i class="icon_loading"></i>
                    <a href="javascript:void(0);" id="loadMoreJobs">Loading More</a>
                </div>
            </div>
            @endif

        </div>
    </div>
    <!-- Career End -->

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#loadMoreJobs").click(function() {
                $(".extra-job.d-none").slice(0, 8).removeClass("d-none").hide().fadeIn(400);
                if ($(".extra-job.d-none").length === 0) {
                    $("#loadMoreJobs").fadeOut();
                }
            });
        });
    </script>
    <!-- Main Content End -->

@endsection
