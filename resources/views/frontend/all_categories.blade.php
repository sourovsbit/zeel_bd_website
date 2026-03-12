@extends('frontend.layouts.master')
@extends('frontend.layouts.meta')

@section('content')
    @include('frontend.layouts.navbar')

    <section class="py-5" style="background:#f8fafc; min-height:70vh; margin-top:100px;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="shop-title mb-2">All <span>Categories</span></h2>
                <p class="shop-subtitle mb-0">Browse all categories grouped by item</p>
            </div>

            @if (isset($itemWiseCategories) && $itemWiseCategories->count() > 0)
                @foreach ($itemWiseCategories as $itemGroup)
                    @php
                        $itemName = $itemGroup['item_name'] ?? 'Item';
                        $categories = collect($itemGroup['categories'] ?? []);
                        $categoryCount = $categories->count();
                    @endphp

                    <div class="item-group-card mb-5">
                        <div class="item-group-header">
                            <h3 class="item-title mb-0">{{ $itemName }} ({{ $categoryCount }})</h3>
                        </div>

                        <div class="row g-4">
                            @foreach ($categories as $category)
                                @php
                                    $categoryName = $category['name'] ?? 'Category';
                                    $categoryId = $category['id'] ?? null;
                                    $categoryImage = $category['image'] ?? null;
                                    $categoryImageUrl = $categoryImage ?: 'https://via.placeholder.com/120x120?text=Category';
                                    $productsCount = (int) ($category['products_count'] ?? 0);
                                    $isPopular = (bool) ($category['is_popular'] ?? false);
                                @endphp

                                <div class="col-xl-3 col-lg-4 col-md-6 p-3">
                                    <a href="{{ $categoryId ? url('category_products/' . $categoryId) : '#' }}"
                                        class="category-card text-decoration-none">
                                        <span class="category-icon-wrap">
                                            <img src="{{ $categoryImageUrl }}" alt="{{ $categoryName }}" class="img-fluid">
                                        </span>

                                        <h6>{{ \Illuminate\Support\Str::limit($categoryName, 24) }}</h6>

                                        <div class="category-meta">
                                            <span class="items-pill">{{ $productsCount }} products</span>

                                            @if ($isPopular)
                                                <span class="popular-pill">
                                                    <i class="fa fa-star"></i> Popular
                                                </span>
                                            @endif
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center py-5">
                    <h5>No categories found</h5>
                </div>
            @endif
        </div>
    </section>

    <style>
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
        }

        .item-group-card {
            background: #fff;
            padding: 30px;
            border-radius: 16px;
            border: 1px solid #f1f1f1;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        .item-group-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .item-title {
            font-size: 22px;
            font-weight: 700;
            color: #222;
        }

        .category-card {
            display: block;
            text-align: center;
            padding: 30px 20px;
            background: #f5f6f8;
            border-radius: 18px;
            border: 1px solid #e3e5ea;
            transition: .25s;
            height: 100%;
        }

        .category-icon-wrap {
            width: 102px;
            height: 102px;
            margin: 0 auto 18px;
            border-radius: 50%;
            background: linear-gradient(145deg, #dbe3ff, #efe8ff);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .category-card img {
            height: 58px;
            object-fit: contain;
        }

        .category-card h6 {
            color: #111827;
            margin-bottom: 14px;
            font-size: 22px;
            line-height: 1.2;
            font-weight: 700;
            letter-spacing: -0.01em;
        }

        .category-meta {
            display: flex;
            gap: 10px;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
        }

        .items-pill {
            background: #e6eeff;
            color: #2155f5;
            border-radius: 999px;
            padding: 8px 16px;
            font-size: 14px;
            font-weight: 600;
            line-height: 1;
        }

        .popular-pill {
            color: #de9b00;
            font-size: 15px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            line-height: 1;
        }

        .category-card:hover {
            transform: translateY(-4px);
            border-color: #d7dbe4;
            box-shadow: 0 12px 26px rgba(15, 23, 42, 0.08);
        }

        @media (max-width: 768px) {
            .category-card h6 {
                font-size: 28px;
            }

            .category-icon-wrap {
                width: 90px;
                height: 90px;
            }
        }
    </style>
@endsection
