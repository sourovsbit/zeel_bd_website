@extends('frontend.layouts.master')

@extends('frontend.layouts.meta')

@section('content')
    <!-- Navbar Start -->

    @include('frontend.layouts.navbar')

    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section main-content mt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Contact</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Map Section Begin -->
    <div class="map spad">
        <div class="container">
            <div class="map-inner">
                <iframe
                    src="{{ $company->map }}"
                    height="305" style="border:0" allowfullscreen="">
                </iframe>
            </div>
        </div>
    </div>
    <!-- Map Section Begin -->

    <!-- Contact Section Begin -->
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="contact-title">
                        <h4>Contacts Us</h4>
                        <p>Have questions or need more information? Reach out to us via phone, email, or visit our office. We’re here to help!</p>
                    </div>
                    <div class="contact-widget">
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-location-pin"></i>
                            </div>
                            <div class="ci-text">
                                <span>Address:</span>
                                <p>{!! $company->address !!}</p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-mobile"></i>
                            </div>
                            <div class="ci-text">
                                <span>Phone:</span>
                                <p>{{ $company->phone }}</p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-email"></i>
                            </div>
                            <div class="ci-text">
                                <span>Email:</span>
                                <p>{{ $company->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="contact-form">
                        <div class="leave-comment">
                            <h4>Leave A Comment</h4>
                            <p>Our staff will call back later and answer your questions.</p>
                            <form action="{{url('sendMessage')}}" method="POST" id="form-data" class="comment-form">
                                <div class="row">
                                    @csrf
                                    <div class="col-lg-6">
                                        <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="email" class="form-control" placeholder="Your Email" required>
                                    </div>
                                    <div class="col-lg-12">
                                        <input type="text" name="phone" class="form-control" placeholder="Your Phone" required>
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea class="form-control" name="message" rows="4"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button class="site-btn" type="submit">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    @push('footer_scripts')

    <script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    @endpush
    <!-- Main Content End -->
@endsection
