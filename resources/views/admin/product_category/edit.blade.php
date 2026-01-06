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
    @lang('product_category.category')
    @endslot
    @slot('link_two_url')
    {{route('product_category.index')}}
    @endslot


    <!-- Active Link -->
    @slot('active_link')
    @lang('product_category.create_title')
    @endslot

    <!-- Page Title -->
    @slot('page_title')
    @lang('product_category.create_title')
    @endslot


    @if(Auth::user()->can('Product Category view'))
    <!-- button one -->
    @slot('button_one_name')
    @lang('common.view')
    @endslot

    @slot('button_one_route')
    {{route('product_category.index')}}
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

            <form method="post" action="{{route('product_category.update',$data['data']->id)}}" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12 mt-2">
                        <label>@lang('common.sl')</label><span class="text-danger">*</span>
                        <input type="text" class="form-control form-control-sm @error('sl') is-invalid @enderror" name="sl" id="sl"  value="{{ $data['data']->sl }}">
                        @error('sl')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mt-2">
                        <label>@lang('product_category.select_item')</label><span class="text-danger">*</span>
                        <div class="showlabels">
                            <select class="form-select form-select-sm select2 @error('item_id') is-invalid @enderror" name="item_id" id="item_id">
                                <option value="">@lang('common.select_one')</option>
                                @if(isset($data['item']))
                                @foreach ($data['item'] as $item)
                                <option @if($data['data']->item_id == $item->id) selected @endif value="{{ $item->id }}">
                                    @if(config('app.locale') == 'en')
                                    {{ $item->item_name ?: $item->item_name_bn }}
                                    @else
                                    {{ $item->item_name_bn ?: $item->item_name }}
                                    @endif
                                </option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        @error('item_id')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mt-2">
                        <label>@lang('product_category.category_name')</label><span class="text-danger">*</span>
                        <input type="text" class="form-control form-control-sm @error('category_name') is-invalid @enderror" name="category_name" id="category_name"  value="{{ $data['data']->category_name }}">
                        @error('category_name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mt-2">
                        <label>@lang('product_category.category_name_bn')</label>
                        <input type="text" class="form-control form-control-sm @error('category_name_bn') is-invalid @enderror" name="category_name_bn" id="category_name_bn"  value="{{ $data['data']->category_name_bn }}">
                        @error('category_name_bn')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 mt-2">
                        <label>@lang('common.image')</label><span class="text-danger">*</span>
                        <input type="file" class="form-control form-control-sm @error('image') is-invalid @enderror" name="image" id="image"  value="{{ old('image') }}">
                        @error('image')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <br>
                        @php
                            $pathImage = public_path().'/backend/ProductCategory/ProductCategoryImage/'.$data['data']->image;
                        @endphp
                        @if(file_exists($pathImage))
                            <img src="{{ asset('backend') }}/ProductCategory/ProductCategoryImage/{{ $data['data']->image }}" alt="" class="img-fluid" style="height: 80px;">
                        @endif
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mt-2">
                        <label>@lang('common.banner')</label><span class="text-danger">*</span>
                        <input type="file" class="form-control form-control-sm @error('banner') is-invalid @enderror" name="banner" id="banner"  value="{{ old('banner') }}">
                        @error('banner')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <br>
                        @php
                            $pathBanner = public_path().'/backend/ProductCategory/ProductCategoryBanner/'.$data['data']->banner;
                        @endphp
                        @if(file_exists($pathBanner))
                            <img src="{{ asset('backend') }}/ProductCategory/ProductCategoryBanner/{{ $data['data']->banner }}" alt="" class="img-fluid" style="height: 80px;">
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
