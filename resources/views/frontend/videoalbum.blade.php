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
                        <span>Video Gallery</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Video Album Start -->
    <div class="container-xxl">
        <div class="container gallery">
            <div class="row">
                @if($data)
                    @php $count = 0; @endphp
                    @foreach($data as $d)
                    <div class="col-lg-4 col-md-6 col-sm-12 {{ $count >= 6 ? 'd-none extra-video' : '' }}">
                        <div class="gallery-item">
                            <iframe src="{{ $d->url }}" frameborder="0" width="100%" style="height: 200px;"></iframe>
                        </div>
                    </div>
                    @php $count++; @endphp
                    @endforeach

                    <div class="col-lg-12 text-center">
                        <div class="loading-more mt-4">
                            <i class="icon_loading"></i>
                            <a href="javascript:void(0);" id="loadMoreVideos">Loading More</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Video Album End -->


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#loadMoreVideos").click(function() {
                $(".extra-video.d-none").slice(0, 6).removeClass("d-none").hide().fadeIn(400);
                if ($(".extra-video.d-none").length === 0) {
                    $("#loadMoreVideos").fadeOut();
                }
            });
        });
    </script>

    <!-- Main Content End -->
@endsection
