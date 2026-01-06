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
    @lang('photo_gallery.photo_gallery')
    @endslot
    @slot('link_two_url')
    {{route('photo_gallery.index')}}
    @endslot


    <!-- Active Link -->
    @slot('active_link')
    @lang('photo_gallery.create_title')
    @endslot

    <!-- Page Title -->
    @slot('page_title')
    @lang('photo_gallery.create_title')
    @endslot


    @if(Auth::user()->can('Photo Gallery view'))
    <!-- button one -->
    @slot('button_one_name')
    @lang('common.view')
    @endslot

    @slot('button_one_route')
    {{route('photo_gallery.index')}}
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

            <form method="post" action="{{route('photo_gallery.store')}}" enctype="multipart/form-data">
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
                        <label>@lang('photo_gallery.title')</label><span class="text-danger">*</span>
                        <input type="text" class="form-control form-control-sm @error('title') is-invalid @enderror" name="title" id="title"  value="{{ old('title') }}">
                        @error('title')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label>@lang('photo_gallery.sub_title')</label><span class="text-danger">*</span>
                        <input type="text" class="form-control form-control-sm @error('sub_title') is-invalid @enderror" name="sub_title" id="sub_title"  value="{{ old('sub_title') }}">
                        @error('sub_title')
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
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label>@lang('photo_gallery.slider')</label><span class="text-danger">*</span>
                        <div>
                            <label class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="slider">
                            </label>
                        </div>
                        @error('slider')
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
