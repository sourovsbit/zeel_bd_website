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
    @lang('product_category.category')
    @endslot
    @slot('link_two_url')
    {{route('product_category.index')}}
    @endslot


    <!-- Active Link -->
    @slot('active_link')
    @lang('product_category.trash_title')
    @endslot

    <!-- Page Title -->
    @slot('page_title')
    @lang('product_category.trash_title')
    @endslot


    @if(Auth::user()->can('Product Category create'))
    <!-- button one -->
    @slot('button_one_name')
    @lang('common.create')
    @endslot

    @slot('button_one_route')
    {{route('product_category.create')}}
    @endslot

    @slot('button_one_class')
    btn btn-sm btn-outline-primary
    @endslot

    @slot('button_one_icon')
    <i class="fa fa-plus"></i>
    @endslot

    @endif


    @if(Auth::user()->can('Product Category view'))
    <!-- button two -->
    @slot('button_two_name')
    @lang('common.view')
    @endslot

    @slot('button_two_route')
    {{route('product_category.index')}}
    @endslot

    @slot('button_two_class')
    btn btn-sm btn-info
    @endslot

    @slot('button_two_icon')
    <i class="fa fa-eye"></i>
    @endslot

    @endif


    @endcomponent

    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table myTable  fs--1 mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('common.sl')</th>
                            <th>@lang('product_category.item')</th>
                            <th>@lang('product_category.category_name')</th>
                            <th>@lang('common.status')</th>
                            <th>@lang('common.action')</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


@push('footer_script')
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Datatables Responsive
    $(".myTable").DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('product_category.trash_list') }}",
        columns: [
            {data: 'serial', name: 'serial'},
            {data: 'sl', name: 'sl'},
            {data: 'item_name', name: 'item_name'},
            {data: 'category_name', name: 'category_name'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
});
</script>

<script>
    function changeCategoryStatus(id)
    {
        // alert(id);
        $.ajax({
            headers : {
                'X-CSRF-TOKEN' : '{{ csrf_token() }}'
            },

            url : '{{ route('product_category.status') }}',

            type : 'POST',

            data : {id},

            success : function(res)
            {

            }
        })
    }
</script>

@endpush



  @endsection
