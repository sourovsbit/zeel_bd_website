<div class="row g-4 product-box" id="product-grid">
    @if (!empty($products))
        @foreach ($products as $product)
            @php
                $imagePath = !empty($product['product_images'][0]['path'])
                    ? 'https://inventory.geelbd.com/storage/app/public' . $product['product_images'][0]['path']
                    : 'https://via.placeholder.com/400x400?text=No+Image';
                $name = $product['name'] ?? 'Product';
                $price = $product['product_detail']['regular_price'] ?? 0;
                $sale = $product['product_detail']['sale_price'] ?? 0;
                $discountPercent = $sale > 0 && $price > 0 ? round((($price - $sale) / $price) * 100) : 0;
            @endphp

            <div class="col-xl-3 col-lg-4 col-md-6 p-3">
                <div class="product-card">
                    <div class="product-image-wrapper">
                        <a href="{{ url('sell_page/' . $product['id']) }}">
                            <img src="{{ $imagePath }}" class="product-image" alt="{{ $name }}">
                        </a>
                        <div class="product-badges">
                            @if ($discountPercent > 0)
                                <span class="badge discount-badge">-{{ $discountPercent }}%</span>
                            @endif
                        </div>
                    </div>

                    <div class="product-body">
                        <h6 class="product-title">
                            <a
                                href="{{ url('sell_page/' . $product['id']) }}">{{ \Illuminate\Support\Str::limit($name, 55) }}</a>
                        </h6>

                        <div class="product-price">
                            @if ($sale < $price)
                                <span class="sale-price">৳{{ number_format($sale) }}</span>
                                <span class="old-price">৳{{ number_format($price) }}</span>
                            @else
                                <span class="sale-price">৳{{ number_format($price) }}</span>
                            @endif
                        </div>

                        <a href="{{ url('sell_page/' . $product['id']) }}" class="btn product-btn">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="col-12 text-center py-5">
            <i class="fa fa-box-open fa-4x text-muted mb-4"></i>
            <h3 class="text-muted">No Products Available</h3>
        </div>
    @endif
</div>

{{-- Pagination --}}
@if (!empty($pagination))
    <div class="row mt-5">
        <div class="col-12 text-center">
            <nav>
                <ul class="pagination justify-content-center">
                    @foreach ($pagination['links'] as $link)
                        @php
                            $shopUrl = '#';
                            if ($link['url']) {
                                // Extract page number from the API URL
                                parse_str(parse_url($link['url'], PHP_URL_QUERY), $query);
                                $page = $query['page'] ?? null;

                                // Build a clean shop URL with current filters
                                $queryParams = array_filter([
                                    'page' => $page,
                                    'search' => $search ?? '',
                                    'sort' => $sort ?? '',
                                ]);
                                $shopUrl = url('shop') . '?' . http_build_query($queryParams);
                            }
                        @endphp

                        @if ($link['url'])
                            <li class="page-item {{ $link['active'] ? 'active' : '' }}">
                                <a class="page-link ajax-pagination" href="{{ $shopUrl }}">
                                    {!! $link['label'] !!}
                                </a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span class="page-link">{!! $link['label'] !!}</span>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </nav>
        </div>
    </div>
@endif


<style>
    /* PRODUCT CARD */
    .product-card {
        background: #fff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        border: 1px solid rgba(0, 0, 0, 0.02);
    }

    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(79, 70, 229, 0.15);
    }

    .product-image-wrapper {
        position: relative;
        overflow: hidden;
        background: #f8f9fa;
    }

    .product-image {
        width: 100%;
        height: 260px;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.2, 0.9, 0.3, 1);
    }

    .product-card:hover .product-image {
        transform: scale(1.08);
    }

    .product-badges {
        position: absolute;
        top: 15px;
        left: 15px;
        display: flex;
        flex-direction: column;
        gap: 6px;
        z-index: 2;
    }

    .product-badges .badge {
        padding: 6px 12px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 0.3px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
    }

    .discount-badge {
        background: #ef4444;
        color: white;
    }

    .product-body {
        padding: 18px 16px 20px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .product-title {
        font-size: 16px;
        line-height: 1.4;
        margin-bottom: 8px;
        font-weight: 600;
    }

    .product-title a {
        text-decoration: none;
        color: #1f2937;
        transition: color 0.2s;
    }

    .product-title a:hover {
        color: #4F46E5;
    }

    .product-price {
        margin: 10px 0 16px;
        display: flex;
        align-items: baseline;
        flex-wrap: wrap;
        gap: 6px;
    }

    .sale-price {
        font-size: 18px;
        font-weight: 700;
        color: #6366F1;
        margin-bottom: 14px;
    }

    .old-price {
        font-size: 15px;
        color: #9ca3af;
        text-decoration: line-through;
    }

    .product-btn {
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

    .product-btn:hover {
        background: linear-gradient(135deg, #4338ca, #6d28d9);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 12px 24px rgba(79, 70, 229, 0.4);
    }

    /* PAGINATION – modern rounded style */
    .pagination {
        gap: 6px;
    }

    .page-link {
        border: none;
        background: #f3f4f6;
        color: #4b5563;
        border-radius: 50% !important;
        width: 44px;
        height: 44px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 500;
        font-size: 15px;
        transition: all 0.2s;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02);
        padding: 0;
        line-height: 1;
    }

    .page-link:hover {
        background: #e5e7eb;
        color: #1f2937;
        transform: scale(1.05);
    }

    .page-item.active .page-link {
        background: linear-gradient(135deg, #4F46E5, #7C3AED);
        color: white;
        box-shadow: 0 6px 12px rgba(79, 70, 229, 0.3);
    }

    .page-item.disabled .page-link {
        background: #f3f4f6;
        color: #d1d5db;
        cursor: not-allowed;
    }

    @media (max-width: 991px) {
        .product-image {
            height: 220px;
        }
    }

    @media (max-width: 768px) {
        .product-box {
            padding: 30px;
        }

        .product-image {
            height: 200px;
        }
        .sale-price {
            font-size: 18px;
        }

        .product-btn {
            padding: 10px;
            font-size: 14px;
        }

        .page-link {
            width: 40px;
            height: 40px;
            font-size: 14px;
        }
    }

    @media (max-width: 480px) {
        .product-image {
            height: 260px;
        }

        .product-badges .badge {
            padding: 4px 10px;
            font-size: 11px;
        }

        .product-body {
            padding: 14px 12px;
        }

        .page-link {
            width: 36px;
            height: 36px;
            font-size: 13px;
        }
    }
</style>
