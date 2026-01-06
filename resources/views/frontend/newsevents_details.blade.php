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
                        <span>{{ $data->title }} Details</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-details-inner">
                        <div class="blog-detail-title">
                            <h2>{{ $data->title }}</h2>
                            <p>post date <span>- @php
                                $datetime = "$data->date";
                                $date = date("M d, Y", strtotime($datetime));
                                echo $date;
                            @endphp
                            </span></p>
                        </div>
                        <div class="blog-large-pic">
                            <img src="{{ asset('backend/NewsEvent/NewsEventImage') }}/{{ $data->image }}" alt="">
                        </div>
                        <div class="blog-detail-desc">
                            <p>{!!$data->description!!}
                            </p>
                        </div>
                        <div class="blog-post">
                            <div class="mb-4 d-flex align-items-center">
                                <i class="fa fa-arrow-right mr-2 text-primary"></i>
                                <span class="font-weight-bold text-dark">Related Post:</span>
                            </div>

                            <div class="row">
                                @php
                                use App\Models\NewsEvent;
                                $newsevent = NewsEvent::where('id','!=',$id)->limit(3)->get();
                                @endphp
                                <!--Brochures Box-->
                                @if($newsevent)
                                @foreach($newsevent as $n)
                                <div class="col-lg-4 col-md-6">
                                    <a href="{{ url('newsevents_details/'.$n->id) }}" class="prev-blog">
                                        <div class="pb-pic">
                                            <img src="{{ asset('backend/NewsEvent/NewsEventImage') }}/{{ $n->image }}" alt="">
                                        </div>
                                        <div class="pb-text">
                                            <h5>{{ \Illuminate\Support\Str::limit($n->title, 50, '') }}</h5>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->


    <!-- Main Content End -->
@endsection
