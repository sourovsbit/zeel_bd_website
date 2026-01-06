<?php
namespace App\Repositories;
use App\Interfaces\ProductInformationInterface;
use App\Traits\ViewDirective;
use App\Models\ProductItem;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Models\Unit;
use App\Models\ProductInformation;
use App\Models\ProductSize;
use App\Models\ProductColor;
use App\Models\ProductSizeInfo;
use App\Models\ProductColorInfo;
use App\Models\ProductImage;
use App\Models\ActivityLog;
use App\Models\ProductBrands;
use Auth;
use App\Models\History;
use Yajra\DataTables\Facades\DataTables;
use App\Traits\Idgenerator;
use App\Models\Vendor;
use App\Models\Country;

class ProductInformationRepository implements ProductInformationInterface{

    use ViewDirective;
    protected $path,$sl;
    public function __construct()
    {
        $this->path = 'admin.product_information';
    }

    public function index($datatable)
    {
        if($datatable == 1)
        {
            $data = ProductInformation::query();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('serial',function($row){
                return $this->sl = $this->sl +1;
            })
            ->addColumn('item_name',function($row){
                if(config('app.locale') == 'en')
                {
                    return $row->item->item_name ?: $row->item->item_name_bn;
                }
                else
                {
                    return $row->item->item_name_bn ?: $row->item->item_name;
                }
            })
            ->addColumn('category_name',function($row){
                if(config('app.locale') == 'en')
                {
                    return $row->category->category_name ?: $row->category->category_name_bn;
                }
                else
                {
                    return $row->category->category_name_bn ?: $row->category->category_name;
                }
            })
            ->addColumn('sub_category_name',function($row){
                if(isset($row->sub_category_id))
                {
                    if(config('app.locale') == 'en')
                    {
                        return $row->sub_category->sub_category_name ?: $row->sub_category->sub_category_name_bn;
                    }
                    else
                    {
                        return $row->sub_category->ub_category_name_bn ?: $row->sub_category->sub_category_name;
                    }
                }
                else
                {
                    return '';
                }
            })
            ->addColumn('unit_name',function($row){
                if(config('app.locale') == 'en')
                {
                    return $row->unit->unit_name ?: $row->unit->unit_name_bn;
                }
                else
                {
                    return $row->unit->unit_name_bn ?: $row->unit->unit_name;
                }
            })
            ->addColumn('product_name',function($row){
                if(config('app.locale') == 'en')
                {
                    return $row->product_name ?: $row->product_name_bn;
                }
                else
                {
                    return $row->product_name_bn ?: $row->product_name;
                }
            })
            ->addColumn('purchase_price',function($row){

                return $row->purchase_price;

            })
            ->addColumn('sale_price',function($row){

                return $row->sale_price;

            })
            ->addColumn('status',function($row){
                if(Auth::user()->can('Product Information status'))
                {
                    if($row->status == 1)
                    {
                        $checked = 'checked';
                    }
                    else
                    {
                        $checked = 'false';
                    }
                    return '<div class="checkbox-wrapper-51">
                    <input onchange="return changeProductInformationStatus('.$row->id.')" id="cbx-51'.$row->id.'" type="checkbox" '.$checked.'>
                    <label class="toggle" for="cbx-51'.$row->id.'">
                      <span>
                        <svg viewBox="0 0 10 10" height="10px" width="10px">
                          <path d="M5,1 L5,1 C2.790861,1 1,2.790861 1,5 L1,5 C1,7.209139 2.790861,9 5,9 L5,9 C7.209139,9 9,7.209139 9,5 L9,5 C9,2.790861 7.209139,1 5,1 L5,9 L5,1 Z"></path>
                        </svg>
                      </span>
                    </label>
                  </div>';
                }
                else
                {
                    return '';
                }
            })
            ->addColumn('action', function($row){
                if(Auth::user()->can('Product Information show'))
                {
                    $show_btn = '<a class="dropdown-item" href="'.route('product_information.show',$row->id).'"><i class="fa fa-eye"></i> '.__('common.show').'</a>';
                }
                else
                {
                    $show_btn ='';
                }

                if(Auth::user()->can('Product Information edit'))
                {
                    $edit_btn = '<a class="dropdown-item" href="'.route('product_information.edit',$row->id).'"><i class="fa fa-edit"></i> '.__('common.edit').'</a>';
                }
                else
                {
                    $edit_btn ='';
                }

                if(Auth::user()->can('Product Information destroy'))
                {
                    $delete_btn = '<form id="" method="post" action="'.route('product_information.destroy',$row->id).'">
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
                return $output;
            })
            ->rawColumns(['action','item_name','category_name','sub_category_name','unit_name','product_name','purchase_price','sale_price','sl','status'])
            ->make(true);

        }
        return ViewDirective::view($this->path,'index');
    }

    public function create()
    {
        $data['item'] = ProductItem::where('status',1)->get();
        $data['category'] = ProductCategory::where('status',1)->get();
        $data['sub_category'] = ProductSubCategory::where('status',1)->get();
        $data['unit'] = Unit::where('status',1)->get();
        $data['color'] = ProductColor::where('status',1)->get();
        $data['brand'] = ProductBrands::where('status',1)->get();
        return ViewDirective::view($this->path,'create',$data);
    }

    public function store($request)
    {
        try {
            $product_id = Idgenerator::AutoCode('product_informations','product_id','PRD-','10');
            $data = array(
                'product_id' => $product_id,
                'sl' => $request->sl,
                'item_id' => $request->item_id,
                'category_id' => $request->category_id,
                'sub_category_id' => $request->sub_category_id,
                'brand_id' => $request->brand_id,
                'unit_id' => $request->unit_id,
                'product_name' => $request->product_name,
                'product_name_bn' => $request->product_name_bn,
                'purchase_price' => $request->purchase_price,
                'sale_price' => $request->sale_price,
                'moq' => $request->moq,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'product_type' => $request->product_type,
                'status' => 1,
            );


            ProductInformation::create($data);
            $image = $request->file('image');

            if($image)
            {
                for ($i=0; $i < count($image) ; $i++)
                {
                    $imageName = rand().'.'.$image[$i]->getClientOriginalExtension();
                    $image[$i]->move(public_path().'/backend/Product/ProductImage/',$imageName);
                    ProductImage::create([
                        'sl' => $i,
                        'product_id' => $product_id,
                        'image' => $imageName,
                    ]);
                }
            }

            if($request->product_type == 2)
            {
                if($request->color)
                {
                    for ($i=0; $i < count($request->color) ; $i++)
                    {
                        ProductColorInfo::create([
                            'sl' => $i,
                            'product_id' => $product_id,
                            'color_id' => $request->color[$i],
                        ]);
                    }
                }
            }

            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'create',
                'description' => 'Create Product which name is '.$request->product_name,
                'description_bn' => 'একটি পণ্য তৈরি করেছেন যার নাম '.$request->product_name,
            ]);

            toastr()->success(__('product_information.create_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function show($id)
    {
        $data['data'] = ProductInformation::find($id);
        $data['histories'] = History::where('fk_id',$id)->where('tag','product_information')->get();
        return ViewDirective::view($this->path,'show',$data);
    }

    public function properties($id){

    }

    public function edit($id)
    {
        $data['data'] = ProductInformation::find($id);
        $data['item'] = ProductItem::where('status',1)->get();
        $data['category'] = ProductCategory::where('status',1)->where('item_id',$data['data']->item_id)->get();
        $data['sub_category'] = ProductSubCategory::where('status',1)->where('item_id',$data['data']->item_id)->where('category_id',$data['data']->category_id)->get();
        $data['unit'] = Unit::where('status',1)->get();
        $data['color'] = ProductColor::where('status',1)->get();
        $data['brand'] = ProductBrands::where('status',1)->get();
        return ViewDirective::view($this->path,'edit',$data);
    }

    public function update($request, $id)
    {
        try {
            $data = array(
                'sl' => $request->sl,
                'item_id' => $request->item_id,
                'category_id' => $request->category_id,
                'sub_category_id' => $request->sub_category_id,
                'brand_id' => $request->brand_id,
                'unit_id' => $request->unit_id,
                'product_name' => $request->product_name,
                'product_name_bn' => $request->product_name_bn,
                'purchase_price' => $request->purchase_price,
                'sale_price' => $request->sale_price,
                'moq' => $request->moq,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'product_type' => $request->product_type,
                'status' => 1,
            );


            ProductInformation::find($id)->update($data);
            $data = ProductInformation::find($id);
            $image = $request->file('image');

            if($image)
            {
                ProductImage::where('product_id',$data->product_id)->forceDelete();
                for ($i=0; $i < count($image) ; $i++)
                {
                    $imageName = rand().'.'.$image[$i]->getClientOriginalExtension();
                    $image[$i]->move(public_path().'/backend/Product/ProductImage/',$imageName);
                    ProductImage::create([
                        'sl' => $i,
                        'product_id' => $data->product_id,
                        'image' => $imageName,
                    ]);
                }
            }

            if($request->product_type == 1)
            {
                ProductColorInfo::where('product_id',$data->product_id)->forceDelete();
            }

            if($request->product_type == 2)
            {
                if($request->color)
                {
                    ProductColorInfo::where('product_id',$data->product_id)->forceDelete();
                    for ($i=0; $i < count($request->color) ; $i++)
                    {
                        ProductColorInfo::create([
                            'sl' => $i,
                            'product_id' => $data->product_id,
                            'color_id' => $request->color[$i],
                        ]);
                    }
                }
            }

            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'update',
                'description' => 'Update Product which name is '.$data->product_name,
                'description_bn' => 'একটি পণ্য সম্পাদন করেছেন যার নাম '.$data->product_name,
            ]);


            History::create([
                'tag' => 'product_information',
                'fk_id' => $id,
                'type' => 'update',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);

            toastr()->success(__('product_information.update_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            ProductInformation::find($id)->delete();
            $data = ProductInformation::withTrashed()->where('id',$id)->first();
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'destroy',
                'description' => 'Destroy Create Product which name is '.$data->product_name,
                'description_bn' => 'একটি পণ্য ডিলেট করেছেন যার নাম '.$data->product_name,
            ]);

            History::create([
                'tag' => 'product_information',
                'fk_id' => $id,
                'type' => 'destroy',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('product_information.delete_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function trash_list($datatable)
    {
        if($datatable == 1)
        {
            $data = ProductInformation::onlyTrashed()->get();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('sl',function($row){
                return $this->sl = $this->sl +1;
            })
            ->addColumn('item_name',function($row){
                if(config('app.locale') == 'en')
                {
                    return $row->item->item_name ?: $row->item->item_name_bn;
                }
                else
                {
                    return $row->item->item_name_bn ?: $row->item->item_name;
                }
            })
            ->addColumn('category_name',function($row){
                if(config('app.locale') == 'en')
                {
                    return $row->category->category_name ?: $row->category->category_name_bn;
                }
                else
                {
                    return $row->category->category_name_bn ?: $row->category->category_name;
                }
            })
            ->addColumn('sub_category_name',function($row){
                if(config('app.locale') == 'en')
                {
                    return $row->sub_category_name ?: $row->sub_category_name_bn;
                }
                else
                {
                    return $row->sub_category_name_bn ?: $row->sub_category_name;
                }
            })
            ->addColumn('unit_name',function($row){
                if(config('app.locale') == 'en')
                {
                    return $row->unit_name ?: $row->unit_name_bn;
                }
                else
                {
                    return $row->unit_name_bn ?: $row->unit_name;
                }
            })
            ->addColumn('product_name',function($row){
                if(config('app.locale') == 'en')
                {
                    return $row->product_name ?: $row->product_name_bn;
                }
                else
                {
                    return $row->product_name_bn ?: $row->product_name;
                }
            })
            ->addColumn('purchase_price',function($row){

                return $row->purchase_price;

            })
            ->addColumn('sale_price',function($row){

                return $row->sale_price;

            })
            ->addColumn('status',function($row){
                if(Auth::user()->can('Product Information status'))
                {
                    if($row->status == 1)
                    {
                        $checked = 'checked';
                    }
                    else
                    {
                        $checked = 'false';
                    }
                    return '<div class="checkbox-wrapper-51">
                    <input onchange="return changeProductInformationStatus('.$row->id.')" id="cbx-51" type="checkbox" '.$checked.'>
                    <label class="toggle" for="cbx-51">
                      <span>
                        <svg viewBox="0 0 10 10" height="10px" width="10px">
                          <path d="M5,1 L5,1 C2.790861,1 1,2.790861 1,5 L1,5 C1,7.209139 2.790861,9 5,9 L5,9 C7.209139,9 9,7.209139 9,5 L9,5 C9,2.790861 7.209139,1 5,1 L5,9 L5,1 Z"></path>
                        </svg>
                      </span>
                    </label>
                  </div>';
                }
                else
                {
                    return '';
                }
            })
            ->addColumn('action', function($row){
                if(Auth::user()->can('Product Information restore'))
                {
                    $restore_btn = '<a class="dropdown-item" href="'.route('product_information.restore',$row->id).'"><i class="fa fa-trash-arrow-up"></i> '.__('common.restore').'</a>';
                }
                else
                {
                    $restore_btn = '';
                }

                if(Auth::user()->can('Product Information delete'))
                {
                    $delete_btn = '<a onclick="return Sure()" class="dropdown-item text-danger" href="'.route('product_information.delete',$row->id).'"><i class="fa fa-trash"></i> '.__('common.delete').'</a>';
                }
                else
                {
                    $delete_btn = '';
                }


                $output = '<div class="dropdown font-sans-serif">
                <a class="btn btn-phoenix-default dropdown-toggle" id="dropdownMenuLink" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.__('common.action').'</a>
                <div class="dropdown-menu dropdown-menu-end py-0" aria-labelledby="dropdownMenuLink" style="">'.$restore_btn.' '.$delete_btn.'
                </div>
              </div>';
                return $output;
            })
            ->rawColumns(['action','item_name','category_name','sub_category_name','unit_name','product_name','purchase_price','sale_price','sl','status'])
            ->make(true);

        }
        return ViewDirective::view($this->path,'trash_list');
    }

    public function restore($id)
    {
        try {
            ProductInformation::withTrashed()->where('id',$id)->restore();
            $data = ProductInformation::withTrashed()->where('id',$id)->first();
            //history
            History::create([
                'tag' => 'product_information',
                'fk_id' => $id,
                'type' => 'restore',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            //actvity_log
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'restore',
                'description' => 'Restore Create Product which name is '.$data->product_name,
                'description_bn' => 'একটি পণ্য পুনুরুদ্ধার করেছেন যার নাম '.$data->product_name,
            ]);
            toastr()->success(__('product_information.restore_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $data = ProductInformation::withTrashed()->where('id',$id)->first();

            $path = public_path().'/backend/Product/ProductImage/'.$data->image;
            if(file_exists($path))
            {
                unlink($path);
            }

            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'delete',
                'description' => 'Permenantly Delete Create Product which name is '.$data->product_name,
                'description_bn' => 'একটি পণ্য সম্পূর্ণ ডিলেট করেছেন যার নাম '.$data->product_name,
            ]);
            History::where('tag','product_information')->where('fk_id',$id)->delete();
            ProductInformation::withTrashed()->where('id',$id)->forceDelete();
            toastr()->success(__('product_information.delete_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function print(){

    }

    public function status($id)
    {
        try {
            $data = ProductInformation::withTrashed()->where('id',$id)->first();
            if($data->status == 1)
            {
                ProductInformation::withTrashed()->where('id',$id)->update([
                    'status' => 0,
                ]);
            }
            else
            {
                ProductInformation::withTrashed()->where('id',$id)->update([
                    'status' => 1,
                ]);
            }
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'status',
                'description' => 'Change Status Product which name is '.$data->product_name,
                'description_bn' => 'একটি পণ্য তথ্য স্ট্যাটাস পরিবর্তন করেছেন যার নাম '.$data->product_name,
            ]);

            History::create([
                'tag' => 'product_information',
                'fk_id' => $id,
                'type' => 'status',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('product_information.status_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function GetSubCategorie($category_id)
    {
        $this->lang = config('app.locale');

        $data = ProductSubCategory::where('category_id',$category_id)->get();


        $output = '<option value="">'.__('common.select_one').'</option>';


        foreach($data as $v)
        {

            $output .= '<option value="'.$v->id.'">'.$v->sub_category_name.'</option>';

        }
        return $output;
    }
}
