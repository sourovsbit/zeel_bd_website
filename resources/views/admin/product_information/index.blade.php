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
    @lang('product_information.product_information')
    @endslot
    @slot('link_two_url')
    {{route('product_information.index')}}
    @endslot


    <!-- Active Link -->
    @slot('active_link')
    @lang('product_information.index_title')
    @endslot

    <!-- Page Title -->
    @slot('page_title')
    @lang('product_information.index_title')
    @endslot


    @if(Auth::user()->can('Product Information create'))
    <!-- button one -->
    @slot('button_one_name')
    @lang('common.create')
    @endslot

    @slot('button_one_route')
    {{route('product_information.create')}}
    @endslot

    @slot('button_one_class')
    btn btn-sm btn-outline-primary
    @endslot

    @slot('button_one_icon')
    <i class="fa fa-plus"></i>
    @endslot

    @endif


    @if(Auth::user()->can('Product Information trash'))
    <!-- button two -->
    @slot('button_two_name')
    @lang('common.trash_list')
    @endslot

    @slot('button_two_route')
    {{route('product_information.trash_list')}}
    @endslot

    @slot('button_two_class')
    btn btn-sm btn-danger
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
            <div class="form-group mb-4">
                <div class="input-group">
                    <input type="text" class="form-control form-control-sm" name="search" id="search" placeholder="Search Product.....">
                    <span class="input-group-text search" onclick="searchProduct()"><i class="fa fa-search"></i></span>
                </div>
            </div>
            <div class="showdata">
                <div class="table-responsive">
                    <table class="table myTable  fs--1 mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('product_information.item')</th>
                                <th>@lang('product_information.category')</th>
                                <th>@lang('product_information.sub_category')</th>
                                <th>@lang('product_information.unit')</th>
                                <th>@lang('product_information.product_name')</th>
                                <th>@lang('product_information.purchase_price')</th>
                                <th>@lang('product_information.sale_price')</th>
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
    </div>


@push('footer_script')
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Datatables Responsive
    $(".myTable").DataTable({
        processing: true,
        serverSide: true,
        searching : false,
        ajax: "{{ route('product_information.index') }}",
        columns: [
            {data: 'sl', name: 'sl'},
            {data: 'item_name', name: 'item_name'},
            {data: 'category_name', name: 'category_name'},
            {data: 'sub_category_name', name: 'sub_category_name'},
            {data: 'unit_name', name: 'unit_name'},
            {data: 'product_name', name: 'product_name'},
            {data: 'purchase_price', name: 'purchase_price'},
            {data: 'sale_price', name: 'sale_price'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
});
</script>

<script>

    function searchProduct()
    {
        let search = $('#search').val();
        if(search != '')
        {
            $.ajax({
                headers : {
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                },

                url : '{{ url('searchProduct') }}',

                type : 'POST',

                data : {search},

                beforeSend : function()
                {
                    $('.search').html('Loading...');
                },

                success : function(res)
                {
                    $('.search').html('<i class="fa fa-search"></i>');
                    $('.showdata').html(res);
                }
            })
        }
    }

    function changeProductInformationStatus(id)
    {
        // alert(id);
        $.ajax({
            headers : {
                'X-CSRF-TOKEN' : '{{ csrf_token() }}'
            },

            url : '{{ route('product_information.status') }}',

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
