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
    @lang('message.message')
    @endslot
    @slot('link_two_url')
    {{route('message.index')}}
    @endslot


    <!-- Active Link -->
    @slot('active_link')
    @lang('message.index_title')
    @endslot

    <!-- Page Title -->
    @slot('page_title')
    @lang('message.index_title')
    @endslot


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
                            <th>@lang('message.name')</th>
                            <th>@lang('message.email')</th>
                            <th>@lang('message.phone')</th>
                            <th>@lang('message.read')</th>
                            <th>@lang('message.read_by')</th>
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
        ajax: "{{ route('message.index') }}",
        columns: [
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'phone', name: 'phone'},
            {data: 'read', name: 'read'},
            {data: 'read_by', name: 'read_by'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
});
</script>

<script>
    function changeMessageStatus(id)
    {
        // alert(id);
        $.ajax({
            headers : {
                'X-CSRF-TOKEN' : '{{ csrf_token() }}'
            },

            url : '{{ route('message.status') }}',

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
