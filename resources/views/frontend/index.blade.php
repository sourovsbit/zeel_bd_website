@extends('frontend.layouts.master')
@extends('frontend.layouts.meta')

@section('content')
    <!-- Navbar Start -->
    @include('frontend.layouts.navbar')
    <!-- Navbar End -->

    <!-- Hero Slider Start -->
    <section class="hero-section">

        <div class="hero-slider">

            @if (isset($slider) && count($slider) > 0)
                @foreach ($slider as $slide)
                    <div class="hero-slide"
                        style="background-image:url('{{ asset('/backend/PhotoGallery/PhotoGalleryImage/') }}/{{ $slide->image }}');">

                        <div class="overlay"></div>

                        <div class="container hero-container">
                            <div class="row align-items-center h-100">
                                <div class="col-lg-6">

                                    <div class="hero-text">
                                        <h1 class="hero-title">
                                            {{ $slide->title }}
                                        </h1>

                                        <p class="hero-desc">
                                            Build your career with industry level skills.
                                            Learn from experts and start your professional journey today.
                                        </p>

                                        <div class="hero-buttons">
                                            <a href="{{ url('shop') }}" class="btn-primary-modern">
                                                View Products
                                            </a>

                                            <a href="{{ url('contact') }}" class="btn-outline-modern">
                                                Contact Us
                                            </a>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach
            @endif

        </div>

    </section>
    <!-- Hero Slider End -->

    <!-- About Section Start -->
    <section class="about-section pt-5" style="margin-top: 110px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center mb-5">
                        <h2 class="display-5 fw-bold text-primary">About {{ $company->company_name ?? 'Us' }}</h2>
                    </div>
                </div>
            </div>
            <div class="justify-content-center">
                <div class="col-lg-12">
                    <div class="about-content bg-light p-5 rounded-4 shadow-sm">
                        <p class="lead text-secondary">{!! $data->description ?? '' !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Products Section Start -->
    {{-- <section class="products-section py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center mb-5">
                        <h2 class="display-5 fw-bold text-primary">Our Products</h2>
                        <p class="text-muted">Discover our premium collection</p>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                @if (isset($products) && count($products) > 0)
                    @foreach ($products as $product)
                        @php
                            $productImage = DB::table('product_images')
                                ->where('product_id', $product->product_id)
                                ->first();
                            $imagePath = $productImage
                                ? asset('/backend/Product/ProductImage/' . $productImage->image)
                                : asset('placeholder-image.jpg');
                        @endphp
                        <div class="col-xl-3 col-lg-4 col-md-6 p-3">
                            <div class="card product-card h-100 border-0 shadow-sm hover-shadow">
                                <div class="position-relative overflow-hidden">
                                    <img src="{{ $imagePath }}" class="card-img-top product-img"
                                        alt="{{ $product->product_name }}" style="height: 250px; object-fit: cover;">
                                    @if ($product->is_new ?? false)
                                        <span class="badge bg-danger position-absolute top-0 start-0 m-3">NEW</span>
                                    @endif
                                    <div
                                        class="product-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-dark bg-opacity-50 opacity-0 transition">
                                        <div class="d-flex gap-2">
                                            <a href="{{ url('sell_page/' . $product->id) }}"
                                                class="btn btn-primary btn-sm rounded-pill"><i
                                                    class="fas fa-shopping-cart me-2"></i>Add to Cart</a>
                                            <a href="{{ url('sell_page/' . $product->id) }}"
                                                class="btn btn-outline-light btn-sm rounded-pill"><i
                                                    class="fas fa-eye me-2"></i>View</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <span
                                        class="badge bg-light text-dark mb-2">{{ $product->category->category_name ?? 'Uncategorized' }}</span>
                                    <h5 class="card-title">
                                        <a href="{{ url('sell_page/' . $product->id) }}"
                                            class="text-decoration-none text-dark">{{ $product->product_name }}</a>
                                    </h5>
                                    <div class="price-section mt-2">
                                        <span
                                            class="fw-bold h5 text-primary">৳{{ number_format($product->sale_price) }}</span>
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent border-0">
                                    <a href="{{ url('sell_page/' . $product->id) }}"
                                        class="btn btn-outline-primary w-100 rounded-pill">View Details</a>
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
    </section> --}}
    <!-- Products Section End -->

    <!-- Certificates Section Start -->
    <section class="certificates-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center mb-5">
                        <h2 class="display-5 fw-bold text-primary">Certificates</h2>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                @if (isset($cerficates) && count($cerficates) > 0)
                    @foreach ($cerficates as $certificate)
                        <div class="col-lg-3 col-md-4 col-sm-6 p-3">
                            <div class="certificate-card text-center p-3 border rounded-3 shadow-sm h-100">
                                <img src="{{ asset('/backend/Certificates/CertificatesImage/' . $certificate->image) }}"
                                    alt="{{ $certificate->title }}" class="img-fluid mb-3 rounded-3"
                                    style="height: 200px; width: 100%; object-fit: cover; cursor: pointer;"
                                    data-bs-toggle="modal" data-bs-target="#imageModal"
                                    onclick="showCertificateModal('{{ asset('/backend/Certificates/CertificatesImage/' . $certificate->image) }}', '{{ $certificate->title }}')">
                                <h5 class="fw-semibold">{{ $certificate->title }}</h5>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <!-- Certificate Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-transparent border-0">
                <div class="modal-body text-center p-0 position-relative">
                    <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                    <img id="modalImage" class="img-fluid rounded-3" alt="Certificate">
                    <h5 id="modalTitle" class="text-white mt-3"></h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Certificates Section End -->

    <!-- What We Do Section Start -->
    <section class="what-we-do py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center mb-5">
                        <h2 class="display-5 fw-bold text-primary">What We Do</h2>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                @if (isset($blog) && count($blog) > 0)
                    @foreach ($blog as $post)
                        <div class="col-lg-4 col-md-6 p-3">
                            <div class="card h-100 border-0 shadow-sm hover-shadow">
                                <img src="{{ asset('backend/Blogs/BlogsImage') }}/{{ $post->image }}"
                                    class="card-img-top" alt="{{ $post->title }}"
                                    style="height: 220px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">{{ $post->title }}</h5>
                                    <p class="card-text text-secondary">
                                        {{ Str::limit(strip_tags($post->description), 120) }}</p>
                                </div>
                                <div class="card-footer bg-transparent border-0">
                                    <a href="#" class="btn btn-outline-primary rounded-pill">Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- What We Do Section End -->

    <script>
        function showCertificateModal(imageSrc, title) {
            document.getElementById('modalImage').src = imageSrc;
            document.getElementById('modalTitle').innerText = title;
        }
    </script>

    <style>
        /* Custom styles to complement Bootstrap */
        .hero-items .single-hero-items {
            height: 600px;
            position: relative;
        }

        .hero-items .single-hero-items .container {
            position: relative;
            z-index: 2;
        }

        .hero-items .single-hero-items::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
            z-index: 1;
        }

        .product-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1) !important;
        }

        .product-overlay {
            transition: opacity 0.3s ease;
            opacity: 0;
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

        .hover-shadow:hover {
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.1) !important;
        }

        .bg-opacity-75 {
            --bs-bg-opacity: 0.75;
        }

        .transition {
            transition: all 0.3s ease;
        }

        .btn-close-white {
            filter: invert(1) grayscale(100%) brightness(200%);
        }

        @media (max-width: 768px) {
            .hero-items .single-hero-items {
                height: 400px;
            }

            .hero-text {
                padding: 2rem !important;
            }

            .hero-text h1 {
                font-size: 18px;
            }
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const slider = document.querySelector(".hero-slider");
            const slides = document.querySelectorAll(".hero-slide");

            let index = 0;

            function slideMove() {

                index++;

                if (index >= slides.length) {
                    index = 0;
                }

                slider.style.transform = "translateX(-" + index * 100 + "%)";
            }

            setInterval(slideMove, 5000);

        });
    </script>
@endsection
