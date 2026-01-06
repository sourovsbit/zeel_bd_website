@extends('frontend.layouts.master')

@extends('frontend.layouts.meta')

@section('content')
    <!-- Navbar Start -->

        @include('frontend.layouts.navbar')

    <!-- Navbar End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Our Product</a>
                        <span>{{$categories->category_name}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 order-1 order-lg-2">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <div class="select-option">
                                    <select class="sorting">
                                        <option value="">Default Sorting</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-list">
                        <div class="row">
                            @if($total_products > 0)
                            @foreach($products as $d)

                            @php
                            $productImage = DB::table('product_images')->where('product_id',$d->product_id)->first();
                            @endphp
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img src="{{asset('/backend/Product/ProductImage')}}/{{$productImage->image}}" alt="">
                                        <ul>
                                            <li class="w-icon active"><a href="{{url('sell_page')}}/{{$d->id}}"><i class="icon_bag_alt"></i></a></li>
                                            <li class="quick-view"><a href="{{url('sell_page')}}/{{$d->id}}">+ Quick View</a></li>
                                            <li class="w-icon"><a href="{{url('sell_page')}}/{{$d->id}}"><i class="fa fa-random"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name">{{ $d->category->category_name }}</div>
                                        <a href="{{url('sell_page')}}/{{$d->id}}"><h5>{{ $d->product_name }}</h5></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

    <!-- Main Content End -->
@endsection
