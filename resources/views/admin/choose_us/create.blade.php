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
    @lang('choose_us.choose_us')
    @endslot
    @slot('link_two_url')
    {{route('choose_us.index')}}
    @endslot


    <!-- Active Link -->
    @slot('active_link')
    @lang('choose_us.create_title')
    @endslot

    <!-- Page Title -->
    @slot('page_title')
    @lang('choose_us.create_title')
    @endslot


    @if(Auth::user()->can('Why Choose Us view'))
    <!-- button one -->
    @slot('button_one_name')
    @lang('common.view')
    @endslot

    @slot('button_one_route')
    {{route('choose_us.index')}}
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

            <form method="post" action="{{route('choose_us.store')}}" enctype="multipart/form-data">
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
                        <label>@lang('choose_us.title')</label><span class="text-danger">*</span>
                        <input type="text" class="form-control form-control-sm @error('title') is-invalid @enderror" name="title" id="title"  value="{{ old('title') }}">
                        @error('title')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-6 col-md-12 col-12 mt-2">
                        <label>@lang('choose_us.details')</label>
                        <textarea type="text" class="form-control form-control-sm @error('details') is-invalid @enderror" name="details"  id="summernote"></textarea>
                        @error('details')
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

                </div>

                <div class="text-right mt-2" style="text-align: right;">
                    <button class="btn btn-sm btn-success"><i class="fa fa-save"></i> @lang('common.submit')</button>
                </div>

            </form>
        </div>
    </div>
@endsection
