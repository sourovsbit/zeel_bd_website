@extends('frontend.layouts.master')

@section('content')
    <!-- Navbar Start -->

        @include('frontend.layouts.navbar')

    <!-- Navbar End -->

    <!-- Blog Section -->
    <section class="blog-section blog-three-col" style="direction: rtl; text-align: right;">
        <div class="auto-container">
            <div class="container">
                <div class="row">
                    @if($data)
                    @foreach($data as $d)
                    <div class="news-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><a href="{{url('/blog_details')}}/{{$d->id}}"><img src="{{ asset('backend/Blogs/BlogsImage') }}/{{ $d->image }}" alt=""></a></figure>
                            </div>
                            <div class="lower-content">
                                <h4><a href="{{url('/blog_details')}}/{{$d->id}}">{{$d->title}}</a></h4>
                                <div class="post-info">
                                    <div class="post-author">بواسطة فريقنا</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!--End Blog Section-->

    <!-- Main Content End -->
@endsection
