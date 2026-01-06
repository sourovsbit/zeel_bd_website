@extends('admin.layouts.master')
@section('body')
<div class="content">

    @component('components.breadcrumb')
        @slot('link_one')
            @lang('common.dashboard')
        @endslot
        @slot('link_one_url')
            {{ route('admin.view') }}
        @endslot

        @slot('link_two')
            @lang('message.message')
        @endslot
        @slot('link_two_url')
            {{ route('message.index') }}
        @endslot

        @slot('active_link')
            @lang('message.view_details')
        @endslot

        @slot('page_title')
            @lang('message.view_details')
        @endslot
    @endcomponent

    <div class="card">
        <div class="card-body">
            <h4 class="mb-4">@lang('message.details')</h4>

            <table class="table table-bordered">
                <tr>
                    <th>@lang('message.name')</th>
                    <td>{{ $data->name }}</td>
                </tr>
                <tr>
                    <th>@lang('message.email')</th>
                    <td>{{ $data->email }}</td>
                </tr>
                <tr>
                    <th>@lang('message.phone')</th>
                    <td>{{ $data->phone }}</td>
                </tr>
                <tr>
                    <th>@lang('message.message')</th>
                    <td>{{ $data->message }}</td>
                </tr>
                <tr>
                    <th>@lang('message.created_at')</th>
                    <td>{{ $data->created_at->format('d M Y, h:i A') }}</td>
                </tr>
            </table>

            <a href="{{ route('message.index') }}" class="btn btn-secondary mt-3">
                <i class="fa fa-arrow-left"></i> @lang('message.back')
            </a>
        </div>
    </div>


@endsection
