@extends('frontend.layouts.master')

@section('content')
    <!-- Navbar Start -->

        @include('frontend.layouts.navbar')

    <!-- Navbar End -->

    <div class="container">
        <div class="sidebar-page-container">
            <div class="auto-container">
                <div class="row clearfix">
                    <!--Content Side-->
                    <div class="content-side col-lg-12 col-md-12 col-sm-12">
                        <div class="blog-post">
                            <!-- News Block -->
                            <div class="news-block">
                                <div class="inner-box">
                                    <div class="image"><img src="{{ asset('backend/Blogs/BlogsImage') }}/{{ $data->image }}" alt="" style="width: 100%;height: 300px;"/></div>
                                    <div class="lower-content">
                                        <ul class="post-info">
                                            <li><span class="far fa-user"></span> Admin</li>
                                            <li><span class="far fa-calendar"></span>
                                                @php
                                                $datetime = "$data->created_at";
                                                $date = date("Y-m-d", strtotime($datetime));
                                                echo $date;
                                                @endphp
                                            </li>
                                        </ul>
                                        <h3>{{ $data->title }}</h3>
                                        <p>{!! $data->description !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content End -->
@endsection
