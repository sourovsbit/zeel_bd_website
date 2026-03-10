@extends('frontend.layouts.master')
@extends('frontend.layouts.meta')

@section('content')

    @include('frontend.layouts.navbar')

    <!-- HERO HEADER -->
    <section class="product-hero py-5">
        <div class="container text-center">

            <h1 class="display-5 fw-bold mb-3">
                Our Exclusive Collection
            </h1>

            <p class="lead text-muted">
                Premium products carefully selected for you
            </p>

        </div>
    </section>

    <!-- PRODUCT GRID -->
    <main class="pb-5">
        <div class="container">
            <div class="row g-4" id="product-grid">
                @if (!empty($products))
                    @php $count = 0; @endphp
                    @foreach ($products as $product)
                        @php
                            $imagePath = !empty($product['product_images'][0]['path'])
                                ? 'https://inventory.geelbd.com/storage/app/public' .
                                    $product['product_images'][0]['path']
                                : 'https://via.placeholder.com/400x400?text=No+Image';
                            $name = $product['name'] ?? 'Product';
                            $price = $product['product_detail']['regular_price'] ?? 0;
                            $sale = $product['product_detail']['sale_price'] ?? 0;
                            $discountPercent = $sale > 0 && $price > 0 ? round((($price - $sale) / $price) * 100) : 0;
                        @endphp

                        <div class="col-xl-3 col-lg-4 col-md-6 product-item {{ $count >= 8 ? 'd-none extra-product' : '' }}">
                            <div class="product-card">
                                <div class="product-image-wrapper">
                                    <a href="{{ url('sell_page/' . $product['id']) }}">
                                        <img src="{{ $imagePath }}" class="product-image" alt="{{ $name }}"
                                            loading="lazy">
                                    </a>

                                    <!-- BADGES -->
                                    <div class="product-badges">
                                        @if ($discountPercent > 0)
                                            <span class="badge discount-badge">
                                                -{{ $discountPercent }}%
                                            </span>
                                        @endif
                                        @if ($product['is_new'] ?? false)
                                            <span class="badge new-badge">
                                                New
                                            </span>
                                        @endif
                                        @if ($product['is_featured'] ?? false)
                                            <span class="badge featured-badge">
                                                Featured
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="product-body">
                                    <h6 class="product-title">
                                        <a href="{{ url('sell_page/' . $product['id']) }}">
                                            {{ \Illuminate\Support\Str::limit($name, 55) }}
                                        </a>
                                    </h6>
                                    <div class="product-price">
                                        @if ($sale < $price)
                                            <span class="sale-price">
                                                ৳{{ number_format($sale) }}
                                            </span>
                                            <span class="old-price">
                                                ৳{{ number_format($price) }}
                                            </span>
                                        @else
                                            <span class="sale-price">
                                                ৳{{ number_format($price) }}
                                            </span>
                                        @endif
                                    </div>
                                    <a href="{{ url('sell_page/' . $product['id']) }}" class="btn product-btn">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                        @php $count++; @endphp
                    @endforeach
                @else
                    <div class="col-12 text-center py-5">

                        <i class="fa fa-box-open fa-4x text-muted mb-4"></i>

                        <h3 class="text-muted">
                            No Products Available
                        </h3>
                    </div>
                @endif
            </div>
        </div>
    </main>



    <style>
        /* HERO */
        .product-hero {
            color: #fff;
            margin-top: 80px;
        }

        /* PRODUCT CARD */
        .product-card {
            background: #fff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 0, 0, .06);
            transition: .35s;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 60px rgba(0, 0, 0, .15);
        }


        /* IMAGE */

        .product-image-wrapper {
            position: relative;
            overflow: hidden;
        }

        .product-image {
            width: 100%;
            height: 260px;
            object-fit: cover;
            transition: .6s;
        }

        .product-card:hover .product-image {
            transform: scale(1.08);
        }


        /* BADGES */

        .product-badges {
            position: absolute;
            top: 12px;
            left: 12px;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .product-badges .badge {
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .discount-badge {
            background: #ef4444;
            color: #fff;
        }

        .new-badge {
            background: #10b981;
            color: #fff;
        }

        .featured-badge {
            background: #f59e0b;
            color: #fff;
        }


        /* BODY */

        .product-body {
            padding: 18px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .product-title a {
            text-decoration: none;
            color: #111827;
            font-weight: 600;
        }

        .product-title a:hover {
            color: #7C3AED;
        }


        /* PRICE */

        .product-price {
            margin-top: 10px;
            margin-bottom: 15px;
        }

        .sale-price {
            font-size: 18px;
            font-weight: 700;
            color: #ef4444;
        }

        .old-price {
            margin-left: 8px;
            color: #9ca3af;
            text-decoration: line-through;
            font-size: 14px;
        }


        /* BUTTON */

        .product-btn {
            display: inline-block;
            text-align: center;
            padding: 10px;
            border-radius: 30px;
            font-weight: 600;
            background: linear-gradient(135deg, #4F46E5, #7C3AED);
            color: #fff;
            text-decoration: none;
            transition: .3s;
        }

        .product-btn:hover {
            opacity: .9;
            color: #fff;
        }


        /* MOBILE */

        @media(max-width:768px) {

            .product-image {
                height: 200px;
            }

        }

        /* HERO */

        .product-hero {
            color: #fff;
            margin-top: 80px;
            padding: 40px 0;
        }

        .product-hero h1 {
            font-size: clamp(28px, 4vw, 42px);
        }

        .product-hero p {
            font-size: clamp(14px, 2vw, 18px);
        }


        /* PRODUCT CARD */

        .product-card {
            background: #fff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .06);
            transition: .35s;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .product-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, .12);
        }


        /* IMAGE */

        .product-image-wrapper {
            position: relative;
            overflow: hidden;
        }

        .product-image {
            width: 100%;
            height: 260px;
            object-fit: cover;
            transition: .6s;
        }

        .product-card:hover .product-image {
            transform: scale(1.08);
        }


        /* BADGES */

        .product-badges {
            position: absolute;
            top: 12px;
            left: 12px;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .product-badges .badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }


        /* BODY */

        .product-body {
            padding: 18px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .product-title {
            font-size: 15px;
            line-height: 1.4;
        }

        .product-title a {
            text-decoration: none;
            color: #111827;
            font-weight: 600;
        }

        .product-title a:hover {
            color: #7C3AED;
        }


        /* PRICE */

        .product-price {
            margin-top: 10px;
            margin-bottom: 15px;
        }

        .sale-price {
            font-size: 18px;
            font-weight: 700;
            color: #ef4444;
        }

        .old-price {
            margin-left: 8px;
            color: #9ca3af;
            text-decoration: line-through;
            font-size: 14px;
        }


        /* BUTTON */

        .product-btn {
            display: block;
            text-align: center;
            padding: 10px;
            border-radius: 30px;
            font-weight: 600;
            background: linear-gradient(135deg, #4F46E5, #7C3AED);
            color: #fff;
            text-decoration: none;
            transition: .3s;
            font-size: 14px;
        }

        .product-btn:hover {
            opacity: .9;
            color: #fff;
        }


        /* TABLET */

        @media (max-width:991px) {

            .product-image {
                height: 220px;
            }

            .product-body {
                padding: 15px;
            }

        }


        /* MOBILE */

        @media (max-width:768px) {

            .product-hero {
                margin-top: 60px;
                padding: 30px 0;
            }

            .product-image {
                height: 200px;
            }

            .product-title {
                font-size: 14px;
            }

            .sale-price {
                font-size: 16px;
            }

            .product-btn {
                padding: 8px;
                font-size: 13px;
            }

        }


        /* SMALL MOBILE */

        @media (max-width:480px) {

            .product-image {
                height: 260px;
            }

            .product-body {
                padding: 12px;
            }

            .product-badges .badge {
                font-size: 10px;
                padding: 4px 8px;
            }

        }
    </style>

@endsection
