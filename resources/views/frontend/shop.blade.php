@extends('frontend.layouts.master')
@extends('frontend.layouts.meta')

@section('content')
    @include('frontend.layouts.navbar')

    <!-- ========== HERO SECTION ========== -->
    <section class="hero-section position-relative overflow-hidden">
        <div class="hero-bg"></div>
        <div class="container position-relative text-center py-5">
            <span class="badge bg-white text-dark px-3 py-2 rounded-pill mb-3 animate__animated animate__fadeInDown">
                <i class="bi bi-gem me-1"></i> Premium Quality
            </span>
            <h1 class="display-3 fw-bold mb-3 text-white animate__animated animate__fadeInDown">Our Exclusive Collection</h1>
            <p class="lead fs-4 mb-4 text-white animate__animated animate__fadeInUp animate__delay-1s">
                Premium products carefully selected for you
            </p>
            <!-- Search bar integrated into hero -->
            <div class="row justify-content-center animate__animated animate__fadeInUp animate__delay-1s">
                <div class="col-md-6">
                    <form id="heroSearchForm" class="bg-white rounded-pill p-2 shadow-lg">
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-0 ps-3">
                                <i class="bi bi-search text-muted"></i>
                            </span>
                            <input type="text" name="search" id="heroSearch" value="{{ request('search') }}"
                                class="form-control border-0 ps-0" placeholder="Search for products...">
                            <button type="submit" class="btn btn-primary rounded-pill px-4" style="background: linear-gradient(135deg, #4F46E5 0%, #7C3AED 100%);">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== FILTER BAR ========== -->
    <div class="container py-3">
        <div class="card border-0 shadow-sm rounded-4 bg-light p-3">
            <form id="filterForm" class="row g-3 align-items-center">
                <!-- Hidden search field to sync with hero search -->
                <input type="hidden" name="search" id="searchHidden" value="{{ request('search') }}">

                <div class="col-md-8 col-8">
                    <div class="d-flex align-items-center gap-3">
                        <span class="fw-semibold text-secondary m-3"><i class="bi bi-funnel me-1"></i> Sort:</span>
                        <select name="sort" id="sort" class="form-select w-auto rounded-pill border-0 shadow-sm p-3">
                            <option value="">Featured</option>
                            <option value="low_to_high" {{ request('sort') == 'low_to_high' ? 'selected' : '' }}>Price: Low to High</option>
                            <option value="high_to_low" {{ request('sort') == 'high_to_low' ? 'selected' : '' }}>Price: High to Low</option>
                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-4 text-md-end">
                    <button type="submit" class="btn btn-primary rounded-pill px-5 shadow-sm" style="background: linear-gradient(135deg, #4F46E5 0%, #7C3AED 100%);">
                        <i class="bi bi-check-lg me-1"></i> Apply Filters
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- ========== PRODUCT GRID ========== -->
    <div class="container pb-5" id="productsContainer">
        @include('frontend.partials.products_grid')
    </div>

    <div class="container pb-2" id="searchStatus" style="display:none;">
        <div class="alert alert-light border rounded-3 small mb-0" role="status">
            Searching products...
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Bootstrap Icons & Animate.css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <script>
        $(document).ready(function() {
            let searchDebounceTimer;
            let currentRequest = null;

            // Sync hero search with hidden field and main form
            $('#heroSearch').on('keyup', function() {
                $('#searchHidden').val($(this).val());

                clearTimeout(searchDebounceTimer);
                searchDebounceTimer = setTimeout(function() {
                    fetchProducts(null, true);
                }, 500);
            });

            // Submit from hero search
            $('#heroSearchForm').on('submit', function(e) {
                e.preventDefault();
                $('#searchHidden').val($('#heroSearch').val());
                fetchProducts(null, true);
            });

            // Main filter form submit
            $('#filterForm').on('submit', function(e) {
                e.preventDefault();
                fetchProducts(null, true);
            });

            // Auto apply sort without clicking submit button
            $('#sort').on('change', function() {
                fetchProducts(null, true);
            });

            // AJAX fetch function
            function fetchProducts(url = null, resetPage = false) {
                let requestUrl = "{{ url('shop') }}";
                let requestData = $('#filterForm').serializeArray();

                if (resetPage) {
                    requestData = requestData.filter(function(item) {
                        return item.name !== 'page';
                    });
                    requestData.push({
                        name: 'page',
                        value: 1
                    });
                }

                // Keep filter/search active across all pagination clicks.
                if (url) {
                    let pageQuery = (url.split('?')[1] || '');
                    let pageParams = new URLSearchParams(pageQuery);
                    if (pageParams.has('page')) {
                        requestData.push({
                            name: 'page',
                            value: pageParams.get('page')
                        });
                    }
                }

                let queryString = $.param(requestData);

                if (currentRequest && currentRequest.readyState !== 4) {
                    currentRequest.abort();
                }

                currentRequest = $.ajax({
                    url: requestUrl,
                    type: 'GET',
                    data: queryString,
                    beforeSend: function() {
                        $('#searchStatus').show();
                    },
                    success: function(res) {
                        $('#searchStatus').hide();
                        $('#productsContainer').html(res);

                        // Keep browser URL synced for both filter and pagination states.
                        history.pushState(null, '', queryString ? (requestUrl + '?' + queryString) : requestUrl);

                        // Auto-scroll only when navigating pagination links.
                        if (url) {
                            $('html, body').animate({
                                scrollTop: $('#productsContainer').offset().top - 50
                            }, 300);
                        }
                    },
                    error: function(xhr) {
                        $('#searchStatus').hide();
                        if (xhr.statusText === 'abort') {
                            return;
                        }

                        $('#productsContainer').html(`
                            <div class="alert alert-warning text-center my-4" role="alert">
                                Search failed. Please try again.
                            </div>
                        `);
                    }
                });
            }

            // 🔧 FIXED: Pagination click – use correct selector
            $(document).on('click', '.ajax-pagination', function(e) {
                e.preventDefault();
                let url = $(this).attr('href');
                fetchProducts(url);
            });
        });
    </script>

    <style>
        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            min-height: 500px;
            display: flex;
            align-items: center;
        }

        .hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1607082348824-0a96f2a4b9da?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80') center/cover;
            opacity: 0.15;
            mix-blend-mode: overlay;
        }

        .hero-section .badge {
            font-size: 0.9rem;
            letter-spacing: 0.5px;
        }

        #heroSearchForm {
            max-width: 600px;
            margin: 0 auto;
        }

        #heroSearchForm .input-group {
            background: white;
            border-radius: 50px;
            overflow: hidden;
        }

        #heroSearchForm input {
            height: 50px;
            font-size: 1rem;
        }

        #heroSearchForm button {
            height: 50px;
            border-radius: 0 50px 50px 0 !important;
            background: #2a5298;
            border: none;
            font-weight: 500;
        }

        #heroSearchForm button:hover {
            background: #1e3c72;
        }

        /* Filter bar */
        #sort {
            max-width: 250px;
            background: white;
            font-size: 0.95rem;
            padding: 0.6rem 1.2rem;
        }

        .btn-primary {
            background: linear-gradient(45deg, #1e3c72, #2a5298);
            border: none;
            transition: opacity 0.2s;
        }

        .btn-primary:hover {
            opacity: 0.9;
            background: linear-gradient(45deg, #1e3c72, #2a5298);
        }

        /* Product cards – these styles will be applied if your products_grid partial uses .product-card */
        .product-card {
            border: none;
            border-radius: 1rem;
            overflow: hidden;
            transition: transform 0.2s, box-shadow 0.2s;
            background: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .product-card .card-img-top {
            height: 250px;
            object-fit: cover;
        }

        .product-card .card-body {
            padding: 1.5rem 1rem;
        }

        .product-card .card-title {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .product-card .price {
            font-size: 1.25rem;
            font-weight: 700;
            color: #2a5298;
        }

        .product-card .btn-outline-primary {
            border-radius: 50px;
            border-color: #2a5298;
            color: #2a5298;
            padding: 0.4rem 1rem;
        }

        .product-card .btn-outline-primary:hover {
            background: #2a5298;
            color: white;
        }

        /* Pagination styling */
        .pagination .page-link {
            border: none;
            color: #2a5298;
            margin: 0 3px;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 500;
        }

        .pagination .page-item.active .page-link {
            background: #2a5298;
            color: white;
        }

        .pagination .page-link:hover {
            background: #e9ecef;
            color: #1e3c72;
        }

        /* Newsletter */
        .bg-light {
            background: #f8f9fa !important;
        }
    </style>
@endsection
