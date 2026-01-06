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
    @lang('vendor.vendor')
    @endslot
    @slot('link_two_url')
    {{route('vendor.index')}}
    @endslot


    <!-- Active Link -->
    @slot('active_link')
    @lang('vendor.create_title')
    @endslot

    <!-- Page Title -->
    @slot('page_title')
    @lang('vendor.create_title')
    @endslot


    @if(Auth::user()->can('Vendor view'))
    <!-- button one -->
    @slot('button_one_name')
    @lang('common.view')
    @endslot

    @slot('button_one_route')
    {{route('vendor.index')}}
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

            <form method="post" action="{{route('vendor.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12 mt-2">
                        <label>@lang('common.sl')</label><span class="text-danger">*</span>
                        <input type="text" class="form-control form-control-sm @error('sl') is-invalid @enderror" name="sl" id="sl"  value="{{ old('sl') }}">
                        @error('sl')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mt-2">
                        <label>@lang('vendor.select_country')</label><span class="text-danger">*</span>
                        <div class="showlabels">
                            <select class="form-select form-select-sm select2 @error('country_id') is-invalid @enderror" name="country_id" id="country_id">
                                <option value="">@lang('common.select_one')</option>
                                @if(isset($data['country']))
                                @foreach ($data['country'] as $country)
                                <option @if(old('country_id') == $country->id) selected @endif value="{{ $country->id }}">
                                    @if(config('app.locale') == 'en')
                                    {{ $country->country_name ?: $country->country_name_bn }}
                                    @else
                                    {{ $country->country_name_bn ?: $country->country_name }}
                                    @endif
                                </option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        @error('country_id')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mt-2">
                        <label>@lang('vendor.vendor_name')</label><span class="text-danger">*</span>
                        <input type="text" class="form-control form-control-sm @error('vendor_name') is-invalid @enderror" name="vendor_name" id="vendor_name"  value="{{ old('vendor_name') }}">
                        @error('vendor_name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mt-2">
                        <label>@lang('vendor.vendor_name_bn')</label>
                        <input type="text" class="form-control form-control-sm @error('vendor_name_bn') is-invalid @enderror" name="vendor_name_bn" id="vendor_name_bn"  value="{{ old('vendor_name_bn') }}">
                        @error('vendor_name_bn')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mt-2">
                        <label>@lang('vendor.vendor_phone')</label>
                        <input type="text" class="form-control form-control-sm @error('vendor_phone') is-invalid @enderror" name="vendor_phone" id="vendor_phone"  value="{{ old('vendor_phone') }}">
                        @error('vendor_phone')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mt-2">
                        <label>@lang('vendor.email')</label>
                        <input type="text" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" id="email"  value="{{ old('email') }}">
                        @error('email')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mt-2">
                        <label>@lang('vendor.nid')</label>
                        <input type="text" class="form-control form-control-sm @error('nid') is-invalid @enderror" name="nid" id="nid"  value="{{ old('nid') }}">
                        @error('nid')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mt-2">
                        <label>@lang('vendor.address')</label>
                        <textarea type="text" class="form-control form-control-sm summernote @error('address') is-invalid @enderror" name="address" id=""></textarea>                        @error('address')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mt-2">
                        <label>@lang('vendor.company_name')</label><span class="text-danger">*</span>
                        <input type="text" class="form-control form-control-sm @error('company_name') is-invalid @enderror" name="company_name" id="company_name"  value="{{ old('company_name') }}">
                        @error('company_name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mt-2">
                        <label>@lang('vendor.company_name_bn')</label>
                        <input type="text" class="form-control form-control-sm @error('company_name_bn') is-invalid @enderror" name="company_name_bn" id="company_name_bn"  value="{{ old('company_name_bn') }}">
                        @error('company_name_bn')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mt-2">
                        <label>@lang('vendor.company_phone')</label>
                        <input type="text" class="form-control form-control-sm @error('company_phone') is-invalid @enderror" name="company_phone" id="company_phone"  value="{{ old('company_phone') }}">
                        @error('company_phone')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mt-2">
                        <label>@lang('vendor.password')</label><span class="text-danger">*</span>
                        <input type="text" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" id="password"  value="{{ old('password') }}" maxlength="14">
                        @error('password')
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
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mt-2">
                        <label>@lang('common.banner')</label><span class="text-danger">*</span>
                        <input type="file" class="form-control form-control-sm @error('banner') is-invalid @enderror" name="banner" id="banner"  value="{{ old('banner') }}">
                        @error('banner')
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
