@extends('frontend.layouts.master')
@extends('frontend.layouts.meta')

@section('content')
    @include('frontend.layouts.navbar')

    @php
        $itemName = $item['name'] ?? 'Item Products';
        $itemCategories = collect($item['categories'] ?? []);
    @endphp

    <section class="item-products-section py-5">

        <div class="container">

            <!-- HEADER -->

            <div class="row mb-4">

                <div class="col-12">

                    <h1 class="item-title">

                        {{ $itemName }}

                    </h1>

                    @if ($itemCategories->isNotEmpty())
                        <div class="category-badges">

                            @foreach ($itemCategories as $category)
                                <span class="category-pill">

                                    {{ $category['name'] ?? 'Category' }}

                                </span>
                            @endforeach

                        </div>
                    @endif

                </div>

            </div>

            <!-- PRODUCTS -->

            <div class="row g-4 product-box">

                @forelse ($products as $product)
                    @php

                        $imagePath = !empty($product['product_images'][0]['path'])
                            ? 'https://inventory.geelbd.com/storage/app/public' . $product['product_images'][0]['path']
                            : 'https://via.placeholder.com/400x400?text=No+Image';

                        $productName = $product['name'] ?? 'Product';

                        $productId = $product['id'] ?? null;

                        $price =
                            (float) ($product['product_detail']['sale_price'] ?? 0 ?:
                            $product['product_detail']['regular_price'] ?? 0);
                    @endphp

                    <div class="col-xl-3 col-lg-4 col-md-6 p-3">

                        <div class="product-card">

                            <div class="product-img-wrap">

                                <img src="{{ $imagePath }}" alt="{{ $productName }}">

                            </div>

                            <div class="product-body">

                                <h6>

                                    <a href="{{ $productId ? url('sell_page/' . $productId) : '#' }}">

                                        {{ \Illuminate\Support\Str::limit($productName, 55) }}

                                    </a>

                                </h6>

                                <div class="price">
                                    ৳{{ number_format($price, 2) }}
                                </div>
                                <a href="{{ $productId ? url('sell_page/' . $productId) : '#' }}" class="details-btn">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                @empty

                    <div class="col-12">

                        <div class="empty-box">

                            <h5>No products found for {{ $itemName }}</h5>

                            <p>Products will appear here when available.</p>

                        </div>

                    </div>
                @endforelse

            </div>

            <!-- PAGINATION -->

            @if ($pagination->hasPages())
                <div class="pagination-wrap">

                    {{ $pagination->links() }}

                </div>
            @endif

        </div>

    </section>

    <style>
        /* SECTION BACKGROUND */

        .item-products-section {

            background: linear-gradient(180deg, #f5f7ff, #ffffff);

            margin-top: 110px;

        }


        /* TITLE */

        .item-title {

            font-size: 34px;

            font-weight: 700;

            color: #222;

            margin-bottom: 12px;

        }

        .item-title span {

            color: #6366F1;

        }


        /* CATEGORY BADGES */

        .category-badges {

            display: flex;

            flex-wrap: wrap;

            gap: 10px;

            margin-top: 10px;

        }

        .category-pill {

            background: #fff;

            border: 1px solid #e4e7ff;

            padding: 6px 14px;

            border-radius: 30px;

            font-size: 13px;

            color: #6366F1;

            font-weight: 500;

            transition: .2s;

        }

        .category-pill:hover {

            background: #6366F1;

            color: white;

        }


        /* PRODUCT CARD */

        .product-card {

            background: white;

            border-radius: 16px;

            overflow: hidden;

            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.06);

            transition: .35s;

            height: 100%;

            display: flex;

            flex-direction: column;

        }

        .product-card:hover {

            transform: translateY(-10px);

            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.15);

        }


        /* PRODUCT IMAGE */

        .product-img-wrap {

            overflow: hidden;

        }

        .product-img-wrap img {

            width: 100%;

            height: 230px;

            object-fit: cover;

            transition: .4s;

        }

        .product-card:hover img {

            transform: scale(1.05);

        }


        /* PRODUCT BODY */

        .product-body {

            padding: 18px;

            display: flex;

            flex-direction: column;

            flex-grow: 1;

        }

        .product-body h6 {

            font-size: 15px;

            font-weight: 600;

            margin-bottom: 10px;

            line-height: 1.4;

        }

        .product-body a {
            text-decoration: none;
            color: #000;
        }

        .product-body a:hover {
            color: #6366F1;
        }


        /* PRICE */

        .price {

            font-size: 18px;

            font-weight: 700;

            color: #6366F1;

            margin-bottom: 14px;

        }


        /* BUTTON */

        .details-btn {
            margin-top: auto;
            display: block;
            text-align: center;
            background: linear-gradient(135deg, #6366F1, #8B5CF6);
            color: white !important;
            padding: 9px;
            border-radius: 30px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: .3s;
        }

        .details-btn:hover {
            background: linear-gradient(135deg, #4F46E5, #7C3AED);
            color: white;
        }


        /* EMPTY BOX */

        .empty-box {

            text-align: center;

            padding: 60px;

            background: white;

            border-radius: 16px;

            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);

        }


        /* PAGINATION */

        .pagination-wrap {

            margin-top: 50px;

            display: flex;

            justify-content: center;

        }

        .pagination {

            gap: 6px;

        }

        .pagination .page-link {

            border: none;

            background: #f4f6ff;

            color: #6366F1;

            border-radius: 12px;

            width: 40px;

            height: 40px;

            display: flex;

            align-items: center;

            justify-content: center;

            font-weight: 500;

        }

        .pagination .page-item.active .page-link {

            background: linear-gradient(135deg, #6366F1, #8B5CF6);

            color: white;

        }

        .pagination .page-link:hover {

            background: #e8ebff;

            color: #4F46E5;

        }


        /* MOBILE */

        @media(max-width:768px) {
            .product-box{
                padding: 30px;
            }

            .item-title {

                font-size: 24px;

            }

            .product-img-wrap img {
                height: 200px;
                object-fit: contain;
                width: 100%;
            }

        }
    </style>

@endsection
