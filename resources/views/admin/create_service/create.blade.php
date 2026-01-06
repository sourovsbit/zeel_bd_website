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
    @lang('create_service.service')
    @endslot
    @slot('link_two_url')
    {{route('create_service.index')}}
    @endslot


    <!-- Active Link -->
    @slot('active_link')
    @lang('create_service.create_title')
    @endslot

    <!-- Page Title -->
    @slot('page_title')
    @lang('create_service.create_title')
    @endslot


    @if(Auth::user()->can('Service view'))
    <!-- button one -->
    @slot('button_one_name')
    @lang('common.view')
    @endslot

    @slot('button_one_route')
    {{route('create_service.index')}}
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

            <form method="post" action="{{route('create_service.store')}}" enctype="multipart/form-data">
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
                        <label>@lang('create_service.service_name')</label><span class="text-danger">*</span>
                        <input type="text" class="form-control form-control-sm @error('service_name') is-invalid @enderror" name="service_name" id="service_name"  value="{{ old('service_name') }}">
                        @error('service_name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-12 col-md-12 col-12 mt-2">
                        <label>@lang('create_service.description')</label>
                        <textarea type="text" class="form-control form-control-sm @error('description') is-invalid @enderror" name="description"  id="summernote1"></textarea>
                        @error('description')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label>@lang('common.meta_title')</label><span class="text-danger">*</span>
                        <input type="text" class="form-control form-control-sm @error('meta_title') is-invalid @enderror" name="meta_title" id="meta_title"  old="{{ old('meta_title') }}">
                        @error('meta_title')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label>@lang('common.meta_tag')</label><span class="text-danger">*</span>
                        <input type="text" class="form-control form-control-sm @error('meta_tag') is-invalid @enderror" name="meta_tag" id="meta_tag"  old="{{ old('meta_tag') }}">
                        @error('meta_tag')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-6 col-md-12 col-12 mt-4">
                        <label>@lang('common.meta_description')</label>
                        <textarea type="text" class="form-control form-control-sm @error('meta_description') is-invalid @enderror" name="meta_description"  rows="4"></textarea>
                        @error('meta_description')
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
