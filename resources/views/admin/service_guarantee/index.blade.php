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
    @lang('service_guarantee.service_guarantee')
    @endslot
    @slot('link_two_url')
    {{route('service_guarantee.index')}}
    @endslot


    <!-- Active Link -->
    @slot('active_link')
    @lang('service_guarantee.service_guarantee')
    @endslot

    <!-- Page Title -->
    @slot('page_title')
    @lang('service_guarantee.service_guarantee')
    @endslot


    @endcomponent

    <div class="card">
        <div class="card-body">

            <form method="post" action="{{route('service_guarantee.update',$data['data']->id)}}" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12 mt-4">
                        <label>@lang('service_guarantee.description')</label>
                        <textarea type="text" class="form-control form-control-sm @error('description') is-invalid @enderror" name="description"  id="summernote">{!! $data['data']->description !!}</textarea>
                        @error('description')
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
