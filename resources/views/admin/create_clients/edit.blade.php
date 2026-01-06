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
    @lang('create_clients.create_clients')
    @endslot
    @slot('link_two_url')
    {{route('create_clients.index')}}
    @endslot


    <!-- Active Link -->
    @slot('active_link')
    @lang('create_clients.edit_title')
    @endslot

    <!-- Page Title -->
    @slot('page_title')
    @lang('create_clients.edit_title')
    @endslot

    @if(Auth::user()->can('Create Clients view'))
    <!-- button one -->
    @slot('button_one_name')
    @lang('common.view')
    @endslot

    @slot('button_one_route')
    {{route('create_clients.index')}}
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

            <form method="post" action="{{route('create_clients.update',$data['data']->id)}}" enctype="multipart/form-data">
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
                        <label>@lang('create_clients.name')</label><span class="text-danger">*</span>
                        <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" id="name"  value="{{ $data['data']->name }}">
                        @error('name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label>@lang('create_clients.designation')</label><span class="text-danger">*</span>
                        <input type="text" class="form-control form-control-sm @error('designation') is-invalid @enderror" name="designation" id="designation"  value="{{ $data['data']->designation }}">
                        @error('designation')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label>@lang('create_clients.company_name')</label><span class="text-danger">*</span>
                        <input type="text" class="form-control form-control-sm @error('company_name') is-invalid @enderror" name="company_name" id="company_name"  value="{{ $data['data']->company_name }}">
                        @error('company_name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-6 col-md-12 col-12 mt-4">
                        <label>@lang('create_service.description')</label>
                        <textarea type="text" class="form-control form-control-sm @error('description') is-invalid @enderror" name="description" id="summernote">{!! $data['data']->description !!}</textarea>
                        @error('description')
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
                            $pathImage = public_path().'/backend/Client/ClientImage/'.$data['data']->image;
                        @endphp
                        @if(file_exists($pathImage))
                            <img src="{{ asset('backend/Client/ClientImage') }}/{{ $data['data']->image }}" alt="" class="img-fluid" style="height: 70px;">
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
