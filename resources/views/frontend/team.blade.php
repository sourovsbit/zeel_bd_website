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
                        <span>Team</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Team Section Start -->
    <section class="team-section spad">
        <div class="container">
            <div class="row">
                @if($data)
                    @php $count = 0; @endphp
                    @foreach($data as $d)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4 {{ $count >= 8 ? 'd-none extra-team' : '' }}">
                        <div class="team-card">
                            <div class="team-card__image">
                                <img src="{{ asset('backend/Employee/EmployeeImage') }}/{{ $d->image }}" alt="{{ $d->name }}">
                            </div>
                            <div class="team-card__content">
                                <h5 class="team-card__name">{{ $d->name }}</h5>
                                <p class="team-card__designation">{{ $d->designation }}</p>
                            </div>
                        </div>
                    </div>
                    @php $count++; @endphp
                    @endforeach

                    <div class="col-lg-12">
                        <div class="load-more text-center mt-5">
                            <button id="loadMoreTeam" class="btn btn-outline-primary btn-lg">
                                <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                Load More
                            </button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- Team Section End -->

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#loadMoreTeam").click(function() {
                var btn = $(this);
                btn.prop('disabled', true);
                btn.find('.spinner-border').removeClass('d-none');

                setTimeout(function() {
                    $(".extra-team.d-none").slice(0, 8).removeClass("d-none").hide().fadeIn(400);
                    if ($(".extra-team.d-none").length === 0) {
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
        .team-section {
            padding: 60px 0;
        }

        .team-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .team-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 24px rgba(0,0,0,0.15);
        }

        .team-card__image {
            width: 100%;
            height: 280px;
            overflow: hidden;
        }

        .team-card__image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .team-card:hover .team-card__image img {
            transform: scale(1.05);
        }

        .team-card__content {
            padding: 20px 15px 15px;
            text-align: center;
        }

        .team-card__name {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 5px;
            color: #333;
        }

        .team-card__designation {
            font-size: 0.95rem;
            color: #6c757d;
            margin-bottom: 0;
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
