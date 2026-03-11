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

    <!-- Products Section - Premium Redesign -->
    <section class="products-section py-5" style="background: #f9fafc;">
        <div class="container">
            <!-- Section Title with Gradient Underline -->
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="display-5 fw-bold" style="color: #1a2639; letter-spacing: -0.02em;">
                        Item Wise Products
                    </h2>
                    <p class="text-secondary-emphasis fs-5">Browse products by item category</p>
                    <div class="mx-auto mt-3"
                        style="width: 80px; height: 4px; background: linear-gradient(90deg, #3a7bd5, #00d2ff); border-radius: 2px;">
                    </div>
                </div>
            </div>

            @if (isset($itemWiseProducts) && $itemWiseProducts->count() > 0)
                @foreach ($itemWiseProducts as $itemGroup)
                    @php
                        $itemName = $itemGroup['item_name'] ?? 'Item';
                        $itemCategories = collect($itemGroup['categories'] ?? []);
                        $itemProducts = collect($itemGroup['products'] ?? []);
                    @endphp

                    <!-- Item Group Card -->
                    <div class="mb-5 p-4 rounded-4">
                        <!-- Group Header with Icon -->
                        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle p-3"
                                    style="background: linear-gradient(145deg, #e6e9f0, #ffffff); box-shadow: 5px 5px 10px #d9dce3, -5px -5px 10px #ffffff;">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2b3a67"
                                        stroke-width="2">
                                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2">
                                        </rect>
                                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="fw-bold mb-1" style="color: #1e2b3f;">{{ $itemName }}</h4>
                                    @if ($itemCategories->isNotEmpty())
                                        <div class="d-flex flex-wrap gap-2 mt-1">
                                            @foreach ($itemCategories as $category)
                                                @php
                                                    $colors = ['#ffe8e0', '#e0f2fe', '#e0f4e8', '#f3e8ff', '#fff3d6'];
                                                    $color = $colors[array_rand($colors)];
                                                @endphp
                                                <span class="badge px-3 py-2 rounded-pill fw-normal"
                                                    style="background: {{ $color }}; color: #2b3a67;">{{ $category['name'] }}</span>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <a href="{{ url('item_products/' . $itemGroup['item_id']) }}"
                                class="btn btn-outline-primary rounded-pill px-4 py-2 fw-semibold d-flex align-items-center gap-2"
                                style="border-color: #cbd5e1; color: #334155;">
                                <span>View All</span>
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <path d="M6 12L10 8L6 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>

                        <!-- Product Grid -->
                        <div class="row g-4">
                            @forelse ($itemProducts as $product)
                                @php
                                    $imagePath = !empty($product['product_images'][0]['path'])
                                        ? 'https://inventory.geelbd.com/storage/app/public' .
                                            $product['product_images'][0]['path']
                                        : 'https://via.placeholder.com/600x600?text=No+Image';
                                    $productName = $product['name'] ?? 'Product';
                                    $productId = $product['id'] ?? null;
                                    $regularPrice = (float) ($product['product_detail']['regular_price'] ?? 0);
                                    $salePrice = (float) ($product['product_detail']['sale_price'] ?? 0);
                                    $price = $salePrice ?: $regularPrice;
                                    $hasDiscount = $salePrice && $salePrice < $regularPrice;
                                    $discountPercent = $hasDiscount
                                        ? round((($regularPrice - $salePrice) / $regularPrice) * 100)
                                        : 0;
                                @endphp

                                <div class="col-xl-3 col-lg-4 col-md-6 p-3">
                                    <div class="card product-card h-100 border-0 bg-white rounded-4 overflow-hidden"
                                        style="transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94); box-shadow: 0 15px 35px rgba(0,0,0,0.02), 0 0 0 1px rgba(0,0,0,0.01);">

                                        <!-- Image Container with Overlay -->
                                        <div class="position-relative overflow-hidden"
                                            style="border-radius: 16px 16px 0 0;">
                                            <img src="{{ $imagePath }}" class="card-img-top product-img"
                                                alt="{{ $productName }}"
                                                style="height: 260px; object-fit: cover; transition: transform 0.6s ease;">

                                            <!-- Discount Badge -->
                                            @if ($hasDiscount)
                                                <span
                                                    class="position-absolute top-0 start-0 m-3 badge bg-danger rounded-pill px-3 py-2 fw-semibold"
                                                    style="background: #ff4757 !important;">-{{ $discountPercent }}%</span>
                                            @endif

                                            <!-- Overlay Buttons (appear on hover) -->
                                            <div class="position-absolute top-0 end-0 p-3 d-flex flex-column gap-2 opacity-0 hover-overlay"
                                                style="transition: opacity 0.3s;">
                                                <a href="#" class="btn btn-light rounded-circle shadow-lg"
                                                    style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                                        stroke="#2b3a67" stroke-width="2">
                                                        <path
                                                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                                        </path>
                                                    </svg>
                                                </a>
                                                <a href="{{ $productId ? url('sell_page/' . $productId) : '#' }}"
                                                    class="btn btn-light rounded-circle shadow-lg"
                                                    style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                                        stroke="#2b3a67" stroke-width="2">
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                        <path
                                                            d="M22 12c-2.667 4.667-6 7-10 7s-7.333-2.333-10-7c2.667-4.667 6-7 10-7s7.333 2.333 10 7z">
                                                        </path>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>

                                        <!-- Card Body -->
                                        <div class="card-body p-3">
                                            <h6 class="card-title mb-2 fw-semibold" style="font-size: 1rem;">
                                                <a href="{{ $productId ? url('sell_page/' . $productId) : '#' }}"
                                                    class="text-decoration-none text-dark stretched-link">
                                                    {{ \Illuminate\Support\Str::limit($productName, 45) }}
                                                </a>
                                            </h6>

                                            <!-- Price Section -->
                                            <div class="d-flex align-items-center gap-2 mt-2">
                                                <span class="fw-bold fs-5"
                                                    style="color: #1e2b3f;">৳{{ number_format($price, 2) }}</span>
                                                @if ($hasDiscount)
                                                    <span
                                                        class="text-muted text-decoration-line-through small">৳{{ number_format($regularPrice, 2) }}</span>
                                                @endif
                                            </div>

                                            <!-- Rating Placeholder (optional) -->
                                            <div class="d-flex align-items-center gap-1 mt-2 small text-warning">
                                                ★ ★ ★ ★ ☆ <span class="text-muted ms-1">(24)</span>
                                            </div>
                                        </div>

                                        <!-- Add to Cart / View Details -->
                                        <div class="card-footer bg-transparent border-0 p-3 pt-0">
                                            <a href="{{ $productId ? url('sell_page/' . $productId) : '#' }}"
                                                class="btn w-100 rounded-pill fw-semibold py-2"
                                                style="background: #edf2f9; color: #1e2b3f; border: 1px solid #dbe7f2; transition: all 0.2s;">
                                                Quick View
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <div class="text-center py-5 bg-white border rounded-4">
                                        <h6 class="text-muted mb-2">No products found for {{ $itemName }}</h6>
                                        <p class="text-muted small mb-0">Products for this item will appear here when
                                            available.</p>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                @endforeach
            @else
                <div class="row">
                    <div class="col-12 text-center py-5">
                        <h5 class="text-secondary-emphasis mb-0">No item-wise products found.</h5>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <section class="brand-slider-section py-5" style="background:#f4f5f7;">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <p class="small text-uppercase mb-1" style="letter-spacing:2px; color:#d88a1f; font-weight:700;">Our
                        Partners</p>
                    <h3 class="fw-bold mb-0" style="color:#1f2d3d;">Featured Brands</h3>
                </div>
            </div>

            @if (isset($brands) && $brands->count() > 0)
                <div class="owl-carousel brand-carousel">
                    @foreach ($brands as $brand)
                        @php
                            $brandName = $brand['name'] ?? 'Brand';
                            $brandId = $brand['id'] ?? null;
                            $brandImage = $brand['image'] ?? null;
                            $brandImageUrl = $brandImage
                                ? 'https://inventory.geelbd.com/storage/app/public' . $brandImage
                                : null;
                        @endphp
                        <a href="{{ $brandId ? url('brand_products/' . $brandId) : '#' }}" class="text-decoration-none">
                            <div
                                class="brand-card bg-white rounded-4 border p-3 d-flex align-items-center justify-content-center">
                                <img src="{{ $brandImageUrl }}" alt="{{ $brandName }}" class="img-fluid" style="max-height:58px; object-fit:contain;">
                                <div class="brand-fallback fw-bold text-uppercase">{{ \Illuminate\Support\Str::limit($brandName, 14, '') }}</div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

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



    <style>
        /* custom premium touches */
        body {
            background: #f9fafc;
            font-family: system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif;
        }

        .product-card {
            transition: all 0.3s cubic-bezier(0.2, 0, 0, 1);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.02), 0 0 0 1px rgba(0, 0, 0, 0.02);
        }

        .product-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 25px 35px -8px rgba(0, 35, 70, 0.1), 0 0 0 1px rgba(60, 100, 180, 0.15);
        }

        .product-img {
            height: 240px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .product-card:hover .product-img {
            transform: scale(1.05);
        }

        /* overlay actions – subtle fade */
        .hover-actions {
            transition: opacity 0.25s ease, transform 0.2s ease;
            opacity: 0;
            transform: translateY(5px);
        }

        .product-card:hover .hover-actions {
            opacity: 1;
            transform: translateY(0);
        }

        .action-btn {
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(2px);
            border: 1px solid rgba(220, 230, 245, 0.6);
            border-radius: 50%;
            color: #1e2b3f;
            transition: background 0.15s, color 0.15s, border-color 0.15s;
            box-shadow: 0 4px 10px rgba(0, 10, 30, 0.08);
        }

        .action-btn:hover {
            background: #ffffff;
            border-color: #9bb7d4;
            color: #0a1a2c;
        }

        .badge-custom {
            font-size: 0.7rem;
            font-weight: 500;
            padding: 0.3rem 0.7rem;
            border-radius: 30px;
            background: #f0f4fe;
            color: #1e2f4a;
            transition: background 0.15s;
            border: 1px solid #d9e2f0;
            line-height: 1.2;
        }

        .badge-custom:hover {
            background: #e4ecfc;
        }

        .section-title {
            background: linear-gradient(145deg, #1b2a41, #2c405c);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.02em;
        }

        .gradient-underline {
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, #3a7bd5, #00c6fb);
            border-radius: 4px;
            margin: 0.75rem auto 0;
        }

        .item-header-icon {
            background: linear-gradient(145deg, #eef2f6, #ffffff);
            box-shadow: 6px 6px 12px #d3d9e6, -6px -6px 12px #ffffff;
            border-radius: 50%;
            width: 52px;
            height: 52px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-outline-muted {
            border: 1px solid #cfdeed;
            color: #2b4055;
            background: white;
            border-radius: 40px;
            padding: 0.45rem 1.5rem;
            font-weight: 500;
            transition: all 0.2s;
        }

        .btn-outline-muted:hover {
            background: #f1f7fd;
            border-color: #8fb0d1;
            color: #0b1e2f;
        }

        .btn-outline-muted svg {
            transition: transform 0.15s;
        }

        .btn-outline-muted:hover svg {
            transform: translateX(5px);
        }

        /* subtle card footer button */
        .quick-view-btn {
            background: #f2f6fc;
            border: 1px solid #dde7f3;
            color: #1f324b;
            border-radius: 40px;
            font-weight: 500;
            padding: 0.6rem 0;
            transition: background 0.2s, border-color 0.2s;
        }

        .quick-view-btn:hover {
            background: #e6effa;
            border-color: #acc4df;
            color: #0b1d33;
        }

        /* categories wrap */
        .category-tray {
            min-height: 2.2rem;
            /* keeps consistent height even if empty */
        }

        .brand-card {
            height: 110px;
            transition: all 0.25s ease;
            border-color: #eceff3 !important;
        }

        .brand-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 24px rgba(0, 0, 0, 0.08);
        }

        .brand-fallback {
            font-size: 1rem;
            color: #334155;
            text-align: center;
        }

        .brand-carousel .owl-stage {
            display: flex;
            align-items: center;
        }

        .brand-carousel .owl-dots {
            margin-top: 18px;
            text-align: center;
        }

        .brand-carousel .owl-dot span {
            width: 8px;
            height: 8px;
            margin: 0 4px;
            background: #d7dbe2;
            display: inline-block;
            border-radius: 50%;
        }

        .brand-carousel .owl-dot.active span {
            width: 20px;
            border-radius: 10px;
            background: #d88a1f;
        }
    </style>

    <!-- optional: tiny extra style for badge consistency -->
    <style>
        /* ensure category tray doesn't break if empty */
        .category-tray {
            min-height: 2.2rem;
        }

        /* refine badge appearance */
        .badge-custom {
            display: inline-block;
            background: #edf4fd;
            border: 1px solid #d0ddee;
            color: #1f3a5f;
            font-size: 0.7rem;
            font-weight: 500;
            padding: 0.25rem 0.7rem;
            border-radius: 20px;
            transition: 0.1s;
            white-space: nowrap;
        }

        .action-btn svg {
            stroke-width: 2;
        }

        /* gradient text backup */
        .section-title {
            background: linear-gradient(145deg, #1d2b44, #31486c);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* smooth entrance (optional) */
        .product-card {
            animation: cardFade 0.5s ease backwards;
            animation-delay: calc(0.05s * var(--card-order, 1));
        }

        @keyframes cardFade {
            0% {
                opacity: 0;
                transform: translateY(12px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
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

            if (typeof $ !== 'undefined' && $('.brand-carousel').length && $.fn.owlCarousel) {
                $('.brand-carousel').owlCarousel({
                    loop: true,
                    margin: 14,
                    dots: true,
                    nav: false,
                    autoplay: true,
                    autoplayTimeout: 3000,
                    autoplayHoverPause: true,
                    responsive: {
                        0: {
                            items: 2
                        },
                        576: {
                            items: 3
                        },
                        768: {
                            items: 4
                        },
                        992: {
                            items: 6
                        },
                        1200: {
                            items: 7
                        }
                    }
                });
            }

        });
    </script>
@endsection
