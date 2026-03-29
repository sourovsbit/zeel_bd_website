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
    <section class="category-section py-5">
        <div class="container">

            <!-- Section Title -->
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="shop-title">
                        Featured <span>Categories</span>
                    </h2>
                    <p class="shop-subtitle">
                        Explore our most popular categories
                    </p>
                    <a href="{{ url('all_categories') }}" class="view-all-btn mt-2 d-inline-block">
                        View All →
                    </a>
                </div>
            </div>

            <div class="row g-4">
                @forelse ($featuredCategories ?? [] as $category)
                    @php
                        $categoryName = $category['name'] ?? 'Category';
                        $categoryId = $category['id'] ?? null;
                        $categoryImage = $category['image'] ?? null;

                        $categoryImageUrl = $categoryImage ?: 'https://via.placeholder.com/120x120?text=Category';
                    @endphp

                    <div class="col-lg-2 col-md-3 col-6 p-3">
                        <a href="{{ $categoryId ? url('category_products/' . $categoryId) : '#' }}"
                            class="category-card text-decoration-none">

                            <img src="{{ $categoryImageUrl }}" alt="{{ $categoryName }}" class="img-fluid">

                            <h6>
                                {{ \Illuminate\Support\Str::limit($categoryName, 20) }}
                            </h6>

                        </a>
                    </div>

                @empty
                    <div class="col-12 text-center">
                        <h6 class="text-muted mb-0">No featured categories found</h6>
                    </div>
                @endforelse
            </div>

        </div>
    </section>

    <!-- Products Section - Premium Redesign -->
    <section class="products-section py-5">
        <div class="container">
            <!-- Section Title -->
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="shop-title">
                        Shop By <span>Items</span>
                    </h2>
                    <p class="shop-subtitle">
                        Explore our most popular items and find the perfect match for your needs.
                    </p>
                </div>
            </div>
            @if (isset($itemWiseProducts) && $itemWiseProducts->count() > 0)
                @foreach ($itemWiseProducts as $itemGroup)
                    @php
                        $itemName = $itemGroup['item_name'] ?? 'Item';
                        $itemProducts = collect($itemGroup['products'] ?? []);
                    @endphp
                    <!-- Item Group -->
                    <div class="item-group-card mb-5">
                        <div class="item-group-header">
                            <h3 class="item-title">
                                {{ $itemName }}
                            </h3>
                            <a href="{{ url('item_products/' . $itemGroup['item_id']) }}" class="view-all-btn">
                                View All →
                            </a>
                        </div>
                        <!-- Products -->
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
                                    <div class="product-card-new">
                                        <div class="product-image">
                                            <img src="{{ $imagePath }}" alt="{{ $productName }}">
                                            @if ($hasDiscount)
                                                <span class="discount-badge">
                                                    -{{ $discountPercent }}%
                                                </span>
                                            @endif
                                        </div>
                                        <div class="product-info">
                                            <h6>
                                                <a href="{{ $productId ? url('sell_page/' . $productId) : '#' }}">
                                                    {{ \Illuminate\Support\Str::limit($productName, 45) }}
                                                </a>
                                            </h6>
                                            <div class="price-area">
                                                <span class="price">
                                                    ৳{{ number_format($price, 2) }}
                                                </span>
                                                @if ($hasDiscount)
                                                    <span class="old-price">
                                                        ৳{{ number_format($regularPrice, 2) }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <a href="{{ $productId ? url('sell_page/' . $productId) : '#' }}"
                                            class="quick-btn">
                                            View Details
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 text-center py-5">
                                    <h6>No products found for {{ $itemName }}</h6>
                                </div>
                            @endforelse
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center py-5">
                    <h5>No item-wise products found</h5>
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
                                <img src="{{ $brandImageUrl }}" alt="{{ $brandName }}" class="img-fluid"
                                    style="max-height:58px; object-fit:contain;">
                                {{-- <div class="brand-fallback fw-bold text-uppercase">
                                    {{ \Illuminate\Support\Str::limit($brandName, 14, '') }}</div> --}}
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
            <!-- Section Title -->
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="shop-title">
                        What<span> We Do</span>
                    </h2>
                    <p class="shop-subtitle">
                        We are committed to providing top-quality products and exceptional service to our customers.
                    </p>
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
        .products-section {

            background: linear-gradient(135deg, #f5f7ff, #ffffff);

        }

        /* title */

        .shop-title {

            font-size: 36px;

            font-weight: 700;

        }

        .shop-title span {

            color: #ff6b35;

        }

        .shop-subtitle {

            color: #777;

            font-size: 16px;

            margin-top: 8px;

        }


        /* item group card */

        .item-group-card {
            padding: 30px;
            border-radius: 16px;
        }


        /* group header */

        .item-group-header {

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 25px;

        }

        .item-title {
            font-size: 30px;
            font-weight: 700;
            color: #222;
        }

        /* view all */
        .view-all-btn {
            background: #ff6b35;
            color: white;
            padding: 7px 18px;
            border-radius: 30px;
            font-size: 14px;
            text-decoration: none;
            transition: .3s;
        }

        .view-all-btn:hover {
            background: #ff4b10;
            color: white;
        }

        /* product card */
        .product-card-new {
            background: #fff;
            border-radius: 14px;
            padding: 15px;
            height: 100%;
            transition: .35s;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
        }

        .product-card-new:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }


        /* product image */
        .product-image {
            position: relative;
            text-align: center;
            margin-bottom: 12px;
        }

        .product-image img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: .4s;
            object-fit: contain;
        }

        /* discount badge */
        .discount-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background: #ff3b3b;
            color: white;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }


        /* product info */

        .product-info h6 {
            font-size: 15px;
            font-weight: 600;
            min-height: 40px;
        }

        .product-info a {
            text-decoration: none;
            color: #333;
        }

        /* price */

        .price-area {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 6px;
        }

        .sale-price {

            color: #ff3b3b;

            font-weight: 700;

            font-size: 18px;

        }

        .old-price {

            text-decoration: line-through;

            color: #888;

            font-size: 13px;

        }


        /* button */

        .quick-btn {
            margin-top: auto;
            display: block;
            text-align: center;
            background: linear-gradient(135deg, #6366F1, #8B5CF6);
            color: white;
            padding: 9px;
            border-radius: 30px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: .3s;
        }

        .quick-btn:hover {
            background: linear-gradient(135deg, #4F46E5, #7C3AED);
            color: white;
        }

        .price {
            font-size: 18px;
            font-weight: 700;
            color: #6366F1;
            margin-bottom: 14px;
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

        .category-section {
            background: #f8fafc;
        }

        .category-card {
            display: block;
            text-align: center;
            padding: 25px 15px;
            background: #ff6b351c;
            border-radius: 14px;
            transition: all .35s ease;
            /* box-shadow: 0 6px 18px rgba(0, 0, 0, 0.06); */
            border: 1px solid #f1f1f1;
            height: 100%;
        }

        .category-card img {
            height: 100px;
            margin-bottom: 12px;
            transition: .3s;
            background: #fff;
            border-radius: 50%;
        }

        .category-card h6 {
            font-size: 15px;
            font-weight: 600;
            color: #333;
            margin: 0;
        }

        .category-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 18px 35px rgba(0, 0, 0, 0.12);
            border-color: #ff6b35;
        }

        .category-card:hover img {
            transform: scale(1.1);
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
