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
    @lang('product_size.size')
    @endslot
    @slot('link_two_url')
    {{route('product_size.index')}}
    @endslot


    <!-- Active Link -->
    @slot('active_link')
    @lang('product_size.edit_title')
    @endslot

    <!-- Page Title -->
    @slot('page_title')
    @lang('product_size.edit_title')
    @endslot

    @if(Auth::user()->can('Product Size view'))
    <!-- button one -->
    @slot('button_one_name')
    @lang('common.view')
    @endslot

    @slot('button_one_route')
    {{route('product_size.index')}}
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

            <form method="post" action="{{route('product_size.update',$data['data']->id)}}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12 mt-2">
                        <label>@lang('common.sl')</label><span class="text-danger">*</span>
                        <input type="number" class="form-control form-control-sm @error('sl') is-invalid @enderror" name="sl" id="sl"  value="{{ $data['data']->sl }}">
                        @error('sl')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mt-2">
                        <label>@lang('product_size.size_name')</label><span class="text-danger">*</span>
                        <input type="text" class="form-control form-control-sm @error('size_name') is-invalid @enderror" name="size_name" id="size_name"  value="{{ $data['data']->size_name }}">
                        @error('size_name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mt-2">
                        <label>@lang('product_size.size_name_bn')</label>
                        <input type="text" class="form-control form-control-sm @error('size_name_bn') is-invalid @enderror" name="size_name_bn" id="size_name_bn"  value="{{ $data['data']->size_name_bn }}">
                        @error('size_name_bn')
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
