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
    @lang('privacy_policy.privacy_policy')
    @endslot
    @slot('link_two_url')
    {{route('privacy_policy.index')}}
    @endslot


    <!-- Active Link -->
    @slot('active_link')
    @lang('privacy_policy.privacy_policy')
    @endslot

    <!-- Page Title -->
    @slot('page_title')
    @lang('privacy_policy.privacy_policy')
    @endslot


    @endcomponent

    <div class="card">
        <div class="card-body">

            <form method="post" action="{{route('privacy_policy.update',$data['data']->id)}}" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12 mt-4">
                        <label>@lang('privacy_policy.description')</label>
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
