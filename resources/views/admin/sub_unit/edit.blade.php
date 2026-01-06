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
    @lang('sub_unit.sub_unit')
    @endslot
    @slot('link_two_url')
    {{route('sub_unit.index')}}
    @endslot


    <!-- Active Link -->
    @slot('active_link')
    @lang('sub_unit.edit')
    @endslot

    <!-- Page Title -->
    @slot('page_title')
    @lang('sub_unit.edit')
    @endslot


    @if(Auth::user()->can('Sub Unit view'))
    <!-- button one -->
    @slot('button_one_name')
    @lang('common.view')
    @endslot

    @slot('button_one_route')
    {{route('sub_unit.index')}}
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

            <form method="post" action="{{route('sub_unit.update',$data['data']->id)}}" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12 mt-2">
                        <label>@lang('common.sl')</label><span class="text-danger">*</span>
                        <input type="text" class="form-control form-control-sm @error('sl') is-invalid @enderror" name="sl" id="sl"  value="{{ $data['data']->sl }}">
                        @error('sl')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mt-2">
                        <label>@lang('sub_unit.select_unit')</label><span class="text-danger">*</span>
                        <div class="showlabels">
                            <select class="form-select form-select-sm select2 @error('unit_id') is-invalid @enderror" name="unit_id" id="unit_id">
                                <option value="">@lang('common.select_one')</option>
                                @if(isset($data['unit']))
                                @foreach ($data['unit'] as $unit)
                                <option @if($data['data']->unit_id == $unit->id) selected @endif value="{{ $unit->id }}">
                                    @if(config('app.locale') == 'en')
                                    {{ $unit->unit_name ?: $unit->unit_name_bn }}
                                    @else
                                    {{ $unit->unit_name_bn ?: $unit->unit_name }}
                                    @endif
                                </option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        @error('unit_id')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mt-2">
                        <label>@lang('sub_unit.sub_unit_name')</label><span class="text-danger">*</span>
                        <input type="text" class="form-control form-control-sm @error('sub_unit_name') is-invalid @enderror" name="sub_unit_name" id="sub_unit_name"  value="{{ $data['data']->sub_unit_name }}">
                        @error('sub_unit_name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mt-2">
                        <label>@lang('sub_unit.sub_unit_name_bn')</label>
                        <input type="text" class="form-control form-control-sm @error('sub_unit_name_bn') is-invalid @enderror" name="sub_unit_name_bn" id="sub_unit_name_bn"  value="{{ $data['data']->sub_unit_name_bn }}">
                        @error('sub_unit_name_bn')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mt-2">
                        <label>@lang('sub_unit.sub_unit_data')</label>
                        <input type="text" class="form-control form-control-sm @error('sub_unit_data') is-invalid @enderror" name="sub_unit_data" id="sub_unit_data"  value="{{ $data['data']->sub_unit_data }}">
                        @error('sub_unit_data')
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
