@extends('frontend.layouts.master')

@section('content')
    <!-- Navbar Start -->

        @include('frontend.layouts.navbar')

    <!-- Navbar End -->

    <!-- Main Content Start -->

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section main-content mt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>News & Events</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 order-1 order-lg-2">
                    <div class="row">
                        @php $count = 0; @endphp
                        @foreach($data as $d)
                        <div class="col-lg-3 col-sm-6 {{ $count >= 8 ? 'd-none extra-item' : '' }}">
                            <div class="blog-item">
                                <div class="bi-pic">
                                    <img src="{{ asset('backend/NewsEvent/NewsEventImage') }}/{{ $d->image }}" alt="">
                                </div>
                                <div class="bi-text">
                                    <a href="{{ url('newsevents_details/'.$d->id) }}">
                                        <h4>{{ \Illuminate\Support\Str::limit($d->title, 80, '') }}</h4>
                                    </a>
                                    <p><span>- @php
                                        $datetime = "$d->date";
                                        $date = date("M d, Y", strtotime($datetime));
                                        echo $date;
                                    @endphp</span></p>
                                </div>
                            </div>
                        </div>
                        @php $count++; @endphp
                        @endforeach


                        <div class="col-lg-12">
                            <div class="loading-more text-center mt-4">
                                <i class="icon_loading"></i>
                                <a href="javascript:void(0);" id="loadMoreBtn">Loading More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Main Content End -->

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#loadMoreBtn").click(function() {
                $(".extra-item.d-none").slice(0, 8).removeClass("d-none").hide().fadeIn(400);
                if ($(".extra-item.d-none").length === 0) {
                    $("#loadMoreBtn").fadeOut();
                }
            });
        });
    </script>


@endsection
