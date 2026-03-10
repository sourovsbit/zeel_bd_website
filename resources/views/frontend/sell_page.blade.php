@extends('frontend.layouts.master')
@extends('frontend.layouts.meta')

@section('content')

    @include('frontend.layouts.navbar')

    @if (!$product)
        <div class="container py-5 text-center">
            <h3>No Product Found</h3>
        </div>
    @else
        @php
            $image = !empty($product['product_images'][0]['path'])
                ? 'https://inventory.geelbd.com/storage/app/public' . $product['product_images'][0]['path']
                : 'https://via.placeholder.com/500x500?text=No+Image';

            $price = $product['product_detail']['sale_price'] ?? 0;
            $regular = $product['product_detail']['regular_price'] ?? 0;
            $whatsappNumber = $product['shop']['phone'] ?? null;
            $whatsappLink = $whatsappNumber ? 'https://wa.me/' . preg_replace('/[^0-9]/', '', $whatsappNumber) : null;
            $stock = $product['stock'][0]['quantity'] ?? 0;
        @endphp

        <!-- Breadcrumb Section Begin -->
        <div class="breacrumb-section main-content mt-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text">
                            <a href="#"><i class="fa fa-home"></i> Home</a>
                            <span>{{ $product['name'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section Begin -->

        <!-- Product Details -->
        <section class="product-details py-5">
            <div class="container">
                <div class="row g-5">
                    <!-- Image Gallery -->
                    <div class="col-lg-6">
                        <div class="product-gallery">

                            <!-- MAIN SLIDER -->
                            <div class="main-slider" id="mainSlider">

                                <button class="main-btn prev"><i class="fa fa-angle-left"></i></button>
                                <button class="main-btn next"><i class="fa fa-angle-right"></i></button>

                                <div class="main-track" id="mainTrack">

                                    @foreach ($product['product_images'] as $img)
                                        <div class="main-slide">
                                            <img src="https://inventory.geelbd.com/storage/app/public{{ $img['path'] }}"
                                                class="main-img">
                                        </div>
                                    @endforeach

                                </div>

                                <div class="zoom-lens" id="zoomLens"></div>

                            </div>

                            <!-- THUMBNAILS -->
                            <div class="thumb-wrapper">

                                <div class="thumbnails" id="thumbContainer">
                                    @foreach ($product['product_images'] as $key => $img)
                                        <img src="https://inventory.geelbd.com/storage/app/public{{ $img['path'] }}"
                                            class="thumb-img {{ $key == 0 ? 'active' : '' }}"
                                            data-index="{{ $key }}">
                                    @endforeach
                                </div>

                            </div>

                        </div>
                    </div>

                    <!-- LIGHTBOX -->
                    <div class="lightbox" id="lightbox">
                        <span class="close-lightbox">&times;</span>
                        <img id="lightboxImage">
                    </div>

                    <!-- Product Info -->
                    <div class="col-lg-6">
                        <div class="product-info">
                            <h5 class="display-6 fw-bold mb-3">{{ $product['name'] }}</h5>

                            {{-- <div class="d-flex align-items-center gap-3 mb-3">
                                <span class="badge bg-primary px-3 py-2">Product</span>
                                @if ($stock > 0)
                                    <span class="text-success"><i class="fas fa-check-circle"></i> In Stock
                                        ({{ $stock }})</span>
                                @else
                                    <span class="text-danger"><i class="fas fa-times-circle"></i> Out of Stock</span>
                                @endif
                            </div> --}}

                            <div class="pricing mb-4">
                                @if ($regular > $price)
                                    <span class="h2 text-danger fw-bold">৳{{ number_format($price) }}</span>

                                    <span class="h5 text-muted ms-2" style="text-decoration: line-through;">
                                        ৳{{ number_format($regular) }}
                                    </span>

                                    <span class="badge bg-warning text-dark ms-2">
                                        Save ৳{{ number_format($regular - $price) }}
                                    </span>
                                @else
                                    <span class="h2 text-primary fw-bold">
                                        ৳{{ number_format($price) }}
                                    </span>
                                @endif
                            </div>

                            <div class="meta mb-4">
                                <p class="mb-1"><strong>SKU:</strong> {{ $product['product_detail']['sku'] ?? '' }}</p>
                                {{-- <p class="mb-1"><strong>Country of Origin:</strong>
                                    {{ $product['product_detail']['country'] ?? 'N/A' }}</p> --}}
                                <p class="mb-1"><strong>Brand:</strong> {{ $product['brand']['name'] ?? 'N/A' }}</p>
                                <p class="mb-1"><strong>Category:</strong> {{ $product['category']['name'] ?? 'N/A' }}</p>
                                <p>
                                    {!! $product['product_detail']['key_features'] ?? 'No key features available.' !!}
                                </p>
                            </div>

                            <!-- WhatsApp Button -->
                            @if ($whatsappLink)
                                <a href="{{ $whatsappLink }}" target="_blank" class="btn btn-success btn-md rounded-pill">
                                    <i class="fa fa-whatsapp"></i> Order via WhatsApp
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Tabs Section (Description, Specification, Key Features) -->
                <div class="row mt-5">
                    <div class="col-12">

                        <!-- Tabs -->
                        <ul class="custom-tabs">
                            <li class="tab-btn active" data-tab="desc">
                                <i class="fa fa-align-left"></i> Description
                            </li>
                            <li class="tab-btn" data-tab="spec">
                                <i class="fa fa-cog"></i> Specification
                            </li>
                            <li class="tab-btn" data-tab="feature">
                                <i class="fa fa-star"></i> Key Features
                            </li>
                        </ul>

                        <!-- Tab Content -->
                        <div class="tab-content-box">

                            <div class="tab-pane active" id="desc">
                                {!! $product['product_detail']['description'] ?? 'No description available.' !!}
                            </div>

                            <div class="tab-pane" id="spec">
                                {!! $product['product_detail']['specification'] ?? 'No specification available.' !!}
                            </div>

                            <div class="tab-pane" id="feature">
                                {!! $product['product_detail']['key_features'] ?? 'No key features available.' !!}
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Thumbnail Change Script -->
    <script>
        let current = 0;
        const track = document.getElementById("mainTrack");
        const slides = document.querySelectorAll(".main-slide");
        const thumbs = document.querySelectorAll(".thumb-img");

        /* SLIDE UPDATE */

        function updateSlide() {

            track.style.transform = "translateX(-" + (current * 100) + "%)";

            thumbs.forEach(t => t.classList.remove("active"));
            thumbs[current].classList.add("active");

        }

        /* AUTO SLIDE */

        setInterval(() => {
            current++;
            if (current >= slides.length) current = 0;
            updateSlide();
        }, 4000);

        /* BUTTONS */

        document.querySelector(".next").onclick = () => {
            current++;
            if (current >= slides.length) current = 0;
            updateSlide();
        };

        document.querySelector(".prev").onclick = () => {
            current--;
            if (current < 0) current = slides.length - 1;
            updateSlide();
        };

        /* THUMB CLICK */

        thumbs.forEach(t => {
            t.onclick = () => {
                current = parseInt(t.dataset.index);
                updateSlide();
            }
        });

        /* SWIPE SUPPORT */

        let startX = 0;

        document.getElementById("mainSlider").addEventListener("touchstart", e => {
            startX = e.touches[0].clientX;
        });

        document.getElementById("mainSlider").addEventListener("touchend", e => {
            let endX = e.changedTouches[0].clientX;

            if (startX - endX > 50) {
                current++;
                if (current >= slides.length) current = 0;
                updateSlide();
            }

            if (endX - startX > 50) {
                current--;
                if (current < 0) current = slides.length - 1;
                updateSlide();
            }

        });

        /* LIGHTBOX */

        const lightbox = document.getElementById("lightbox");
        const lightboxImage = document.getElementById("lightboxImage");

        slides.forEach(s => {
            s.onclick = () => {
                lightbox.style.display = "flex";
                lightboxImage.src = s.querySelector("img").src;
            }
        });

        document.querySelector(".close-lightbox").onclick = () => {
            lightbox.style.display = "none";
        };

        /* ZOOM LENS */

        const slider = document.getElementById("mainSlider");
        const lens = document.getElementById("zoomLens");

        slider.addEventListener("mousemove", e => {

            lens.style.display = "block";

            let rect = slider.getBoundingClientRect();

            lens.style.left = (e.clientX - rect.left - 60) + "px";
            lens.style.top = (e.clientY - rect.top - 60) + "px";

        });

        slider.addEventListener("mouseleave", () => {
            lens.style.display = "none";
        });
    </script>
    <script>
        document.querySelectorAll(".tab-btn").forEach(btn => {

            btn.addEventListener("click", function() {

                document.querySelectorAll(".tab-btn").forEach(b => b.classList.remove("active"));
                document.querySelectorAll(".tab-pane").forEach(p => p.classList.remove("active"));

                this.classList.add("active");

                let tabID = this.getAttribute("data-tab");
                document.getElementById(tabID).classList.add("active");

            });

        });
    </script>

    <!-- Custom Styles -->
    <style>
        .breadcrumb-section {
            border-bottom: 1px solid #e9ecef;
        }

        .product-gallery {
            background: linear-gradient(145deg, #ffffff, #f3f4f6);
            padding: 25px;
            border-radius: 18px;
            box-shadow: 0 25px 60px rgba(0, 0, 0, .08);
        }

        /* MAIN SLIDER */

        .main-slider {
            position: relative;
            overflow: hidden;
            border-radius: 14px;
            cursor: zoom-in;
        }

        .main-track {
            display: flex;
            transition: transform .5s ease;
        }

        .main-slide {
            min-width: 100%;
        }

        .main-img {
            width: 100%;
            height: 440px;
            object-fit: cover;
            border-radius: 14px;
        }

        /* GRADIENT BUTTONS */

        .main-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 44px;
            height: 44px;
            border: none;
            border-radius: 50%;
            color: #fff;
            font-size: 20px;
            background: linear-gradient(135deg, #4F46E5, #7C3AED);
            box-shadow: 0 10px 25px rgba(0, 0, 0, .2);
            cursor: pointer;
            z-index: 5;
        }

        .main-btn.prev {
            left: 10px
        }

        .main-btn.next {
            right: 10px
        }

        /* THUMBNAILS */

        .thumb-wrapper {
            margin-top: 18px
        }

        .thumbnails {
            display: flex;
            gap: 12px;
            overflow: auto;
            scroll-behavior: smooth;
        }

        .thumb-img {
            width: 85px;
            height: 85px;
            border-radius: 10px;
            object-fit: cover;
            cursor: pointer;
            border: 2px solid transparent;
            transition: .3s;
        }

        .thumb-img:hover {
            transform: scale(1.08)
        }

        .thumb-img.active {
            border: 2px solid #7C3AED;
            box-shadow: 0 5px 16px rgba(124, 58, 237, .4);
        }

        /* ZOOM LENS */

        .zoom-lens {
            position: absolute;
            width: 120px;
            height: 120px;
            border: 2px solid #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, .4);
            display: none;
            pointer-events: none;
        }

        /* LIGHTBOX */

        .lightbox {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, .9);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

        .lightbox img {
            max-width: 90%;
            max-height: 90%;
        }

        .close-lightbox {
            position: absolute;
            top: 20px;
            right: 30px;
            color: #fff;
            font-size: 40px;
            cursor: pointer;
        }

        .btn-success {
            background-color: #25D366;
            border-color: #25D366;
        }

        .btn-success:hover {
            background-color: #128C7E;
            border-color: #128C7E;
        }

        .custom-tabs {
            display: flex;
            border-bottom: 1px solid #ddd;
            padding: 0;
            margin: 0;
        }

        .custom-tabs li {
            list-style: none;
            padding: 12px 20px;
            cursor: pointer;
            border: 1px solid transparent;
        }

        .custom-tabs li.active {
            background: linear-gradient(135deg, #0F172A 0%, #1E293B 100%);
            border-bottom: 1px solid #fff;
            font-weight: 600;
            color: #fff;
            border: 2px solid;
            border-image: linear-gradient(135deg, #4F46E5, #7C3AED) 1;
        }

        .tab-content-box {
            border: 1px solid #ddd;
            border-top: none;
            padding: 20px;
            background: #fff;
        }

        .tab-pane {
            display: none;
        }

        .tab-pane.active {
            display: block;
        }
    </style>

@endsection
