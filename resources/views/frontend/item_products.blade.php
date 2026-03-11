@extends('frontend.layouts.master')
@extends('frontend.layouts.meta')

@section('content')
    @include('frontend.layouts.navbar')

    @php
        $itemName = $item['name'] ?? 'Item Products';
        $itemCategories = collect($item['categories'] ?? []);
    @endphp

    <section class="py-5 bg-light" style="margin-top: 110px;">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h1 class="display-6 fw-bold text-primary mb-2">{{ $itemName }}</h1>
                    @if ($itemCategories->isNotEmpty())
                        <div class="d-flex flex-wrap gap-2">
                            @foreach ($itemCategories as $category)
                                <span class="badge bg-white text-secondary border px-3 py-2 rounded-pill">{{ $category['name'] ?? 'Category' }}</span>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <div class="row g-4">
                @forelse ($products as $product)
                    @php
                        $imagePath = !empty($product['product_images'][0]['path'])
                            ? 'https://inventory.geelbd.com/storage/app/public' . $product['product_images'][0]['path']
                            : 'https://via.placeholder.com/400x400?text=No+Image';
                        $productName = $product['name'] ?? 'Product';
                        $productId = $product['id'] ?? null;
                        $price = (float) (($product['product_detail']['sale_price'] ?? 0) ?: ($product['product_detail']['regular_price'] ?? 0));
                    @endphp

                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card product-card h-100 border-0 shadow-sm">
                            <div class="position-relative overflow-hidden">
                                <img src="{{ $imagePath }}" class="card-img-top product-img"
                                    alt="{{ $productName }}" style="height: 240px; object-fit: cover;">
                            </div>

                            <div class="card-body pb-2">
                                <h6 class="card-title mb-2">
                                    <a href="{{ $productId ? url('sell_page/' . $productId) : '#' }}" class="text-decoration-none text-dark">
                                        {{ \Illuminate\Support\Str::limit($productName, 55) }}
                                    </a>
                                </h6>

                                <div class="price-section">
                                    <span class="fw-bold text-primary">৳{{ number_format($price, 2) }}</span>
                                </div>
                            </div>

                            <div class="card-footer bg-transparent border-0 pt-0">
                                <a href="{{ $productId ? url('sell_page/' . $productId) : '#' }}" class="btn btn-outline-primary w-100 rounded-pill">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center py-5 bg-white border rounded-4 shadow-sm">
                            <h5 class="text-muted mb-2">No products found for {{ $itemName }}</h5>
                            <p class="text-muted mb-0">Products for this item will appear here when available.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            @if ($pagination->hasPages())
                <div class="row mt-5">
                    <div class="col-12 d-flex justify-content-center">
                        {{ $pagination->links() }}
                    </div>
                </div>
            @endif
        </div>
    </section>

    <style>
        .product-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1) !important;
        }

        .product-img {
            transition: transform 0.5s ease;
        }

        .product-card:hover .product-img {
            transform: scale(1.05);
        }
    </style>
@endsection
