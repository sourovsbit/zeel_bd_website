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
                        <span>{{ $data->product_name }} Details</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Detail Section -->
    <section class="product-detail-section py-5">
        <div class="container">
            <div class="row g-5">
                <!-- Product Images -->
                <div class="col-lg-6">
                    <div class="product-gallery">
                        <!-- Main Image -->
                        <div class="main-image-wrapper mb-4">
                            <div class="main-image-container">
                                <img id="mainProductImage"
                                     src="{{ asset('/backend/Product/ProductImage/') }}/{{ $activeImage->image }}"
                                     class="img-fluid rounded-3 shadow"
                                     alt="{{ $data->product_name }}">

                                <!-- Badges -->
                                @if($data->is_new ?? false)
                                <span class="product-badge badge bg-success">NEW</span>
                                @endif
                                @if($data->is_featured ?? false)
                                <span class="product-badge badge bg-warning text-dark">FEATURED</span>
                                @endif
                                @if($data->discount_price)
                                <span class="product-badge badge bg-danger">
                                    {{ round((($data->price - $data->discount_price) / $data->price) * 100) }}% OFF
                                </span>
                                @endif
                            </div>

                            <!-- Image Zoom Controls -->
                            <div class="zoom-controls mt-3 text-center">
                                <button class="btn btn-sm btn-outline-secondary" onclick="zoomIn()">
                                    <i class="fas fa-search-plus"></i> Zoom In
                                </button>
                                <button class="btn btn-sm btn-outline-secondary" onclick="zoomOut()">
                                    <i class="fas fa-search-minus"></i> Zoom Out
                                </button>
                                <button class="btn btn-sm btn-outline-secondary" onclick="resetZoom()">
                                    <i class="fas fa-sync-alt"></i> Reset
                                </button>
                            </div>
                        </div>

                        <!-- Thumbnail Gallery -->
                        @if($image && count($image) > 1)
                        <div class="thumbnail-gallery">
                            <h6 class="mb-3">More Images</h6>
                            <div class="row g-2">
                                @foreach($image as $i)
                                <div class="col-3">
                                    <div class="thumbnail-item {{ $loop->first ? 'active' : '' }}"
                                         data-img="{{ asset('/backend/Product/ProductImage/') }}/{{ $i->image }}">
                                        <img src="{{ asset('/backend/Product/ProductImage/') }}/{{ $i->image }}"
                                             class="img-fluid rounded"
                                             alt="Thumbnail {{ $loop->iteration }}">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Product Info -->
                <div class="col-lg-6">
                    <div class="product-info">
                        <!-- Product Title -->
                        <div class="product-header mb-4">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <span class="badge bg-primary mb-2">{{ $data->category->category_name }}</span>
                                    <h1 class="product-title display-6 fw-bold mb-2">{{ $data->product_name }}</h1>
                                    <div class="product-rating d-flex align-items-center mb-3">
                                        @php $rating = $data->rating ?? 0; @endphp
                                        <div class="stars">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= $rating)
                                                <i class="fas fa-star text-warning"></i>
                                                @elseif($i - 0.5 <= $rating)
                                                <i class="fas fa-star-half-alt text-warning"></i>
                                                @else
                                                <i class="far fa-star text-warning"></i>
                                                @endif
                                            @endfor
                                        </div>
                                        <span class="ms-2 text-muted">({{ $data->review_count ?? 0 }} reviews)</span>
                                    </div>
                                </div>
                                <!-- Wishlist Button -->
                                <button class="btn-wishlist btn btn-outline-danger btn-sm">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Short Description -->
                        <div class="product-short-desc mb-4">
                            <p class="lead text-muted">{!! $data->short_description !!}</p>
                        </div>

                        <!-- Price Section -->
                        <div class="price-section mb-4">
                            @if($data->discount_price)
                            <div class="d-flex align-items-center">
                                <h2 class="text-danger fw-bold mb-0">৳{{ number_format($data->discount_price) }}</h2>
                                <h4 class="text-muted text-decoration-line-through ms-3 mb-0">৳{{ number_format($data->price) }}</h4>
                                <span class="badge bg-danger ms-3 py-2">
                                    Save ৳{{ number_format($data->price - $data->discount_price) }}
                                </span>
                            </div>
                            @else
                            <h2 class="text-primary fw-bold mb-0">৳{{ number_format($data->price) }}</h2>
                            @endif
                        </div>

                        <!-- Call to Action -->
                        <div class="cta-section mb-5">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body">
                                    <div class="text-center">
                                        <div class="cta-icon mb-3">
                                            <i class="fas fa-phone-alt fa-3x text-primary"></i>
                                        </div>
                                        <h4 class="mb-3">For Pricing & Purchase</h4>
                                        <p class="text-muted mb-4">Contact us directly for the best price and bulk orders</p>
                                        <a href="tel:+{{ $company->phone }}" class="btn btn-primary btn-lg w-100 py-3">
                                            <i class="fas fa-phone-alt me-2"></i> Call Now: {{ $company->phone }}
                                        </a>
                                        <div class="mt-3">
                                            <small class="text-muted">
                                                <i class="fas fa-clock me-1"></i> Available 9:00 AM - 8:00 PM
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Product Meta -->
                        <div class="product-meta mb-4">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="meta-item">
                                        <span class="text-muted">Category:</span>
                                        <strong>{{ $data->category->category_name }}</strong>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="meta-item">
                                        <span class="text-muted">Tags:</span>
                                        <strong>{{ $data->item->item_name }}</strong>
                                    </div>
                                </div>
                                @if($data->sku ?? false)
                                <div class="col-md-6">
                                    <div class="meta-item">
                                        <span class="text-muted">SKU:</span>
                                        <strong>{{ $data->sku }}</strong>
                                    </div>
                                </div>
                                @endif
                                @if($data->stock_quantity ?? false)
                                <div class="col-md-6">
                                    <div class="meta-item">
                                        <span class="text-muted">Stock:</span>
                                        @if($data->stock_quantity > 0)
                                        <span class="text-success">
                                            <i class="fas fa-check-circle"></i> In Stock
                                            @if($data->stock_quantity <= 10)
                                            <small class="text-danger">(Only {{ $data->stock_quantity }} left)</small>
                                            @endif
                                        </span>
                                        @else
                                        <span class="text-danger">
                                            <i class="fas fa-times-circle"></i> Out of Stock
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Social Share -->
                        <div class="social-share">
                            <h6 class="mb-3">Share this product:</h6>
                            <div class="social-buttons">
                                <a href="{{ $company->facebook }}" class="btn btn-social btn-facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="{{ $company->twitter }}" class="btn btn-social btn-twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="{{ $company->linkedin }}" class="btn btn-social btn-linkedin">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="mailto:?subject={{ urlencode($data->product_name) }}&body={{ urlencode(url()->current()) }}"
                                   class="btn btn-social btn-email">
                                    <i class="fas fa-envelope"></i>
                                </a>
                                <button class="btn btn-social btn-whatsapp" onclick="shareWhatsApp()">
                                    <i class="fab fa-whatsapp"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Tabs -->
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="product-tabs">
                        <ul class="nav nav-tabs border-0" id="productTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                        data-bs-target="#description" type="button" role="tab">
                                    <i class="fas fa-file-alt me-2"></i> Description
                                </button>
                            </li>
                            @if($data->specifications ?? false)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="specifications-tab" data-bs-toggle="tab"
                                        data-bs-target="#specifications" type="button" role="tab">
                                    <i class="fas fa-list-alt me-2"></i> Specifications
                                </button>
                            </li>
                            @endif
                            @if($data->review_count ?? 0 > 0)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="reviews-tab" data-bs-toggle="tab"
                                        data-bs-target="#reviews" type="button" role="tab">
                                    <i class="fas fa-star me-2"></i> Reviews
                                </button>
                            </li>
                            @endif
                        </ul>

                        <div class="tab-content p-4 border border-top-0 rounded-bottom shadow-sm" id="productTabContent">
                            <!-- Description Tab -->
                            <div class="tab-pane fade show active" id="description" role="tabpanel">
                                <div class="product-description">
                                    <h4 class="mb-4">Product Description</h4>
                                    <div class="description-content">
                                        {!! $data->description !!}
                                    </div>
                                </div>
                            </div>

                            <!-- Specifications Tab -->
                            @if($data->specifications ?? false)
                            <div class="tab-pane fade" id="specifications" role="tabpanel">
                                <div class="product-specifications">
                                    <h4 class="mb-4">Technical Specifications</h4>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tbody>
                                                @foreach(json_decode($data->specifications, true) as $key => $value)
                                                <tr>
                                                    <th width="30%">{{ $key }}</th>
                                                    <td>{{ $value }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @endif

                            <!-- Reviews Tab -->
                            @if($data->review_count ?? 0 > 0)
                            <div class="tab-pane fade" id="reviews" role="tabpanel">
                                <div class="product-reviews">
                                    <h4 class="mb-4">Customer Reviews</h4>
                                    <div class="reviews-list">
                                        <!-- Reviews will be loaded here -->
                                        <div class="text-center py-5">
                                            <i class="fas fa-comments fa-3x text-muted mb-3"></i>
                                            <p class="text-muted">No reviews yet. Be the first to review!</p>
                                            <button class="btn btn-primary">Write a Review</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Products -->
            @if(isset($relatedProducts) && count($relatedProducts) > 0)
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="related-products">
                        <h3 class="mb-4">Related Products</h3>
                        <div class="row g-4">
                            @foreach($relatedProducts as $related)
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="card product-card h-100 border-0 shadow-sm">
                                    <div class="position-relative">
                                        <img src="{{ asset('/backend/Product/ProductImage/') }}/{{ $related->image }}"
                                             class="card-img-top"
                                             alt="{{ $related->product_name }}">
                                        <div class="card-body">
                                            <span class="badge bg-light text-dark mb-2">{{ $related->category_name }}</span>
                                            <h5 class="card-title">
                                                <a href="{{ url('sell_page/' . $related->id) }}" class="text-decoration-none">
                                                    {{ Str::limit($related->product_name, 40) }}
                                                </a>
                                            </h5>
                                            <div class="price">
                                                @if($related->discount_price)
                                                <span class="text-danger fw-bold">৳{{ number_format($related->discount_price) }}</span>
                                                <span class="text-muted text-decoration-line-through">৳{{ number_format($related->price) }}</span>
                                                @else
                                                <span class="text-primary fw-bold">৳{{ number_format($related->price) }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            let zoomLevel = 1;
            const maxZoom = 3;
            const minZoom = 1;

            // Thumbnail click event
            $('.thumbnail-item').click(function() {
                $('.thumbnail-item').removeClass('active');
                $(this).addClass('active');

                const newImage = $(this).data('img');
                $('#mainProductImage').attr('src', newImage);
                resetZoom();
            });

            // Wishlist toggle
            $('.btn-wishlist').click(function() {
                const icon = $(this).find('i');
                if (icon.hasClass('far')) {
                    icon.removeClass('far').addClass('fas');
                    $(this).addClass('btn-danger').removeClass('btn-outline-danger');
                    showToast('Added to wishlist!');
                } else {
                    icon.removeClass('fas').addClass('far');
                    $(this).removeClass('btn-danger').addClass('btn-outline-danger');
                    showToast('Removed from wishlist!');
                }
            });

            // Image zoom functions
            window.zoomIn = function() {
                if (zoomLevel < maxZoom) {
                    zoomLevel += 0.1;
                    $('#mainProductImage').css('transform', `scale(${zoomLevel})`);
                }
            }

            window.zoomOut = function() {
                if (zoomLevel > minZoom) {
                    zoomLevel -= 0.1;
                    $('#mainProductImage').css('transform', `scale(${zoomLevel})`);
                }
            }

            window.resetZoom = function() {
                zoomLevel = 1;
                $('#mainProductImage').css('transform', 'scale(1)');
            }

            // Image hover zoom
            $('#mainProductImage').hover(function() {
                $(this).css('cursor', 'zoom-in');
            });

            // WhatsApp share
            window.shareWhatsApp = function() {
                const productName = "{{ $data->product_name }}";
                const url = window.location.href;
                const text = `Check out this product: ${productName}\n${url}`;
                const whatsappUrl = `https://wa.me/?text=${encodeURIComponent(text)}`;
                window.open(whatsappUrl, '_blank');
            }

            // Copy link to clipboard
            window.copyLink = function() {
                const url = window.location.href;
                navigator.clipboard.writeText(url).then(() => {
                    showToast('Link copied to clipboard!');
                });
            }

            // Toast notification
            function showToast(message) {
                const toast = $(`<div class="toast-notification">${message}</div>`);
                $('body').append(toast);

                setTimeout(() => toast.addClass('show'), 100);
                setTimeout(() => {
                    toast.removeClass('show');
                    setTimeout(() => toast.remove(), 300);
                }, 3000);
            }

            // Initialize tab functionality
            const triggerTabList = document.querySelectorAll('#productTab button')
            triggerTabList.forEach(triggerEl => {
                const tabTrigger = new bootstrap.Tab(triggerEl)
                triggerEl.addEventListener('click', event => {
                    event.preventDefault()
                    tabTrigger.show()
                })
            });
        });
    </script>

    <!-- Custom Styles -->
    <style>

        .main-image-container img {
            transition: transform 0.3s ease;
            max-height: 500px;
            width: auto;
            margin: 0 auto;
            display: block;
        }

        .product-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            font-size: 0.85rem;
            padding: 6px 12px;
            border-radius: 20px;
            z-index: 2;
        }

        .product-badge.bg-success { left: 15px; }
        .product-badge.bg-warning { left: 120px; }
        .product-badge.bg-danger { left: 220px; }

        /* Thumbnail Gallery */
        .thumbnail-item {
            cursor: pointer;
            border: 2px solid transparent;
            border-radius: 8px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .thumbnail-item:hover {
            border-color: var(--primary-color);
            transform: translateY(-2px);
        }

        .thumbnail-item.active {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px var(--primary-color);
        }

        .thumbnail-item img {
            width: 100%;
            height: 100px;
            object-fit: cover;
        }

        /* Product Info */
        .product-title {
            font-size: 2.5rem;
            line-height: 1.2;
        }

        .price-section h2 {
            font-size: 3rem;
        }

        /* CTA Section */
        .cta-section .card {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border: none;
        }

        .cta-icon {
            width: 80px;
            height: 80px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        /* Social Share */
        .social-buttons {
            display: flex;
            gap: 10px;
        }

        .btn-social {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            border: none;
        }

        .btn-facebook { background: #3b5998; }
        .btn-twitter { background: #1da1f2; }
        .btn-linkedin { background: #0077b5; }
        .btn-email { background: #ea4335; }
        .btn-whatsapp { background: #25d366; }

        .btn-social:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }


        /* Related Products */
        .product-card {
            transition: all 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.1) !important;
        }

        .product-card .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        /* Contact CTA */
        .contact-cta {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        }

        /* Toast Notification */
        .toast-notification {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: var(--dark-color);
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            transform: translateY(100px);
            opacity: 0;
            transition: all 0.3s ease;
            z-index: 9999;
        }

        .toast-notification.show {
            transform: translateY(0);
            opacity: 1;
        }

        /* Meta Items */
        .meta-item {
            padding: 10px 15px;
            background: var(--light-color);
            border-radius: 8px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .product-title {
                font-size: 1.8rem;
            }

            .price-section h2 {
                font-size: 2rem;
            }

            .product-badge {
                font-size: 0.7rem;
                padding: 4px 8px;
            }

            .product-badge.bg-warning { left: 90px; }
            .product-badge.bg-danger { left: 160px; }

            .nav-tabs .nav-link {
                padding: 0.75rem 1rem;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 576px) {
            .main-image-container {
                padding: 10px;
            }

            .thumbnail-item img {
                height: 80px;
            }

            .social-buttons {
                justify-content: center;
            }
        }
    </style>
@endsection
