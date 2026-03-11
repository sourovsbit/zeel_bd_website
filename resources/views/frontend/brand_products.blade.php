@extends('frontend.layouts.master')
@extends('frontend.layouts.meta')

@section('content')
    @include('frontend.layouts.navbar')

    <section class="py-5" style="background:#f8fafc; min-height:60vh;">
        <div class="container">
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
                <div>
                    <p class="text-uppercase small mb-1" style="letter-spacing:2px; color:#d88a1f; font-weight:700;">Brand Products</p>
                    <h2 class="fw-bold mb-0" style="color:#1f2937;">{{ $brand['name'] ?? 'Brand' }}</h2>
                </div>
                <a href="{{ url('/') }}" class="btn btn-outline-secondary rounded-pill px-4">Back to Home</a>
            </div>

            @if ($products->count() > 0)
                <div class="row g-4">
                    @foreach ($products as $product)
                        @php
                            $productName = $product['name'] ?? 'Product';
                            $productId = $product['id'] ?? null;
                            $imagePath = !empty($product['product_images'][0]['path'])
                                ? 'https://inventory.geelbd.com/storage/app/public' . $product['product_images'][0]['path']
                                : 'https://via.placeholder.com/600x600?text=No+Image';

                            $regularPrice = (float) ($product['product_detail']['regular_price'] ?? 0);
                            $salePrice = (float) ($product['product_detail']['sale_price'] ?? 0);
                            $price = $salePrice ?: $regularPrice;
                        @endphp

                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="card h-100 border-0 rounded-4 overflow-hidden" style="box-shadow:0 10px 22px rgba(0,0,0,0.06);">
                                <img src="{{ $imagePath }}" alt="{{ $productName }}" class="w-100" style="height:240px; object-fit:cover;">

                                <div class="card-body">
                                    <h6 class="fw-semibold mb-2" style="min-height:44px;">
                                        <a href="{{ $productId ? url('sell_page/' . $productId) : '#' }}" class="text-decoration-none text-dark">
                                            {{ \Illuminate\Support\Str::limit($productName, 55) }}
                                        </a>
                                    </h6>

                                    <div class="fw-bold" style="color:#1f2937; font-size:1.1rem;">৳{{ number_format($price, 2) }}</div>
                                </div>

                                <div class="card-footer bg-white border-0 pt-0 pb-3 px-3">
                                    <a href="{{ $productId ? url('sell_page/' . $productId) : '#' }}" class="btn btn-sm w-100 rounded-pill" style="background:#e9eff8; color:#1f2937;">View Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-4 d-flex justify-content-center">
                    {{ $pagination->links() }}
                </div>
            @else
                <div class="bg-white border rounded-4 py-5 text-center">
                    <h5 class="mb-2 text-secondary">No products found for this brand.</h5>
                    <p class="text-muted mb-0">Products will appear here when available.</p>
                </div>
            @endif
        </div>
    </section>
@endsection
