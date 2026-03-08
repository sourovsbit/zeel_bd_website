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
    <!-- Breadcrumb Section End -->

    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        @php $count = 0; @endphp
                        @foreach($data as $d)
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4 {{ $count >= 8 ? 'd-none extra-item' : '' }}">
                            <div class="news-card">
                                <div class="news-card__image">
                                    <img src="{{ asset('backend/NewsEvent/NewsEventImage') }}/{{ $d->image }}" alt="{{ $d->title }}">
                                </div>
                                <div class="news-card__content">
                                    <h5 class="news-card__title">
                                        <a href="{{ url('newsevents_details/'.$d->id) }}">{{ \Illuminate\Support\Str::limit($d->title, 70) }}</a>
                                    </h5>
                                    <p class="news-card__date">
                                        <i class="fa fa-calendar-alt"></i>
                                        {{ \Carbon\Carbon::parse($d->date)->format('M d, Y') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @php $count++; @endphp
                        @endforeach

                        <div class="col-lg-12">
                            <div class="load-more text-center mt-5">
                                <button id="loadMoreBtn" class="btn btn-outline-primary btn-lg">
                                    <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                    Load More
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Main Content End -->

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#loadMoreBtn").click(function() {
                var btn = $(this);
                btn.prop('disabled', true);
                btn.find('.spinner-border').removeClass('d-none');

                // Simulate loading delay for better UX (optional)
                setTimeout(function() {
                    $(".extra-item.d-none").slice(0, 8).removeClass("d-none").hide().fadeIn(400);
                    if ($(".extra-item.d-none").length === 0) {
                        btn.fadeOut();
                    } else {
                        btn.prop('disabled', false);
                        btn.find('.spinner-border').addClass('d-none');
                    }
                }, 300);
            });
        });
    </script>

    <style>
        .news-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 24px rgba(0,0,0,0.15);
        }
        .news-card__image {
            width: 100%;
            height: 200px;
            overflow: hidden;
        }
        .news-card__image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        .news-card:hover .news-card__image img {
            transform: scale(1.05);
        }
        .news-card__content {
            padding: 20px 15px 15px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        .news-card__title {
            font-size: 1.1rem;
            font-weight: 600;
            line-height: 1.4;
            margin-bottom: 10px;
        }
        .news-card__title a {
            color: #333;
            text-decoration: none;
            transition: color 0.2s;
        }
        .news-card__title a:hover {
            color: #007bff;
        }
        .news-card__date {
            font-size: 0.9rem;
            color: #6c757d;
            margin-top: auto;
            margin-bottom: 0;
        }
        .news-card__date i {
            margin-right: 5px;
        }
        .btn-outline-primary {
            border-width: 2px;
            font-weight: 600;
            padding: 12px 30px;
            border-radius: 30px;
            transition: all 0.3s;
        }
        .btn-outline-primary:hover {
            background: #007bff;
            color: #fff;
        }
    </style>
@endsection
