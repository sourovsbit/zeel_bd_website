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
    @lang('create_employee.create_employee')
    @endslot
    @slot('link_two_url')
    {{route('create_employee.index')}}
    @endslot


    <!-- Active Link -->
    @slot('active_link')
    @lang('create_employee.edit_title')
    @endslot

    <!-- Page Title -->
    @slot('page_title')
    @lang('create_employee.edit_title')
    @endslot

    @if(Auth::user()->can('Create Employee view'))
    <!-- button one -->
    @slot('button_one_name')
    @lang('common.view')
    @endslot

    @slot('button_one_route')
    {{route('create_employee.index')}}
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

            <form method="post" action="{{route('create_employee.update',$data['data']->id)}}" enctype="multipart/form-data">
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
                        <label>@lang('create_employee.name')</label><span class="text-danger">*</span>
                        <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" id="name"  value="{{ $data['data']->name }}">
                        @error('name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label>@lang('create_employee.designation')</label><span class="text-danger">*</span>
                        <input type="text" class="form-control form-control-sm @error('designation') is-invalid @enderror" name="designation" id="designation"  value="{{ $data['data']->designation }}">
                        @error('designation')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label>@lang('create_employee.phone')</label><span class="text-danger">*</span>
                        <input type="text" class="form-control form-control-sm @error('phone') is-invalid @enderror" name="phone" id="phone"  value="{{ $data['data']->phone }}">
                        @error('phone')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label>@lang('create_employee.facebook')</label><span class="text-danger">*</span>
                        <input type="text" class="form-control form-control-sm @error('facebook') is-invalid @enderror" name="facebook" id="facebook"  value="{{ $data['data']->facebook }}">
                        @error('facebook')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label>@lang('create_employee.instagram')</label><span class="text-danger">*</span>
                        <input type="text" class="form-control form-control-sm @error('instagram') is-invalid @enderror" name="instagram" id="instagram"  value="{{ $data['data']->instagram }}">
                        @error('instagram')
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
                            $pathImage = public_path().'/backend/Employee/EmployeeImage/'.$data['data']->image;
                        @endphp
                        @if(file_exists($pathImage))
                            <img src="{{ asset('backend/Employee/EmployeeImage') }}/{{ $data['data']->image }}" alt="" class="img-fluid" style="height: 70px;">
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
