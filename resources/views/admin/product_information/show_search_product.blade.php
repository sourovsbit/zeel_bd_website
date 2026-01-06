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
            @php
                $i = 1;
            @endphp
            @if(count($product) > 0)
            @foreach ($product as $p)
            <tr>
                <td>{{ $i++ }}</td>
                <td>
                    {{ $p->item->item_name }}
                </td>
                <td>
                    {{ $p->category->category_name }}
                </td>
                <td>
                    @if(isset($p->sub_category_id))
                    {{ $p->sub_category->sub_category_name }}
                    @endif
                </td>
                <td>
                    {{ $p->unit->unit_name }}
                </td>
                <td>
                    @if(config('app.locale') == 'en')
                    {{ $p->product_name ?: $p->product_name_bn}}
                    @else
                    {{ $p->product_name_bn ?: $p->product_name}}
                    @endif
                </td>
                <td>
                    {{ $p->purchase_price }}
                </td>
                <td>
                    {{ $p->sale_price }}
                </td>
                <td>
                    @if(Auth::user()->can('Product Information status'))
                        @php
                        if($p->status == 1)
                        {
                            $checked = 'checked';
                        }
                        else
                        {
                            $checked = 'false';
                        }
                        @endphp
                        <div class="checkbox-wrapper-51">
                        <input onchange="return changeProductInformationStatus({{$p->id}})" id="cbx-51{{$p->id}}" type="checkbox" {{$checked}}>
                        <label class="toggle" for="cbx-51{{$p->id}}">
                        <span>
                            <svg viewBox="0 0 10 10" height="10px" width="10px">
                            <path d="M5,1 L5,1 C2.790861,1 1,2.790861 1,5 L1,5 C1,7.209139 2.790861,9 5,9 L5,9 C7.209139,9 9,7.209139 9,5 L9,5 C9,2.790861 7.209139,1 5,1 L5,9 L5,1 Z"></path>
                            </svg>
                        </span>
                        </label>
                    </div>
                    @endif
                </td>
                <td>
                    @php
                    if(Auth::user()->can('Product Information show'))
                    {
                        $show_btn = '<a class="dropdown-item" href="'.route('product_information.show',$p->id).'"><i class="fa fa-eye"></i> '.__('common.show').'</a>';
                    }
                    else
                    {
                        $show_btn ='';
                    }

                    if(Auth::user()->can('Product Information edit'))
                    {
                        $edit_btn = '<a class="dropdown-item" href="'.route('product_information.edit',$p->id).'"><i class="fa fa-edit"></i> '.__('common.edit').'</a>';
                    }
                    else
                    {
                        $edit_btn ='';
                    }

                    if(Auth::user()->can('Product Information destroy'))
                    {
                        $delete_btn = '<form id="" method="post" action="'.route('product_information.destroy',$p->id).'">
                        '.csrf_field().'
                        '.method_field('DELETE').'
                        <button onclick="return Sure()" type="post" class="dropdown-item text-danger"><i class="fa fa-trash"></i> '.__('common.destroy').'</button>
                        </form>';
                    }
                    else
                    {
                        $delete_btn ='';
                    }



                    $output = '<div class="dropdown font-sans-serif">
                    <a class="btn btn-phoenix-default dropdown-toggle" id="dropdownMenuLink" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.__('common.action').'</a>
                    <div class="dropdown-menu dropdown-menu-end py-0" aria-labelledby="dropdownMenuLink" style="">'.$show_btn.' '.$edit_btn.' '.$delete_btn.'
                    </div>
                </div>';
                 @endphp
                 {!! $output !!}
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="10" style="text-align: center;">
                    <b class="text-danger">@lang('common.no_data_found')</b>
                </td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
