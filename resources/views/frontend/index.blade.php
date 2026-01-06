@extends('frontend.layouts.master')

@extends('frontend.layouts.meta')

@section('content')

    <!-- Navbar Start -->

        @include('frontend.layouts.navbar')

        <style>
            .modal-img {
                width: 100% !important;
                height: auto !important;
            }
            #mainImage {
                width: 500px !important;
                height: 250px !important;
                display: block;
                margin: auto;
            }

            /* what_we_do */
            .what-we-do {
                background-color: #f6f7fa;
                padding: 60px 0;
                font-family: 'Poppins', sans-serif;
            }

            .what-we-do .section-title h2 {
                font-weight: 700;
                font-size: 36px;
                color: #1e1e1e;
                position: relative;
            }

            .what-we-do .section-title .highlight {
                color: #1e1e1e;
                text-shadow: 2px 2px #e2e2e2;
            }

            .what-we-do .subtitle {
                font-size: 16px;
                color: #555;
                margin-top: 15px;
                max-width: 750px;
                margin-left: auto;
                margin-right: auto;
            }

            .whatcard-service {
                background: #fff;
                overflow: hidden;
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .whatcard-service:hover {
                transform: translateY(-10px);
                box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            }

            .whatcard-img img {
                width: 100%;
                height: 220px;
                object-fit: cover;
                transition: 0.4s ease;
            }

            .whatcard-service:hover .whatcard-img img {
                filter: grayscale(0%);
                transform: scale(1.05);
            }

            .whatcard-body {
                padding: 20px;
            }

            .whatcard-title {
                font-weight: 700;
                font-size: 18px;
                color: #1e1e1e;
                margin-bottom: 10px;
            }

            .whatcard-text {
                font-size: 15px;
                color: #555;
            }

            .why_choose-section {
                background-color: #f9f9fc;
                font-family: 'Poppins', sans-serif;
            }

            .why_choose-title {
                font-size: 36px;
                font-weight: 700;
                color: #1e1e1e;
            }

            .why_choose-title .highlight {
                color: #1e1e1e;
                text-shadow: 1px 1px #ccc;
            }

            .why_choose-subtitle {
                font-size: 16px;
                color: #555;
                margin-top: 8px;
            }

            .why_choose-row {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 20px;
            }

            .why_choose-box {
                flex: 1 1 calc(20% - 20px); /* 5-column layout */
                background-color: #fff;
                padding: 25px 15px;
                border-radius: 12px;
                text-align: center;
                transition: all 0.3s ease;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
                min-width: 200px;
                max-width: 240px;
            }

            .why_choose-box:hover {
                transform: translateY(-5px);
            }

            .why_choose-icon {
                width: 50px;
                height: 50px;
                margin-bottom: 15px;
            }

            .why_choose-heading {
                font-size: 16px;
                font-weight: 600;
                margin-bottom: 8px;
            }

            .why_choose-desc {
                font-size: 14px;
                color: #333;
                line-height: 1.6;
            }

            /* Background color variations */
            .bg-1 { background-color: #ffeaea; }
            .bg-2 { background-color: #eafff0; }
            .bg-3 { background-color: #eaf4ff; }
            .bg-4 { background-color: #fff6e5; }
            .bg-5 { background-color: #f2eaff; }

            /* Responsive design */
            @media (max-width: 992px) {
                .why_choose-box {
                    flex: 1 1 calc(45% - 20px);
                }
            }

            @media (max-width: 576px) {
                .why_choose-box {
                    flex: 1 1 100%;
                }
            }
            .product-card {
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                border-radius: 15px;
                overflow: hidden;
            }

            .product-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 30px rgba(0,0,0,0.1) !important;
            }

            .product-overlay {
                background: rgba(0,0,0,0.7);
                opacity: 0;
                transition: opacity 0.3s ease;
            }

            .product-card:hover .product-overlay {
                opacity: 1;
            }

            .product-img {
                transition: transform 0.5s ease;
            }

            .product-card:hover .product-img {
                transform: scale(1.05);
            }

            .price-section {
                font-family: 'Arial', sans-serif;
            }

            .rating {
                font-size: 0.9rem;
            }

            /* Responsive adjustments */
            @media (max-width: 768px) {
                .product-card {
                    margin-bottom: 20px;
                }

                .section-title h2 {
                    font-size: 2rem;
                }
            }

        </style>

    <!-- Main Content Start -->

    <!-- Hero Section Begin -->
    <section class="hero-section main-content">
        <div class="hero-items owl-carousel">
            @php
            $i = 0;
            @endphp
            @if(isset($slider))
            @foreach($slider as $s)

            @php
            $i= $i +1;
            @endphp
            <div class="single-hero-items set-bg w-80" data-setbg="{{asset('/backend/PhotoGallery/PhotoGalleryImage/')}}/{{$s->image}}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <h1 class="bg-white text-dark p-3">{{$s->title}}</h1>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif

        </div>
    </section>
    <!-- Hero Section End -->


    <!-- About Section Begin -->
    <div class="container-xxl">
        <section class="p-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2>About {{ $company->company_name }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Content Column -->
                    <div class="content-column col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="sec-title text-justify">
                                <p>{!! $data->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- About Section End -->

    <!-- About Section Begin -->
    {{-- <section class="why_choose-section py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Why Choose Us</span></h2>
            </div>
            <div class="why_choose-row d-flex flex-wrap justify-content-center gap-4">
                @if($choose)
                    @foreach($choose as $key => $c)
                    <div class="why_choose-box bg-{{ ($key % 5) + 1 }}">
                        <img src="{{ asset('/backend/WhyChooseUs/WhyChooseUsImage/' . $c->image) }}" alt="{{ $c->title }}" class="why_choose-icon">
                        <h5 class="why_choose-heading">{{ $c->title }}</h5>
                        <p class="why_choose-desc">{!! $c->details !!}</p>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section> --}}

    <!-- About Section End -->

    <!-- Banner Section Begin -->
    {{-- <div class="banner-section spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="{{ asset('') }}frontend/img/banner-1.jpg" alt="">
                        <div class="inner-text">
                            <h4>Ads</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="{{ asset('') }}frontend/img/banner-2.jpg" alt="">
                        <div class="inner-text">
                            <h4>Ads</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="{{ asset('') }}frontend/img/banner-3.jpg" alt="">
                        <div class="inner-text">
                            <h4>Ads</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Banner Section End -->

    <!-- Product Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-5">
                        <h2 class="display-5 fw-bold text-primary">Our Products</h2>
                        <p class="text-muted">Discover our premium collection</p>
                    </div>
                </div>
            </div>

            <div class="product-list">
                <div class="row g-4">
                    @if(count($products) > 0)
                    @foreach($products as $p)
                    @php
                    $productImage = DB::table('product_images')->where('product_id',$p->product_id)->first();
                    // Fallback image if no product image exists
                    $imagePath = $productImage ?
                        asset('/backend/Product/ProductImage/' . $productImage->image) :
                        asset('placeholder-image.jpg');
                    @endphp

                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="product-card card h-100 border-0 shadow-sm hover-shadow">
                            <div class="position-relative overflow-hidden">
                                <img src="{{ $imagePath }}"
                                    class="product-img card-img-top"
                                    alt="{{ $p->product_name }}"
                                    style="height: 250px; object-fit: cover;">

                                <!-- Product Badge (Optional) -->
                                @if($p->is_new)
                                <span class="badge bg-danger position-absolute top-0 start-0 m-3">NEW</span>
                                @endif

                                <!-- Quick Actions Overlay -->
                                <div class="product-overlay position-absolute w-100 h-100 top-0 start-0 d-flex align-items-center justify-content-center">
                                    <div class="action-buttons">
                                        <a href="{{ url('sell_page/' . $p->id) }}"
                                        class="btn btn-primary btn-sm mb-2 d-flex align-items-center">
                                            <i class="fas fa-shopping-cart me-2"></i> Add to Cart
                                        </a>
                                        <a href="{{ url('sell_page/' . $p->id) }}"
                                        class="btn btn-outline-light btn-sm d-flex align-items-center">
                                            <i class="fas fa-eye me-2"></i> Quick View
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <span class="badge bg-light text-dark mb-2">{{ $p->category->category_name ?? 'Uncategorized' }}</span>
                                <h5 class="card-title">
                                    <a href="{{ url('sell_page/' . $p->id) }}" class="text-decoration-none text-dark">
                                        {{ $p->product_name }}
                                    </a>
                                </h5>

                                <!-- Price Section -->
                                <div class="price-section mt-2">
                                    <span class="fw-bold h5 text-primary">৳{{ number_format($p->sale_price) }}</span>
                                </div>
                            </div>

                            <div class="card-footer bg-transparent border-top-0">
                                <div class="d-grid">
                                    <a href="{{ url('sell_page/' . $p->id) }}"
                                    class="btn btn-outline-primary">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="col-12 text-center py-5">
                        <div class="empty-state">
                            <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                            <h4 class="text-muted">No Products Available</h4>
                            <p class="text-muted">Check back later for new arrivals</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Administrative Section End -->
    {{-- <div class="container-xxl">
        <section class="p-5">
            <div class="container">

                @foreach($adminmessage as $a)
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h2>{{ $a->title }}'s Message</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-5">
                        <!-- Image Column -->
                        <div class="col-lg-4 mb-4 mb-lg-0 text-center">
                            @php
                                $path = public_path('/backend/Administrative/AdministrativeImage/'.$a->image);
                            @endphp
                            @if(file_exists($path) && !empty($a->image))
                                <img src="{{ asset('/backend/Administrative/AdministrativeImage/'.$a->image) }}" alt="{{ $a->name }}" class="img-fluid rounded shadow" style="max-height: 300px; object-fit: cover;">
                            @else
                                <img src="{{ asset('frontend/assets/default-profile.png') }}" alt="Default Image" class="img-fluid rounded shadow" style="max-height: 300px; object-fit: cover;">
                            @endif
                        </div>
                        <!-- Content Column -->
                        <div class="col-lg-8">
                            <div class="inner-column text-justify">
                                <div class="sec-title">
                                    <p>{!! $a->description !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </section>
    </div> --}}

    <!-- Administrative Section Begin -->

    <!-- Mission Vision Section Begin -->
    {{-- <div class="container-xxl">
        <section class="p-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2>Our Mission & Vision</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Content Column -->
                    <div class="content-column col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="sec-title text-justify">
                                <p>{!! $missionvision->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div> --}}
    <!-- Mission Vision Section End -->

    <!-- Certificates Section Start -->
    <div class="container-xxl">
        <div class="container Certificates">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Certificates</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @if($cerficates)
                    @foreach($cerficates as $c)
                        <div class="col-lg-3 col-md-6 col-sm-12 p-3">
                            <div class="Certificates-item">
                                <img id="mainImage_{{ $loop->index }}"
                                     src="{{ asset('/backend/Certificates/CertificatesImage/' . $c->image) }}"
                                     data-src="{{ asset('/backend/Certificates/CertificatesImage/' . $c->image) }}"
                                     data-title="{{ $c->title }}"
                                     style="cursor: pointer;"
                                     onclick="changeImage(this)"
                                     data-toggle="modal"
                                     data-target="#imageModal">
                                <p style="text-align: center;padding: 8px;">{{ $c->title }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <!-- Lightbox Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-transparent border-0 position-relative">
                <button type="button" class="close position-absolute"
                        style="top: 10px; right: 15px; color: #fff; font-size: 2rem; z-index: 1051;"
                        data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body text-center p-0">
                    <img id="modalImage" class="modal-img mx-auto d-block mb-3" alt="Gallery Image">
                    <h5 id="modalTitle" class="text-white"></h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Latest What Do We Do Section Begin -->
    <section class="what-we-do spad" style="background: #f8f5f5;">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2><span class="highlight">What Do We Do</span></h2>
                        {{-- <p class="subtitle">
                            Revolutionizing energy management through innovative prepaid meter solutions, ensuring affordability, reliability, and convenience for all customers.
                        </p> --}}
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @if($blog)
                    @foreach($blog as $b)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="whatcard-service">
                            <div class="whatcard-img">
                                <img src="{{ asset('backend/Blogs/BlogsImage') }}/{{ $b->image }}" alt="{{ $b->title }}">
                            </div>
                            <div class="whatcard-body text-center">
                                <h5 class="whatcard-title">{{ $b->title }}</h5>
                                @php
                                    $desc = strip_tags($b->description);
                                @endphp
                                <p class="whatcard-text">
                                    {{ $desc ? \Illuminate\Support\Str::limit($desc, 150, '...') : 'No description available.' }}
                                </p>

                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- Latest What Do We Do Section End -->

    <!-- Latest News Section Begin -->
    {{--<section class="latest-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>From The News</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @if($news)
                @foreach($news as $n)
                <div class="col-lg-3 col-md-6">
                    <div class="single-latest-blog">
                        <img src="{{ asset('backend/NewsEvent/NewsEventImage') }}/{{ $n->image }}" alt="">
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    @php
                                        $datetime = "$n->date";
                                        $date = date("M d, Y", strtotime($datetime));
                                        echo $date;
                                    @endphp
                                </div>
                            </div>
                            <a href="{{ url('newsevents_details/'.$n->id) }}">
                                <h6>{{ \Illuminate\Support\Str::limit($n->title, 80, '') }}</h6>
                            </a>
                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($n->description), 100, '') }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>

            <div class="benefit-items">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="{{ asset('') }}frontend/img/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Fast Shipping</h6>
                                <p>Speedy delivery right to your doorstep.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="{{ asset('') }}frontend/img/icon-2.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Delivery On Time</h6>
                                <p>Problems? We’ll fix it, no questions asked.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="{{ asset('') }}frontend/img/icon-3.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Secure Payment</h6>
                                <p>100% safe and encrypted transactions.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>--}}
    <!-- Latest News Section End -->


    <!-- Partner Logo Section Begin -->
    {{-- <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="{{ asset('') }}frontend/img/logo-carousel/logo-1.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="{{ asset('') }}frontend/img/logo-carousel/logo-2.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="{{ asset('') }}frontend/img/logo-carousel/logo-3.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="{{ asset('') }}frontend/img/logo-carousel/logo-4.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="{{ asset('') }}frontend/img/logo-carousel/logo-5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Partner Logo Section End -->

    <!-- Main Content End -->
    <script>
        function changeImage(element) {
            var imgSrc = element.getAttribute("data-src");
            var imgTitle = element.getAttribute("data-title");
            document.getElementById("modalImage").src = imgSrc;
            document.getElementById("modalTitle").innerText = imgTitle;
        }
    </script>
@endsection
