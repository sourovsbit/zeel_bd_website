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
    @lang('product_item.item')
    @endslot
    @slot('link_two_url')
    {{route('product_item.index')}}
    @endslot


    <!-- Active Link -->
    @slot('active_link')
    @lang('product_item.edit_item')
    @endslot

    <!-- Page Title -->
    @slot('page_title')
    @lang('product_item.edit_title')
    @endslot


    @if(Auth::user()->can('Product Item view'))
    <!-- button one -->
    @slot('button_one_name')
    @lang('common.view')
    @endslot

    @slot('button_one_route')
    {{route('product_item.index')}}
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

            <form method="post" action="{{route('product_item.update',$data['data']->id)}}" enctype="multipart/form-data">
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
                        <label>@lang('product_item.item_name')</label><span class="text-danger">*</span>
                        <input type="text" class="form-control form-control-sm @error('item_name') is-invalid @enderror" name="item_name" id="item_name"  value="{{ $data['data']->item_name }}">
                        @error('item_name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mt-2">
                        <label>@lang('product_item.item_name_bn')</label>
                        <input type="text" class="form-control form-control-sm @error('item_name_bn') is-invalid @enderror" name="item_name_bn" id="item_name_bn"  value="{{ $data['data']->item_name_bn }}">
                        @error('item_name_bn')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label>@lang('common.image')</label>
                        <input type="file" class="form-control form-control-sm @error('image') is-invalid @enderror" name="image" id="image">
                        @error('image')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <br>
                        @php
                            $pathImage = public_path().'/backend/ProductItem/ProductItemImage/'.$data['data']->image;
                        @endphp
                        @if(file_exists($pathImage))
                            <img src="{{ asset('backend/ProductItem/ProductItemImage') }}/{{ $data['data']->image }}" alt="" class="img-fluid" style="height: 70px;">
                        @endif
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label>@lang('common.banner')</label>
                        <input type="file" class="form-control form-control-sm @error('banner') is-invalid @enderror" name="banner" id="banner">
                        @error('banner')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <br>
                        @php
                            $pathBanner = public_path().'/backend/ProductItem/ProductItemBanner/'.$data['data']->banner;
                        @endphp
                        @if(file_exists($pathBanner))
                            <img src="{{ asset('backend/ProductItem/ProductItemBanner') }}/{{ $data['data']->banner }}" alt="" class="img-fluid" style="height: 70px;">
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
