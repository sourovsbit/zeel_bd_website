@extends('frontend.layouts.master')
@extends('frontend.layouts.meta')

@section('content')
    <!-- Navbar -->
    @include('frontend.layouts.navbar')

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section main-content mt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Product List</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Main Content -->
    <main class="main-content py-5">
        <div class="container">
            <!-- Page Header -->
            <div class="row mb-5">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h2 class="section-title fw-bold display-6 mb-3">Our Exclusive Collection</h2>
                        <p class="text-muted lead">Handcrafted quality products for your everyday needs</p>
                    </div>
                </div>
            </div>

            <!-- Filter & Sort Section -->
            <div class="row mb-4" id="categories">
                <div class="col-lg-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="row align-items-center">
                                <!-- Categories -->
                                <div class="col-lg-4 mb-3 mb-lg-0">
                                    <h5 class="mb-3">Categories</h5>
                                    <div class="category-filter">
                                        <div class="btn-group flex-wrap" role="group">
                                            <button type="button" class="btn btn-outline-primary active">All</button>
                                            @foreach($categories ?? [] as $category)
                                            <button type="button" class="btn btn-outline-primary">
                                                {{ $category->category_name }}
                                            </button>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="row" id="product-grid">
                @if($total_products > 0)
                    @php $count = 0; @endphp
                    @foreach($products as $product)
                    @php
                        $productImage = DB::table('product_images')
                            ->where('product_id', $product->product_id)
                            ->first();

                        $imagePath = $productImage ?
                            asset('/backend/Product/ProductImage/' . $productImage->image) :
                            'https://via.placeholder.com/300x300?text=No+Image';

                        // Calculate discount percentage
                        $discountPercent = $product->discount_price ?
                            round((($product->price - $product->discount_price) / $product->price) * 100) : 0;
                    @endphp

                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4 product-item {{ $count >= 8 ? 'd-none extra-product' : '' }}">
                        <div class="card h-100 border-0 product-card">
                            <!-- Product Image -->
                            <div class="position-relative overflow-hidden">
                                <a href="{{ url('sell_page/' . $product->id) }}">
                                    <img src="{{ $imagePath }}"
                                         class="card-img-top product-image"
                                         alt="{{ $product->product_name }}"
                                         loading="lazy">
                                </a>

                                <!-- Badges -->
                                <div class="product-badges">
                                    @if($discountPercent > 0)
                                    <span class="badge bg-danger">-{{ $discountPercent }}%</span>
                                    @endif
                                    @if($product->is_new ?? false)
                                    <span class="badge bg-success">New</span>
                                    @endif
                                    @if($product->is_featured ?? false)
                                    <span class="badge bg-warning text-dark">Featured</span>
                                    @endif
                                </div>

                                {{-- <!-- Quick Actions -->
                                <div class="quick-actions">
                                    <button class="btn-wishlist" data-product-id="{{ $product->id }}">
                                        <i class="far fa-heart"></i>
                                    </button>
                                    <button class="btn-compare" data-product-id="{{ $product->id }}">
                                        <i class="fas fa-exchange-alt"></i>
                                    </button>
                                </div>

                                <!-- Add to Cart Button -->
                                <div class="add-to-cart-overlay">
                                    <button class="btn btn-primary btn-add-cart w-100"
                                            data-product-id="{{ $product->id }}">
                                        <i class="fas fa-shopping-cart me-2"></i> Add to Cart
                                    </button>
                                </div> --}}
                            </div>

                            <!-- Product Details -->
                            <div class="card-body">
                                <!-- Category -->
                                <div class="mb-2">
                                    <a href="#" class="text-decoration-none">
                                        <span class="badge bg-light text-dark">
                                            {{ $product->category->category_name ?? 'Uncategorized' }}
                                        </span>
                                    </a>
                                </div>

                                <!-- Product Name -->
                                <h5 class="card-title product-name">
                                    <a href="{{ url('sell_page/' . $product->id) }}"
                                       class="text-decoration-none text-dark">
                                        {{ Str::limit($product->product_name, 50) }}
                                    </a>
                                </h5>

                                <!-- Price -->
                                <div class="product-price mt-3">
                                    @if($product->discount_price)
                                    <div class="d-flex align-items-center">
                                        <span class="h5 fw-bold text-danger mb-0">
                                            ৳{{ number_format($product->discount_price) }}
                                        </span>
                                        <span class="text-muted text-decoration-line-through ms-2">
                                            ৳{{ number_format($product->sale_price) }}
                                        </span>
                                    </div>
                                    @else
                                    <span class="h5 fw-bold text-primary mb-0">
                                        ৳{{ number_format($product->sale_price) }}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Card Footer -->
                            <div class="card-footer bg-transparent border-top-0 pt-0">
                                <div class="d-grid gap-2">
                                    <a href="{{ url('sell_page/' . $product->id) }}"
                                       class="btn btn-outline-primary"> View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php $count++; @endphp
                    @endforeach

                    <!-- Load More Button -->
                    @if($total_products > 8)
                    <div class="col-12 text-center mt-5">
                        <button id="loadMoreProducts" class="btn btn-outline-primary btn-lg px-5 py-3">
                            <i class="fas fa-sync-alt me-2"></i> Load More Products
                            <span class="badge bg-primary ms-2">{{ $total_products - 8 }}+</span>
                        </button>
                    </div>
                    @endif

                @else
                <!-- Empty State -->
                <div class="col-12">
                    <div class="text-center py-5 my-5">
                        <div class="empty-state-icon mb-4">
                            <i class="fas fa-box-open fa-4x text-muted"></i>
                        </div>
                        <h3 class="text-muted mb-3">No Products Available</h3>
                        <p class="text-muted mb-4">We're currently updating our collection. Please check back later.</p>
                        <a href="{{ url('/') }}" class="btn btn-primary">
                            <i class="fas fa-home me-2"></i> Back to Home
                        </a>
                    </div>
                </div>
                @endif
            </div>

            <!-- Features Section -->
            {{-- <div class="row mt-5 pt-5">
                <div class="col-12">
                    <div class="features-section bg-light rounded-3 p-5">
                        <div class="row g-4">
                            <div class="col-lg-3 col-md-6">
                                <div class="feature-item text-center">
                                    <div class="feature-icon mb-3">
                                        <i class="fas fa-shipping-fast fa-2x text-primary"></i>
                                    </div>
                                    <h5>Free Shipping</h5>
                                    <p class="text-muted mb-0">On orders over $50</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="feature-item text-center">
                                    <div class="feature-icon mb-3">
                                        <i class="fas fa-undo-alt fa-2x text-primary"></i>
                                    </div>
                                    <h5>Easy Returns</h5>
                                    <p class="text-muted mb-0">30-day return policy</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="feature-item text-center">
                                    <div class="feature-icon mb-3">
                                        <i class="fas fa-shield-alt fa-2x text-primary"></i>
                                    </div>
                                    <h5>Secure Payment</h5>
                                    <p class="text-muted mb-0">100% secure transactions</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="feature-item text-center">
                                    <div class="feature-icon mb-3">
                                        <i class="fas fa-headset fa-2x text-primary"></i>
                                    </div>
                                    <h5>24/7 Support</h5>
                                    <p class="text-muted mb-0">Dedicated customer service</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </main>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            // Load More Products
            $("#loadMoreProducts").click(function() {
                $(".extra-product.d-none").slice(0, 4).removeClass("d-none").hide().fadeIn(500);

                if ($(".extra-product.d-none").length === 0) {
                    $(this).fadeOut();
                    $(".no-more-products").removeClass("d-none");
                }
            });

            // Add to Cart
            $(".btn-add-cart").click(function(e) {
                e.preventDefault();
                const productId = $(this).data('product-id');
                const btn = $(this);

                btn.html('<i class="fas fa-spinner fa-spin me-2"></i> Adding...');
                btn.prop('disabled', true);

                // Simulate API call
                setTimeout(() => {
                    btn.html('<i class="fas fa-check me-2"></i> Added!');
                    btn.removeClass('btn-primary').addClass('btn-success');

                    // Update cart count
                    updateCartCount();

                    // Reset button after 2 seconds
                    setTimeout(() => {
                        btn.html('<i class="fas fa-shopping-cart me-2"></i> Add to Cart');
                        btn.removeClass('btn-success').addClass('btn-primary');
                        btn.prop('disabled', false);
                    }, 2000);
                }, 1000);
            });

            // Wishlist
            $(".btn-wishlist").click(function() {
                const btn = $(this);
                const icon = btn.find('i');

                if (icon.hasClass('far')) {
                    icon.removeClass('far').addClass('fas');
                    btn.addClass('active');
                    showToast('Added to wishlist!');
                } else {
                    icon.removeClass('fas').addClass('far');
                    btn.removeClass('active');
                    showToast('Removed from wishlist!');
                }
            });

            // Category Filter
            $(".category-filter button").click(function() {
                $(".category-filter button").removeClass('active');
                $(this).addClass('active');
            });

            // Product Hover Effects
            $(".product-card").hover(
                function() {
                    $(this).addClass('shadow-lg');
                },
                function() {
                    $(this).removeClass('shadow-lg');
                }
            );

            // Helper Functions
            function updateCartCount() {
                const cartCount = $(".cart-count");
                let currentCount = parseInt(cartCount.text()) || 0;
                cartCount.text(currentCount + 1);
            }

            function showToast(message) {
                // Create toast element
                const toast = $(`<div class="toast-alert">${message}</div>`);
                $('body').append(toast);

                // Show and remove toast
                setTimeout(() => toast.addClass('show'), 100);
                setTimeout(() => {
                    toast.removeClass('show');
                    setTimeout(() => toast.remove(), 300);
                }, 3000);
            }
        });
    </script>

    <!-- Custom Styles -->
    <style>

        /* Product Card */
        .product-card {
            transition: all 0.3s ease;
            border-radius: 12px;
            overflow: hidden;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
        }

        .product-image {
            height: 250px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .product-card:hover .product-image {
            transform: scale(1.05);
        }

        /* Product Badges */
        .product-badges {
            position: absolute;
            top: 15px;
            left: 15px;
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .product-badges .badge {
            font-size: 0.75rem;
            padding: 5px 10px;
            border-radius: 20px;
        }
        .product-card:hover .add-to-cart-overlay {
            transform: translateY(0);
        }

        /* Product Name */
        .product-name a:hover {
            color: var(--primary-color) !important;
        }

        /* Features Section */
        .feature-item {
            padding: 20px;
            transition: transform 0.3s ease;
        }

        .feature-item:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        /* Responsive */
        @media (max-width: 768px) {

            .product-image {
                height: 200px;
            }

            .category-filter .btn {
                margin-bottom: 5px;
            }

            .features-section {
                padding: 2rem 1rem !important;
            }
        }

        @media (max-width: 576px) {
            .hero-banner .display-4 {
                font-size: 2rem;
            }

            .section-title {
                font-size: 1.8rem;
            }
        }
    </style>
@endsection
