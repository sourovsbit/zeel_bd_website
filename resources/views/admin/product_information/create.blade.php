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
    @lang('product_information.create_title')
    @endslot

    <!-- Page Title -->
    @slot('page_title')
    @lang('product_information.create_title')
    @endslot


    @if(Auth::user()->can('Product Information view'))
    <!-- button one -->
    @slot('button_one_name')
    @lang('common.view')
    @endslot

    @slot('button_one_route')
    {{route('product_information.index')}}
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

            <form method="post" action="{{route('product_information.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12">

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12 mt-4">
                                <label>@lang('common.sl')</label><span class="text-danger">*</span>
                                <input type="number" class="form-control form-control-sm @error('sl') is-invalid @enderror" name="sl" id="sl"  value="{{ old('sl') }}">
                                @error('sl')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-12 col-12 mt-4">
                                <label>@lang('product_information.select_item')</label><span class="text-danger">*</span>
                                <div class="showlabels">
                                    <select class="form-select form-select-sm select2 @error('item_id') is-invalid @enderror" name="item_id" id="item_id" onchange="return GetCategorie()">
                                        <option value="">@lang('common.select_one')</option>
                                        @if(isset($data['item']))
                                        @foreach ($data['item'] as $item)
                                        <option @if(old('item_id') == $item->id) selected @endif value="{{ $item->id }}">
                                            @if(config('app.locale') == 'en')
                                            {{ $item->item_name ?: $item->item_name_bn }}
                                            @else
                                            {{ $item->item_name_bn ?: $item->item_name }}
                                            @endif
                                        </option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                @error('item_id')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-12 col-12 mt-4">
                                <label>@lang('product_information.select_category')</label><span class="text-danger">*</span>
                                <div class="showlabels">
                                    <select class="form-select form-select-sm select2 @error('category_id') is-invalid @enderror" name="category_id" id="category_id" onchange="return GetSubCategorie()">
                                        <option value="">@lang('common.select_one')</option>

                                    </select>
                                </div>
                                @error('category_id')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-12 col-12 mt-4">
                                <label>@lang('product_information.select_sub_category')</label>
                                <div class="showlabels">
                                    <select class="form-select form-select-sm select2 @error('sub_category_id') is-invalid @enderror" name="sub_category_id" id="sub_category_id">
                                        <option value="">@lang('common.select_one')</option>

                                    </select>
                                </div>
                                @error('sub_category_id')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-lg-6 col-md-12 col-12 mt-4">
                                <label>@lang('product_information.brand')</label><span class="text-danger">*</span>
                                <div class="showlabels">
                                    <select class="form-select form-select-sm select2 @error('brand_id') is-invalid @enderror" name="brand_id" id="brand_id">
                                        <option value="">@lang('common.select_one')</option>
                                        @if(isset($data['brand']))
                                        @foreach ($data['brand'] as $brand)
                                        <option @if(old('brand_id') == $brand->id) selected @endif value="{{ $brand->id }}">
                                            @if(config('app.locale') == 'en')
                                            {{ $brand->brand_name ?: $brand->brand_name_bn }}
                                            @else
                                            {{ $brand->brand_name_bn ?: $brand->brand_name }}
                                            @endif
                                        </option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                @error('brand_id')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-12 col-12 mt-4">
                                <label>@lang('product_information.select_unit')</label><span class="text-danger">*</span>
                                <div class="showlabels">
                                    <select class="form-select form-select-sm select2 @error('unit_id') is-invalid @enderror" name="unit_id" id="unit_id">
                                        <option value="">@lang('common.select_one')</option>
                                        @if(isset($data['unit']))
                                        @foreach ($data['unit'] as $unit)
                                        <option @if(old('unit_id') == $unit->id) selected @endif value="{{ $unit->id }}">
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

                            <div class="col-lg-12 col-md-12 col-12 mt-4">
                                <label>@lang('product_information.product_name')</label><span class="text-danger">*</span>
                                <input type="text" class="form-control form-control-sm @error('product_name') is-invalid @enderror" name="product_name" id="product_name"  value="{{ old('product_name') }}">
                                @error('product_name')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-lg-12 col-md-12 col-12 mt-4">
                                <label>@lang('product_information.product_name_bn')</label>
                                <input type="text" class="form-control form-control-sm @error('product_name_bn') is-invalid @enderror" name="product_name_bn" id="product_name_bn"  value="{{ old('product_name_bn') }}">
                                @error('product_name_bn')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-lg-6 col-md-12 col-12 mt-4">
                                <label>@lang('product_information.purchase_price')</label><span class="text-danger">*</span>
                                <input type="number" class="form-control form-control-sm @error('purchase_price') is-invalid @enderror" name="purchase_price" id="purchase_price"  value="{{ old('purchase_price') }}">
                                @error('purchase_price')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-lg-6 col-md-12 col-12 mt-4">
                                <label>@lang('product_information.sale_price')</label><span class="text-danger">*</span>
                                <input type="number" class="form-control form-control-sm @error('sale_price') is-invalid @enderror" name="sale_price" id="sale_price"  value="{{ old('sale_price') }}">
                                @error('sale_price')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-12 col-md-12 col-12 mt-4">
                                <label>@lang('product_information.moq')</label><span class="text-danger">*</span>
                                <input type="number" class="form-control form-control-sm @error('moq') is-invalid @enderror" name="moq" id="moq"  value="1">
                                @error('moq')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                    </div>


                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="row">

                            <div class="col-lg-12 col-md-12 col-12 mt-4">
                                <label>@lang('product_information.short_description')</label>
                                <textarea type="text" class="form-control form-control-sm summernote @error('short_description') is-invalid @enderror" name="short_description" id=""></textarea>
                                @error('short_description')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-lg-12 col-md-12 col-12 mt-4">
                                <label>@lang('product_information.description')</label>
                                <textarea type="text" class="form-control form-control-sm summernote @error('description') is-invalid @enderror" id="" name="description"></textarea>
                                @error('description')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-lg-12 col-md-12 col-12 mt-4">
                                <label>@lang('product_information.product_type')</label><span class="text-danger">*</span>
                                <div class="showlabels">
                                    <select class="form-select form-select-sm select2 @error('product_type') is-invalid @enderror" name="product_type" id="product_type" onchange="showVariation()">
                                        <option value="1">@lang('product_information.simple_roduct')</option>
                                        <option value="2">@lang('product_information.variable_product')</option>
                                    </select>
                                </div>
                                @error('product_type')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-lg-12 col-md-12 col-12 mt-4" id="color_box">
                                <label>@lang('product_information.select_color')</label><span class="text-danger">*</span>
                                <div class="showlabels">
                                    <div class="row">
                                        @if(isset($data['color']))
                                        @foreach ($data['color'] as $color)
                                            <div class="checkbox form-check col-lg-3 col-md-4 col-sm-6 mt-2">
                                                <label>
                                                    <input type="checkbox" name="color[]" value="{{$color->id}}">
                                                    @if(config('app.locale') == 'en')
                                                    {{ $color->color_name ?: $color->color_name_bn }}
                                                    @else
                                                    {{ $color->color_name_bn ?: $color->color_name }}
                                                    @endif
                                                </label>
                                            </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-12 mt-4">
                                <label>@lang('common.image')</label>
                                <input type="file" class="form-control form-control-sm @error('image') is-invalid @enderror" name="image[]" id="image" multiple accept=".jpg,.png,.jpeg,.webp">
                                @error('image')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>

                    </div>

                </div>

                <div class="text-right mt-4" style="text-align: right;">
                    <button class="btn btn-sm btn-success"><i class="fa fa-save"></i> @lang('common.submit')</button>
                </div>

            </form>
        </div>
    </div>


