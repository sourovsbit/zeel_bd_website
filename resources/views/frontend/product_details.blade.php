@extends('frontend.layouts.master')

@section('content')
    <!-- Navbar Start -->

        @include('frontend.layouts.navbar')

    <!-- Navbar End -->
    
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url({{ asset('') }}frontend/img/carousel-bg-1.jpg);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Product Name</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Product Details</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <style>
        .card-custom {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .car-image {
            width: 100%;
            height: auto;
            border-radius: 10px 10px 0 0;
        }
        .btn-custom {
            background-color: #ff4d4d;
            color: white;
            border: none;
            padding: 10px 15px;
            font-weight: bold;
            border-radius: 5px;
        }
        .btn-custom:hover {
            background-color: #e60000;
        }
        .small-btn {
            background-color: #444;
            color: white;
            padding: 5px 8px;
            font-size: 14px;
            border-radius: 5px;
            display: inline-block;
        }
        .price {
            font-size: 1.5rem;
            color: #000;
        }
        .icon-btn {
            border: none;
            background: none;
            font-size: 20px;
            color: #666;
            cursor: pointer;
        }
        .icon-btn:hover {
            color: black;
        }
        .specs-container {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            background-color: #fff;
        }
        .spec-heading {
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .spec-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }
        .spec-item:last-child {
            border-bottom: none;
        }
        .check-icon {
            color: green;
            font-weight: bold;
        }

        img{
            width: 100%;
            display: block;
        }
        .img-display{
            overflow: hidden;
        }
        .img-showcase{
            display: flex;
            width: 100%;
            transition: all 0.5s ease;
        }
        .img-showcase img{
            min-width: 100%;
        }
        .img-select{
            display: flex;
        }
        .img-item{
            margin: 0.3rem;
        }
        .img-item:nth-child(1),
        .img-item:nth-child(2),
        .img-item:nth-child(3){
            margin-right: 0;
        }
        .img-item:hover{
            opacity: 0.8;
        }
    </style>

    
    <div class="container mt-4">
        <div class="card card-custom p-3">
            <div class="row">
                <!-- Car Image Section -->
                <div class="col-md-5 position-relative">
                    <div class="product-imgs">
                        <div class="img-display">
                            <div class="img-showcase">
                                <img src="https://stimg.cardekho.com/images/carexteriorimages/630x420/Mahindra/XEV-9e/9262/1738383515682/exterior-image-166.jpg?tr=w-664" alt = "shoe image">
                                <img src="https://stimg.cardekho.com/images/carexteriorimages/630x420/Mahindra-XEV/9e/9262/1732688872801/front-left-side-47.jpg?tr=w-664" alt = "shoe image">
                                <img src="https://stimg.cardekho.com/images/carexteriorimages/630x420/Mahindra-XEV/9e/9262/1732688872801/side-view-(left)-90.jpg?tr=w-664" alt = "shoe image">
                                <img src="https://stimg.cardekho.com/images/carexteriorimages/630x420/Mahindra-XEV/9e/9262/1732688872801/grille-97.jpg?tr=w-664" alt = "shoe image">
                            </div>
                        </div>
                        <div class="img-select">
                            <div class="img-item">
                                <a href="#" data-id="1">
                                    <img src="https://stimg.cardekho.com/images/carexteriorimages/630x420/Mahindra/XEV-9e/9262/1738383515682/exterior-image-166.jpg?tr=w-664" alt = "shoe image">
                                </a>
                            </div>
                            <div class="img-item">
                                <a href="#" data-id="2">
                                    <img src = "https://stimg.cardekho.com/images/carexteriorimages/630x420/Mahindra-XEV/9e/9262/1732688872801/front-left-side-47.jpg?tr=w-664" alt = "shoe image">
                                </a>
                            </div>
                            <div class="img-item">
                                <a href="#" data-id="3">
                                    <img src="https://stimg.cardekho.com/images/carexteriorimages/630x420/Mahindra-XEV/9e/9262/1732688872801/side-view-(left)-90.jpg?tr=w-664" alt = "shoe image">
                                </a>
                            </div>
                            <div class="img-item">
                                <a href="#" data-id="4">
                                    <img src="https://stimg.cardekho.com/images/carexteriorimages/630x420/Mahindra-XEV/9e/9262/1732688872801/grille-97.jpg?tr=w-664" alt = "shoe image">
                                </a>
                            </div>
                        </div>
                    </div>
                    {{--<div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="w-100" src="{{ asset('') }}frontend/img/carousel-bg-1.jpg" alt="Image">
                            </div>
                            <div class="carousel-item">
                                <img class="w-100" src="{{ asset('') }}frontend/img/carousel-bg-2.jpg" alt="Image">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>--}}
                </div>
                <!-- Car Details Section -->
                <div class="col-md-7">
                    <div class="d-flex justify-content-between align-items-start">
                        <h2>Mahindra XEV 9e</h2>
                        <div>
                            <button class="icon-btn"><i class="bi bi-heart"></i></button>
                            <button class="icon-btn"><i class="bi bi-share"></i></button>
                        </div>
                    </div>
                    <p>VIEW: 298</p>
                    <p>The Mahindra XEV 9e is an SUV coupe and one of the newest and most advanced EVs from Mahindra. It comes packed with features, including a 3-screen setup on the dashboard, 16 speakers, and an augmented reality (AR)-based heads-up display. It has two battery pack options, both of which have a claimed range of more than 500 km.</p>
                    <p class="price">৳ 21.90 - 30.50 Lakh*</p>
                    <p class="text-muted">Estimated Price in Bangladesh</p>
                    <p><strong>+ 4 Colours</strong></p>
                    <button class="btn btn-custom">For Booking - 01800000000</button>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="specs-container">
                    <!-- Key Specifications -->
                    <h4 class="spec-heading">Key specifications of Mahindra XEV 9e</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="spec-item"><span>Charging Time</span><span>8 / 11.7 h (11.2 kW / 7.2 kW Charger)</span></div>
                            <div class="spec-item"><span>Max Power</span><span>282 bhp</span></div>
                            <div class="spec-item"><span>Seating Capacity</span><span>5</span></div>
                            <div class="spec-item"><span>Boot Space</span><span>663 Litres</span></div>
                            <div class="spec-item"><span>Ground Clearance Unladen</span><span>207 mm</span></div>
                        </div>
                        <div class="col-md-6">
                            <div class="spec-item"><span>Battery Capacity</span><span>79 kWh</span></div>
                            <div class="spec-item"><span>Max Torque</span><span>380 Nm</span></div>
                            <div class="spec-item"><span>Range</span><span>656 km</span></div>
                            <div class="spec-item"><span>Body Type</span><span>SUV</span></div>
                        </div>
                    </div>
                </div>
                <div class="specs-container mt-4">
                    <!-- Key Features -->
                    <h4 class="spec-heading">Key features of Mahindra XEV 9e</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="spec-item"><span>Power Steering</span><span class="check-icon">&#10004;</span></div>
                            <div class="spec-item"><span>Air Conditioner</span><span class="check-icon">&#10004;</span></div>
                            <div class="spec-item"><span>Passenger Airbag</span><span class="check-icon">&#10004;</span></div>
                            <div class="spec-item"><span>Alloy Wheels</span><span class="check-icon">&#10004;</span></div>
                            <div class="spec-item"><span>Engine Start Stop Button</span><span class="check-icon">&#10004;</span></div>
                        </div>
                        <div class="col-md-6">
                            <div class="spec-item"><span>Anti-lock Braking System (ABS)</span><span class="check-icon">&#10004;</span></div>
                            <div class="spec-item"><span>Driver Airbag</span><span class="check-icon">&#10004;</span></div>
                            <div class="spec-item"><span>Automatic Climate Control</span><span class="check-icon">&#10004;</span></div>
                            <div class="spec-item"><span>Multi-function Steering Wheel</span><span class="check-icon">&#10004;</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const imgs = document.querySelectorAll('.img-select a');
            const imgBtns = [...imgs];
            let imgId = 1;

            imgBtns.forEach((imgItem) => {
                imgItem.addEventListener('click', (event) => {
                    event.preventDefault();
                    imgId = imgItem.dataset.id;
                    slideImage();
                });
            });

            function slideImage(){
                const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

                document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
            }

            window.addEventListener('resize', slideImage);
    </script>

    <!-- Main Content End -->
@endsection