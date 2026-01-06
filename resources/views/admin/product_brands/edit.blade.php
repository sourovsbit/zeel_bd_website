@extends('admin.layouts.master')
@section('body')
<div class="content">

    @component('components.breadcrumb')
    <!-- link 1 -->
    @slot('link_one')
    @lang('common.dashboard')
    @endslot
    @slot('link_one_url')
    {{route('admin.view')}}
    @endslot


    <!-- link 2 -->
    @slot('link_two')
    @lang('product_brands.brand')
    @endslot
    @slot('link_two_url')
    {{route('product_brands.index')}}
    @endslot


    <!-- Active Link -->
    @slot('active_link')
    @lang('product_brands.edit_title')
    @endslot

    <!-- Page Title -->
    @slot('page_title')
    @lang('product_brands.edit_title')
    @endslot

    @if(Auth::user()->can('Product Brand view'))
    <!-- button one -->
    @slot('button_one_name')
    @lang('common.view')
    @endslot

    @slot('button_one_route')
    {{route('product_brands.index')}}
    @endslot

    @slot('button_one_class')
    btn btn-sm btn-outline-primary
    @endslot

    @slot('button_one_icon')
    <i class="fa fa-eye"></i>
    @endslot

    @endif


    @endcomponent

    <div class="card">
        <div class="card-body">

            <form method="post" action="{{route('product_brands.update',$data['data']->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12 mt-2">
                        <label>@lang('common.sl')</label><span class="text-danger">*</span>
                        <input type="number" class="form-control form-control-sm @error('sl') is-invalid @enderror" name="sl" id="sl"  value="{{ $data['data']->sl }}">
                        @error('sl')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mt-2">
                        <label>@lang('product_brands.brand_name')</label><span class="text-danger">*</span>
                        <input type="text" class="form-control form-control-sm @error('brand_name') is-invalid @enderror" name="brand_name" id="brand_name"  value="{{ $data['data']->brand_name }}">
                        @error('brand_name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mt-2">
                        <label>@lang('product_brands.brand_name_bn')</label>
                        <input type="text" class="form-control form-control-sm @error('brand_name_bn') is-invalid @enderror" name="brand_name_bn" id="brand_name_bn"  value="{{ $data['data']->brand_name_bn }}">
                        @error('brand_name_bn')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 mt-2">
                        <label>@lang('common.image')</label>
                        <input type="file" class="form-control form-control-sm @error('image') is-invalid @enderror" name="image" id="image">
                        @error('image')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <br>
                        @php
                            $pathImage = public_path().'/backend/ProductBrands/ProductBrandsImage/'.$data['data']->image;
                        @endphp
                        @if(file_exists($pathImage))
                            <img src="{{ asset('backend/ProductBrands/ProductBrandsImage') }}/{{ $data['data']->image }}" alt="" class="img-fluid" style="height: 70px;">
                        @endif
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mt-2">
                        <label>@lang('common.banner')</label>
                        <input type="file" class="form-control form-control-sm @error('banner') is-invalid @enderror" name="banner" id="banner">
                        @error('banner')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <br>
                        @php
                            $pathBanner = public_path().'/backend/ProductBrands/ProductBrandsBanner/'.$data['data']->banner;
                        @endphp
                        @if(file_exists($pathBanner))
                            <img src="{{ asset('backend/ProductBrands/ProductBrandsBanner') }}/{{ $data['data']->banner }}" alt="" class="img-fluid" style="height: 70px;">
                        @endif
                    </div>

                </div>

                <div class="text-right mt-2" style="text-align: right;">
                    <button class="btn btn-sm btn-success"><i class="fa fa-save"></i> @lang('common.submit')</button>
                </div>

            </form>
        </div>
    </div>
@endsection
