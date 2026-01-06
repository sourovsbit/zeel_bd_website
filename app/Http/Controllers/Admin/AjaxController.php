<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Color;
use Session;
use App\Models\Size;
use App\Models\ProductInformation;
use App\Models\SupplierArea;
use App\Models\Supplier;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AjaxController extends Controller
{
    public function find_cat($item_id)
    {
        $data = Category::where('item_id',$item_id)->where('status',1)->get();
        $output = '<option value="">'.__('common.select_one').'</option>';
        foreach($data as $d)
        {
            if(config('app.locale'))
            {
                $category_name = $d->category_name ?: $d->category_name_bn;
            }
            else
            {
                $category_name = $d->category_name_bn ?: $d->category_name;
            }


            if(old('cat_id') == $d->id)
            {
                $selected = 'selected';
            }
            else
            {
                $selected = '';
            }
            $output .= '<option '.$selected.' value="'.$d->id.'">'.$category_name.'</option>';
        }

        return $output;
    }

    public function getProductVariation($type)
    {
        $store_id = Session::get('store_id');
        $color = Color::where('status',1)->where('store_id',$store_id)->get();
        $size = Size::where('status',1)->where('store_id',$store_id)->get();
        $output = '';
        if(isset($color))
        {
            $output .='<label>'.__('product.select_color').'</label>';
            $output .='<div class="mt-2">';
            $output.='<div class="m-b-10">';
            foreach($color as $c)
            {
                if(config('app.locale') == 'en')
                {
                    $color_name = $c->color_name ?: $c->color_name_bn;
                }
                else
                {
                    $color_name = $c->color_name_bn ?: $c->color_name;
                }
            $output.='<label class="ui-checkbox ui-checkbox-inline">
                        <input type="checkbox" name="color[]" id="color" value="'.$c->id.'">
                        <span class="input-span"></span>'.$color_name.'<div class="box" style="background-color:'.$c->color_code.'"></div>
                    </label>';

            }
                $output.='</div>';
            $output .='</div>';
        }
        if(isset($size))
        {
            $output .='<hr><label>'.__('product.select_size').'</label>';
            $output .='<div class="mt-2">';
            $output.='<div class="m-b-10">';
            foreach($size as $s)
            {
                if(config('app.locale') == 'en')
                {
                    $size_name = $s->size_name ?: $s->size_name_bn;
                }
                else
                {
                    $size_name = $s->size_name_bn ?: $s->size_name;
                }
            $output.='<label class="ui-checkbox ui-checkbox-inline">
                        <input type="checkbox" name="size[]" id="size" value="'.$s->id.'">
                        <span class="input-span"></span>'.$size_name.'
                    </label>';
            }
                $output.='</div>';
            $output .='</div>';
        }


        return $output;
    }

    public function filterProduct(Request $request)
    {
        if(isset($request->item_id))
        {
            $data = Product::where('item_id',$request->item_id)->where('store_id',Session::get('store_id'))->get();
        }
        if(isset($request->item_id) && isset($request->cat_id))
        {
            $data = Product::where('cat_id',$request->cat_id)->where('store_id',Session::get('store_id'))->where('item_id',$request->item_id)->get();
        }
        if(isset($request->brand_id))
        {
            $data = Product::where('brand_id',$request->brand_id)->where('store_id',Session::get('store_id'))->get();
        }
        if(isset($request->product_name))
        {
            $data = Product::where('product_name','LIKE','%'.$request->product_name.'%')->where('store_id',Session::get('store_id'))->get();
        }

        return view('stores.product.show_search_data',compact('data'));
    }
    public function TrashedfilterProduct(Request $request)
    {
        if(isset($request->item_id))
        {
            $data = Product::onlyTrashed()->where('item_id',$request->item_id)->where('store_id',Session::get('store_id'))->get();
        }
        if(isset($request->item_id) && isset($request->cat_id))
        {
            $data = Product::onlyTrashed()->where('cat_id',$request->cat_id)->where('store_id',Session::get('store_id'))->where('item_id',$request->item_id)->get();
        }
        if(isset($request->brand_id))
        {
            $data = Product::onlyTrashed()->where('brand_id',$request->brand_id)->where('store_id',Session::get('store_id'))->get();
        }
        if(isset($request->product_name))
        {
            $data = Product::onlyTrashed()->where('product_name','LIKE','%'.$request->product_name.'%')->where('store_id',Session::get('store_id'))->get();
        }

        return view('stores.product.show_deleted_search_data',compact('data'));
    }

    public function findArea(Request $request)
    {
        $data = SupplierArea::where('area_name','LIKE','%'.$request->area_id.'%')->where('status',1)->get();
        $output = '';
        if(count($data) > 0)
        {
            $output .='<ul>';
            foreach($data as $d)
            {
                $output .= ' <li onclick="getAreaName('.$d->id.')">
                        '.$d->area_name.'
                    </li>';
            }
            $output .='</ul>';

            return $output;
        }
        else
        {
            return 'error';
        }
    }

    public function getAreaName($id)
    {
        $data = SupplierArea::where('id',$id)->where('status',1)->first();

        return $data->area_name;
    }

    public function filterSupplier(Request $request)
    {
        if($request->area_id == NULL)
        {
            $data = Supplier::where('supplier_name','LIKE','%'.$request->supplier_name.'%')
            ->orWhere('supplier_name_bn','LIKE','%'.$request->supplier_name.'%')
            ->where('store_id',Session::get('store_id'))
            ->get();
        }
        elseif($request->supplier_name == NULL)
        {
            $data = Supplier::where('area_id',$request->area_id)
            ->where('store_id',Session::get('store_id'))
            ->get();
        }
        else
        {
            $data = Supplier::where('area_id',$request->area_id)
            ->where('supplier_name','LIKE','%'.$request->supplier_name.'%')
            ->orWhere('supplier_name_bn','LIKE','%'.$request->supplier_name.'%')
            ->where('store_id',Session::get('store_id'))
            ->get();
        }

        return view('stores.supplier.show_supplier',compact('data'));
    }

    public function error_solve()
    {
        $data = User::all();
        foreach($data as $d)
        {
            $user = User::find($d->id);
            $role = Role::find($d->role_id);
            $user->assignRole($role);
        }
        return 'Ok';
    }

    public function searchProduct(Request $request)
    {
        // return $request->search;
        $search = $request->search;
        $product = ProductInformation::query()
        ->where('product_name','LIKE','%'.$search.'%')
        ->orWhere('purchase_price','LIKE','%'.$search.'%')
        ->orWhere('sale_price','LIKE','%'.$search.'%')
        ->get();

        return view('admin.product_information.show_search_product',compact('product'));
    }

    public function disableAds()
    {
        if(!session()->has('ads'))
        {
            Session::put('ads',true);
        }

        return true;
    }
}
