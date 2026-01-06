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
    @lang('photo_gallery.edit_title')
    @endslot

    <!-- Page Title -->
    @slot('page_title')
    @lang('photo_gallery.edit_title')
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

            <form method="post" action="{{route('photo_gallery.update',$data['data']->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label>@lang('common.sl')</label><span class="text-danger">*</span>
                        <input type="number" class="form-control form-control-sm @error('sl') is-invalid @enderror" name="sl" id="sl"  value="{{ $data['data']->sl }}">
                        @error('sl')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label>@lang('photo_gallery.title')</label><span class="text-danger">*</span>
                        <input type="text" class="form-control form-control-sm @error('title') is-invalid @enderror" name="title" id="title"  value="{{ $data['data']->title }}">
                        @error('title')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label>@lang('photo_gallery.sub_title')</label><span class="text-danger">*</span>
                        <input type="text" class="form-control form-control-sm @error('sub_title') is-invalid @enderror" name="sub_title" id="sub_title"  value="{{ $data['data']->sub_title }}">
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
                        <br>
                        @php
                            $pathImage = public_path().'/backend/PhotoGallery/PhotoGalleryImage/'.$data['data']->image;
                        @endphp
                        @if(file_exists($pathImage))
                            <img src="{{ asset('backend/PhotoGallery/PhotoGalleryImage') }}/{{ $data['data']->image }}" alt="" class="img-fluid" style="height: 70px;">
                        @endif
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label>@lang('photo_gallery.slider')</label><span class="text-danger">*</span>
                        <div>
                            <label class="form-check">
                                {{-- Blade way (Laravel 9+). If not on Laravel 9+, use the PHP version below. --}}
                                <input class="form-check-input" type="checkbox" value="1"
                                    name="slider" id="slider"
                                    @checked(!empty($data['data']->slider))>

                                {{-- Or use plain PHP version instead if preferred or on Laravel <9 --}}
                                {{-- <input class="form-check-input" type="checkbox" value="1"
                                    <?php if (isset($data['data']->slider) && $data['data']->slider == 1) echo 'checked'; ?>
                                    name="slider" id="slider"> --}}
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
