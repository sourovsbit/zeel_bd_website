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
    @lang('sub_unit.details')
    @endslot

    <!-- Page Title -->
    @slot('page_title')
    @lang('sub_unit.details')
    @endslot




    @endcomponent

    <div class="card">
        <div class="card-body">
            <h4>
                @if(config('app.locale') == 'en')
                {{ $data['data']->sub_unit_name ?: $data['data']->sub_unit_name_bn }}
                @else
                {{ $data['data']->sub_unit_name_bn ?: $data['data']->sub_unit_name }}
                @endif
            </h4>
            @php
                $explode = explode(' ',$data['data']->created_at);
            @endphp
            <span>@lang('common.create_by') : </span> {{ \App\Helpers\AuthHelper::GetUserName($data['data']->create_by) }} | {{ \App\Traits\Date::getDateWithMonth('-',$explode[0]) }}, {{ date('h:i:s a', strtotime($explode[1])) }}
            <hr>
            @include('admin.layouts.histories')

        </div>
    </div>


@push('footer_script')
<script>
    $(".myTable").DataTable({
        order: [[0, 'desc']]
    });
</script>

@endpush



  @endsection