@push('footer_script')
<script>

    $(document).ready(function(){
        setTimeout(() => {
            showVariation();
        }, 500);
    })

    function showVariation()
    {
        let product_type = $('#product_type').val();

        if(product_type == 1)
        {
            $('#size_box').css('display','none');
            $('#color_box').css('display','none');
        }
        else
        {
            $('#size_box').css('display','block');
            $('#color_box').css('display','block');
        }
    }

    $(document).ready(function() {
        $('.summernote').summernote();
    });
</script>
@endpush


<script>

    setTimeout(() => {
        GetCategorie();
    }, 1000);

    function GetCategorie()
    {
        let item_id = $('#item_id').val();
        if(item_id != "")
        {
            $.ajax({
                headers : {
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                },

                url : '{{url('GetCategorie')}}/'+item_id,

                type : 'GET',

                success : function(data)
                {
                    $('#category_id').html(data);
                }
            })
        }
    }
</script>

    <script>
        function GetSubCategorie()
        {
            let category_id = $('#category_id').val();
            if(category_id != "")
            {
                $.ajax({
                    headers : {
                        'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                    },

                    url : '{{url('GetSubCategorie')}}/'+category_id,

                    type : 'GET',

                    success : function(data)
                    {
                        $('#sub_category_id').html(data);
                    }
                })
            }
        }
    </script>
@endsection
