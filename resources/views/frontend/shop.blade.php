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
        </div>
    </section>

    <!-- ========== FILTER BAR ========== -->
    <div class="container py-3">
        <div class="card border-0 shadow-sm rounded-4 bg-light p-3">
            <form id="filterForm" class="row g-3 align-items-center">
                <!-- Hidden search field to sync with hero search -->
                <input type="hidden" name="search" id="searchHidden" value="{{ request('search') }}">

                <div class="col-md-8 col-12">
                    <div class="d-flex align-items-center gap-3">
                        <span class="fw-semibold text-secondary m-3"><i class="bi bi-funnel me-1"></i> Sort:</span>
                        <select name="sort" id="sort"
                            class="form-select w-auto rounded-pill border-0 shadow-sm p-3">
                            <option value="">Featured</option>
                            <option value="low_to_high" {{ request('sort') == 'low_to_high' ? 'selected' : '' }}>Price: Low
                                to High</option>
                            <option value="high_to_low" {{ request('sort') == 'high_to_low' ? 'selected' : '' }}>Price: High
                                to Low</option>
                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-12 text-md-end" style="border: 1px solid #999;border-radius: 50px; padding: 0;">
                    <form id="heroSearchForm" class="bg-white rounded-pill p-2 shadow-lg">
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-0 ps-3">
                                <i class="bi bi-search text-muted"></i>
                            </span>
                            <input type="text" name="search" id="heroSearch" value="{{ request('search') }}"
                                class="form-control border-0 ps-0" placeholder="Search for products...">
                            <button type="submit" class="btn btn-primary rounded-pill px-4"
                                style="background: linear-gradient(135deg, #4F46E5 0%, #7C3AED 100%);">Search</button>
                        </div>
                    </form>
                </div>
            </form>
        </div>
    </div>

    <!-- ========== PRODUCT GRID ========== -->
    <div class="container pb-5" id="productsContainer">
        @include('frontend.partials.products_grid')
        <div class="container pb-2" id="searchStatus" style="display:none;">
            <div class="alert alert-light border rounded-3 small mb-0" role="status">
                Searching products...
            </div>
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
            let lastSearchTerm = $('#heroSearch').val().trim();

            // Sync hero search with hidden field and main form
            $('#heroSearch').on('keyup', function() {
                const typedValue = $(this).val();
                const searchTerm = typedValue.trim();

                $('#searchHidden').val(typedValue);

                if (searchTerm === lastSearchTerm) {
                    return;
                }

                if (searchTerm.length > 0 && searchTerm.length < 3) {
                    return;
                }

                clearTimeout(searchDebounceTimer);
                searchDebounceTimer = setTimeout(function() {
                    lastSearchTerm = searchTerm;
                    fetchProducts(null, true);
                }, 700);
            });

            // Submit from hero search
            $('#heroSearchForm').on('submit', function(e) {
                e.preventDefault();
                $('#searchHidden').val($('#heroSearch').val());
                lastSearchTerm = $('#heroSearch').val().trim();
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
                        history.pushState(null, '', queryString ? (requestUrl + '?' + queryString) :
                            requestUrl);

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
        /* ================= HERO SECTION ================= */

        .hero-section {
            background: linear-gradient(135deg, #4F46E5, #7C3AED, #9333EA);
            position: relative;
            color: white;
            overflow: hidden;
            display: flex;
            align-items: center;
        }

        .hero-section::before {
            content: "";
            position: absolute;
            width: 400px;
            height: 400px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 50%;
            top: -100px;
            left: -100px;
            filter: blur(80px);
        }

        .hero-section::after {
            content: "";
            position: absolute;
            width: 400px;
            height: 400px;
            background: rgba(255, 255, 255, 0.12);
            border-radius: 50%;
            bottom: -120px;
            right: -120px;
            filter: blur(80px);
        }

        .hero-section h1 {
            font-weight: 700;
            letter-spacing: -1px;
        }

        .hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: .12;
            background-size: cover;
            background-position: center;
        }

        .hero-section .badge {
            font-size: .9rem;
            letter-spacing: .5px;
        }


        /* ================= SEARCH BOX ================= */

        #heroSearchForm {
            background: white;
            border-radius: 50px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
            transition: .3s;
        }

        #heroSearchForm:hover {
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.12);
        }

        #heroSearchForm .input-group {
            background: white;
            border-radius: 50px;
            overflow: hidden;
        }

        #heroSearchForm input {
            height: 48px;
            font-size: 15px;
            border: none;
        }

        #heroSearchForm button {
            background: linear-gradient(135deg, #6366F1, #8B5CF6);
            border: none;
            font-weight: 600;
            padding: 0 24px;
        }

        #heroSearchForm button:hover {
            background: linear-gradient(135deg, #4F46E5, #7C3AED);
        }


        /* ================= FILTER BAR ================= */

        .card.border-0.shadow-sm {
            background: linear-gradient(145deg, #ffffff, #f3f6ff);
            border-radius: 16px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
        }

        #sort {
            max-width: 220px;
            background: white;
            border-radius: 50px;
            font-size: 14px;
            padding: .6rem 1rem;
        }


        /* ================= PRODUCTS CONTAINER ================= */

        #productsContainer {
            background: linear-gradient(180deg, #f8f9ff 0%, #ffffff 100%);
            padding-top: 30px;
            border-radius: 20px;
        }


        /* ================= PRODUCT CARD ================= */

        .product-card {
            border: none;
            border-radius: 16px;
            overflow: hidden;
            background: white;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.06);
            transition: .35s;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.15);
        }

        .product-card img {
            height: 230px;
            object-fit: cover;
            transition: .4s;
        }

        .product-card:hover img {
            transform: scale(1.05);
        }

        .product-card .card-body {
            padding: 18px;
        }

        .product-card .card-title {
            font-weight: 600;
            font-size: 15px;
            margin-bottom: 6px;
        }

        .product-card .price {
            color: #6366F1;
            font-weight: 700;
            font-size: 18px;
        }

        .product-card .btn-outline-primary {
            border-radius: 30px;
            border: 1px solid #6366F1;
            color: #6366F1;
            font-weight: 500;
            padding: 5px 16px;
        }

        .product-card .btn-outline-primary:hover {
            background: #6366F1;
            color: white;
        }


        /* ================= PRODUCT HOVER EFFECT ================= */

        .product-card:hover .card-title {
            color: #4F46E5;
        }


        /* ================= PAGINATION ================= */

        .pagination {
            margin-top: 40px;
            justify-content: center;
        }

        .pagination .page-link {
            border: none;
            background: #f4f6ff;
            color: #6366F1;
            border-radius: 12px;
            margin: 0 4px;
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


        /* ================= SEARCH STATUS ================= */

        #searchStatus .alert {
            background: #f6f7ff;
            border: 1px solid #e3e6ff;
            color: #4F46E5;
        }


        /* ================= RESPONSIVE ================= */

        @media (max-width:768px) {

            .hero-section {
                padding: 40px 0;
            }

            .hero-section h1 {
                font-size: 28px;
            }

            #heroSearchForm input {
                font-size: 14px;
            }

            .product-card img {
                height: 200px;
                object-fit: contain;
                width: 100%;
            }

        }
    </style>
@endsection
