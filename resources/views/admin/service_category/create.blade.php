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
    @lang('service_category.service_category')
    @endslot
    @slot('link_two_url')
    {{route('service_category.index')}}
    @endslot


    <!-- Active Link -->
    @slot('active_link')
    @lang('service_category.create_title')
    @endslot

    <!-- Page Title -->
    @slot('page_title')
    @lang('service_category.create_title')
    @endslot


    @if(Auth::user()->can('Service Category view'))
    <!-- button one -->
    @slot('button_one_name')
    @lang('common.view')
    @endslot

    @slot('button_one_route')
    {{route('service_category.index')}}
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

            <form method="post" action="{{route('service_category.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label>@lang('common.sl')</label><span class="text-danger">*</span>
                        <input type="number" class="form-control form-control-sm @error('sl') is-invalid @enderror" name="sl" id="sl"  value="{{ old('sl') }}">
                        @error('sl')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label>@lang('service_category.category_name')</label><span class="text-danger">*</span>
                        <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="category_name" id="category_name"  value="{{ old('category_name') }}">
                        @error('category_name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-6 col-md-12 col-12 mt-2">
                        <label>@lang('service_category.short_details')</label>
                        <textarea type="text" class="form-control form-control-sm @error('short_details') is-invalid @enderror" name="short_details"  id="summernote"></textarea>
                        @error('short_details')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-lg-6 col-md-12 col-12 mt-2">
                        <label>@lang('service_category.map')</label>
                        <textarea type="text" class="form-control form-control-sm @error('map') is-invalid @enderror" name="map"  id="summernote1"></textarea>
                        @error('map')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                </div>

                <div class="text-right mt-2" style="text-align: right;">
                    <button class="btn btn-sm btn-success"><i class="fa fa-save"></i> @lang('common.submit')</button>
                </div>

            </form>
        </div>
    </div>
@endsection
