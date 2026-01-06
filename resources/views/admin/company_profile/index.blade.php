@extends('admin.layouts.master')
@section('body')
<div class="content">

    <!-- Bootstrap Tagsinput CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet">

    <style>
        .bootstrap-tagsinput {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid #ccc;
        border-radius: 0.25rem;
        }
        .bootstrap-tagsinput .tag {
        margin-right: 2px;
        color: white;
        background-color: #007bff;
        padding: 2px 6px;
        border-radius: 4px;
        }
    </style>

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
    @lang('company_profile.company_profile')
    @endslot
    @slot('link_two_url')
    {{route('company_profile.index')}}
    @endslot


    <!-- Active Link -->
    @slot('active_link')
    @lang('company_profile.company_profile')
    @endslot

    <!-- Page Title -->
    @slot('page_title')
    @lang('company_profile.company_profile')
    @endslot


    @endcomponent

    <div class="card">
        <div class="card-body">

            <form method="post" action="{{route('company_profile.update',$data['data']->id)}}" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12 mt-2">
                                <label>@lang('company_profile.logo')</label>
                                <input type="file" class="form-control form-control-sm @error('logo') is-invalid @enderror" name="logo" id="logo">
                                @error('logo')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <br>
                                @php
                                    $pathlogo = public_path().'/backend/CompanyProfile/CompanyProfileLogo/'.$data['data']->logo;
                                @endphp
                                @if(file_exists($pathlogo))
                                    <img src="{{ asset('backend/CompanyProfile/CompanyProfileLogo') }}/{{ $data['data']->logo }}" alt="" class="img-fluid" style="height: 70px;">
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 mt-2">
                                <label>@lang('company_profile.favicon')</label>
                                <input type="file" class="form-control form-control-sm @error('icon') is-invalid @enderror" name="icon" id="icon">
                                @error('icon')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <br>
                                @php
                                    $pathIcon = public_path().'/backend/CompanyProfile/CompanyProfileIcon/'.$data['data']->icon;
                                @endphp
                                @if(file_exists($pathIcon))
                                    <img src="{{ asset('backend/CompanyProfile/CompanyProfileIcon') }}/{{ $data['data']->icon }}" alt="" class="img-fluid" style="height: 70px;">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-12 mt-2">
                                <label>@lang('company_profile.company_name')</label><span class="text-danger">*</span>
                                <input type="text" class="form-control form-control-sm @error('company_name') is-invalid @enderror" name="company_name" id="company_name"  value="{{ $data['data']->company_name }}">
                                @error('company_name')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-3 col-md-6 col-12 mt-2">
                                <label>@lang('company_profile.pinterest')</label><span class="text-danger">*</span>
                                <input type="text" class="form-control form-control-sm @error('pinterest') is-invalid @enderror" name="pinterest" id="pinterest"  value="{{ $data['data']->pinterest }}">
                                @error('pinterest')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-3 col-md-6 col-12 mt-2">
                                <label>@lang('company_profile.email')</label><span class="text-danger">*</span>
                                <input type="text" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" id="email"  value="{{ $data['data']->email }}">
                                @error('email')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-3 col-md-6 col-12 mt-2">
                                <label>@lang('company_profile.phone')</label><span class="text-danger">*</span>
                                <input type="text" class="form-control form-control-sm @error('phone') is-invalid @enderror" name="phone" id="phone"  value="{{ $data['data']->phone }}">
                                @error('phone')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-3 col-md-6 col-12 mt-2">
                                <label>@lang('company_profile.sales_phone')</label><span class="text-danger">*</span>
                                <input type="text" class="form-control form-control-sm @error('sales_phone') is-invalid @enderror" name="sales_phone" id="sales_phone"  value="{{ $data['data']->sales_phone }}">
                                @error('sales_phone')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-3 col-md-6 col-12 mt-2">
                                <label>@lang('company_profile.facebook')</label><span class="text-danger">*</span>
                                <input type="text" class="form-control form-control-sm @error('facebook') is-invalid @enderror" name="facebook" id="facebook"  value="{{ $data['data']->facebook }}">
                                @error('facebook')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-3 col-md-6 col-12 mt-2">
                                <label>@lang('company_profile.instagram')</label><span class="text-danger">*</span>
                                <input type="text" class="form-control form-control-sm @error('instagram') is-invalid @enderror" name="instagram" id="instagram"  value="{{ $data['data']->instagram }}">
                                @error('instagram')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-3 col-md-6 col-12 mt-2">
                                <label>@lang('company_profile.youtube')</label><span class="text-danger">*</span>
                                <input type="text" class="form-control form-control-sm @error('youtube') is-invalid @enderror" name="youtube" id="youtube"  value="{{ $data['data']->youtube }}">
                                @error('youtube')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-3 col-md-6 col-12 mt-2">
                                <label>@lang('company_profile.twiter')</label><span class="text-danger">*</span>
                                <input type="text" class="form-control form-control-sm @error('twiter') is-invalid @enderror" name="twiter" id="twiter"  value="{{ $data['data']->twiter }}">
                                @error('twiter')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-3 col-md-6 col-12 mt-2">
                                <label>@lang('company_profile.linkedin')</label><span class="text-danger">*</span>
                                <input type="text" class="form-control form-control-sm @error('linkedin') is-invalid @enderror" name="linkedin" id="linkedin"  value="{{ $data['data']->linkedin }}">
                                @error('linkedin')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-3 col-md-6 col-12 mt-2">
                                <label>@lang('company_profile.tikTok')</label><span class="text-danger">*</span>
                                <input type="text" class="form-control form-control-sm @error('tikTok') is-invalid @enderror" name="tikTok" id="tikTok"  value="{{ $data['data']->tikTok }}">
                                @error('tikTok')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-12 col-12 mt-4">
                                <label>@lang('company_profile.address')</label>
                                <textarea type="text" class="form-control form-control-sm @error('address') is-invalid @enderror" name="address"  id="summernote">{!! $data['data']->address !!}</textarea>
                                @error('address')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-12 col-12 mt-4">
                                <label>@lang('company_profile.map')</label>
                                <textarea type="text" class="form-control form-control-sm @error('map') is-invalid @enderror" name="map"  id="summernote1">{!! $data['data']->map !!}</textarea>
                                @error('map')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 mt-2">
                                <label>@lang('common.meta_title')</label><span class="text-danger">*</span>
                                <input type="text" class="form-control form-control-sm @error('meta_title') is-invalid @enderror" name="meta_title" id="meta_title"  value="{{ $data['data']->meta_title }}">
                                @error('meta_title')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 mt-2">
                                <label>@lang('common.meta_tag')</label><span class="text-danger">*</span>
                                <input type="text" class="form-control form-control-sm @error('meta_tag') is-invalid @enderror" name="meta_tag" id="meta_tag"  value="{{ $data['data']->meta_tag }}">
                                @error('meta_tag')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-12 col-12 mt-4">
                                <label>@lang('common.meta_description')</label>
                                <textarea type="text" class="form-control form-control-sm @error('meta_description') is-invalid @enderror" name="meta_description"  rows="4">{!! $data['data']->meta_description !!}</textarea>
                                @error('meta_description')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-right mt-2" style="text-align: right;">
                    <button class="btn btn-sm btn-success"><i class="fa fa-save"></i> @lang('common.submit')</button>
                </div>

            </form>
        </div>
    </div>

    <!-- Bootstrap Tagsinput JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

@endsection
