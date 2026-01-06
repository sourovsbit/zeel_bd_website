<?php
namespace App\Repositories;
use App\Interfaces\ProductSubCategoryInterface;
use App\Traits\ViewDirective;
use App\Models\ProductItem;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Models\ActivityLog;
use Auth;
use App\Models\History;
use Yajra\DataTables\Facades\DataTables;

class ProductSubCategoryRepository implements ProductSubCategoryInterface{
    use ViewDirective;
    protected $path,$sl;
    public function __construct()
    {
        $this->path = 'admin.product_sub_category';
    }
    public function index($datatable)
    {
        if($datatable == 1)
        {
            $data = ProductSubCategory::all();
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
                if(config('app.locale') == 'en')
                {
                    return $row->sub_category_name ?: $row->sub_category_name_bn;
                }
                else
                {
                    return $row->sub_category_name_bn ?: $row->sub_category_name;
                }
            })
            ->addColumn('status',function($row){
                if(Auth::user()->can('Product Sub Category status'))
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
                    <input onchange="return changeSubCategoryStatus('.$row->id.')" id="cbx-51-'.$row->id.'" type="checkbox" '.$checked.'>
                    <label class="toggle" for="cbx-51-'.$row->id.'">
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
                if(Auth::user()->can('Product Sub Category show'))
                {
                    $show_btn = '<a class="dropdown-item" href="'.route('product_sub_category.show',$row->id).'"><i class="fa fa-eye"></i> '.__('common.show').'</a>';
                }
                else
                {
                    $show_btn ='';
                }

                if(Auth::user()->can('Product Sub Category edit'))
                {
                    $edit_btn = '<a class="dropdown-item" href="'.route('product_sub_category.edit',$row->id).'"><i class="fa fa-edit"></i> '.__('common.edit').'</a>';
                }
                else
                {
                    $edit_btn ='';
                }

                if(Auth::user()->can('Product Sub Category destroy'))
                {
                    $delete_btn = '<form id="" method="post" action="'.route('product_sub_category.destroy',$row->id).'">
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
            ->rawColumns(['action','item_name','category_name','sl','status'])
            ->make(true);

        }
        return ViewDirective::view($this->path,'index');
    }

    public function create()
    {
        $data['item'] = ProductItem::where('status',1)->get();
        $data['category'] = ProductCategory::where('status',1)->get();
        return ViewDirective::view($this->path,'create',$data);

    }

    public function store($request)
    {
        try {
            $data = array(
                'sl' => $request->sl,
                'item_id' => $request->item_id,
                'category_id' => $request->category_id,
                'sub_category_name' => $request->sub_category_name,
                'sub_category_name_bn' => $request->sub_category_name_bn,
                'status' => 1,
                'image' => '0',
                'banner' => '0',
            );

            $image = $request->file('image');
            $banner = $request->file('banner');

            if($image)
            {
                $imageName = rand().'.'.$image->getClientOriginalExtension();
                $image->move(public_path().'/backend/ProductSubCategory/ProductSubCategoryImage/',$imageName);
                $data['image'] = $imageName;
            }
            if($banner)
            {
                $bannerName = rand().'.'.$banner->getClientOriginalExtension();
                $banner->move(public_path().'/backend/ProductSubCategory/ProductSubCategoryBanner/',$bannerName);
                $data['banner'] = $bannerName;
            }

            ProductSubCategory::create($data);
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'create',
                'description' => 'Create Product Category which name is '.$request->sub_category_name,
                'description_bn' => 'একটি পণ্য সাব ক্যাটাগরি তৈরি করেছেন যার নাম '.$request->sub_category_name,
            ]);

            toastr()->success(__('product_sub_category.create_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function show($id)
    {
        $data['histories'] = History::where('tag','product_sub_category')->get();
        $data['data'] = ProductSubCategory::find($id);

        return ViewDirective::view($this->path,'show',$data);
    }

    public function properties($id){

    }

    public function edit($id)
    {
        $data['data'] = ProductSubCategory::find($id);
        $data['item'] = ProductItem::where('status',1)->get();
        $data['category'] = ProductCategory::where('status',1)->get();
        return ViewDirective::view($this->path,'edit',$data);
    }

    public function update($request, $id)
    {
        try {
            $data = array(
                'sl' => $request->sl,
                'item_id' => $request->item_id,
                'category_id' => $request->category_id,
                'sub_category_name' => $request->sub_category_name,
                'sub_category_name_bn' => $request->sub_category_name_bn,
            );

            $image = $request->file('image');
            $banner = $request->file('banner');
            $path = ProductSubCategory::find($id);
            if($image)
            {
                $pathImage = public_path().'/backend/ProductSubCategory/ProductSubCategoryImage/'.$path->image;
                if(file_exists($pathImage))
                {
                    unlink($pathImage);
                }
            }

            if($image)
            {
                $imageName = rand().'.'.$image->getClientOriginalExtension();
                $image->move(public_path().'/backend/ProductSubCategory/ProductSubCategoryImage/',$imageName);
                $data['image'] = $imageName;
            }



            if($banner)
            {
                $pathBanner = public_path().'/backend/ProductSubCategory/ProductSubCategoryBanner/'.$path->banner;
                if(file_exists($pathBanner))
                {
                    unlink($pathBanner);
                }
            }

            if($banner)
            {
                $bannerName = rand().'.'.$banner->getClientOriginalExtension();
                $banner->move(public_path().'/backend/ProductSubCategory/ProductSubCategoryBanner/',$bannerName);
                $data['banner'] = $bannerName;
            }
            ProductSubCategory::find($id)->update($data);
            $data = ProductSubCategory::find($id);
            //activity_log
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'update',
                'description' => 'Update Product Sub Category which name is '.$data->sub_category_name,
                'description_bn' => 'একটি পণ্য সাব ক্যাটাগরি আপডেট করেছেন যার নাম '.$data->sub_category_name,
            ]);
            History::create([
                'tag' => 'product_sub_category',
                'fk_id' => $id,
                'type' => 'update',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('product_sub_category.update_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            ProductSubCategory::find($id)->delete();
            $data = ProductSubCategory::withTrashed()->where('id',$id)->first();
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'destroy',
                'description' => 'Destroy Product Sub Category which name is '.$data->sub_category_name,
                'description_bn' => 'একটি পণ্য সাব ক্যাটাগরি ডিলেট করেছেন যার নাম '.$data->sub_category_name,
            ]);

            History::create([
                'tag' => 'product_sub_category',
                'fk_id' => $id,
                'type' => 'destroy',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('product_sub_category.delete_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function trash_list($datatable)
    {
        if($datatable == 1)
        {
            $data = ProductSubCategory::onlyTrashed()->get();
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
                if($row->category_id > 0)
                {
                    $category_name = ProductCategory::where('id',$row->category_id)->first();
                }
                else
                {
                    $category_name = '-';
                }

                if($row->category_id > 0)
                {
                    if(config('app.locale') == 'en')
                    {
                        return $category_name->category_name;
                    }
                    elseif(config('app.locale') == 'bn')
                    {
                        return $category_name->category_name_bn;
                    }
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
            ->addColumn('status',function($row){
                if(Auth::user()->can('Product Category status'))
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
                    <input onchange="return changeCategoryStatus('.$row->id.')" id="cbx-51-'.$row->id.'" type="checkbox" '.$checked.'>
                    <label class="toggle" for="cbx-51-'.$row->id.'">
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
                if(Auth::user()->can('Product Sub Category restore'))
                {
                    $restore_btn = '<a class="dropdown-item" href="'.route('product_sub_category.restore',$row->id).'"><i class="fa fa-trash-arrow-up"></i> '.__('common.restore').'</a>';
                }
                else
                {
                    $restore_btn = '';
                }

                if(Auth::user()->can('Product Sub Category delete'))
                {
                    $delete_btn = '<a onclick="return Sure()" class="dropdown-item text-danger" href="'.route('product_sub_category.delete',$row->id).'"><i class="fa fa-trash"></i> '.__('common.delete').'</a>';
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
            ->rawColumns(['action','item_name','serial','status'])
            ->make(true);

        }
        return ViewDirective::view($this->path,'trash_list');
    }

    public function restore($id)
    {
        try {
            ProductSubCategory::withTrashed()->where('id',$id)->restore();
            $data = ProductSubCategory::withTrashed()->where('id',$id)->first();
            //history
            History::create([
                'tag' => 'product_sub_category',
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
                'description' => 'Restore Product Sub Category which name is '.$data->sub_category_name,
                'description_bn' => 'একটি পণ্য সাব ক্যাটাগরি পুনুরুদ্ধার করেছেন যার নাম '.$data->sub_category_name,
            ]);
            toastr()->success(__('product_sub_category.restore_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $data = ProductSubCategory::withTrashed()->where('id',$id)->first();

            $pathImage = public_path().'/backend/ProductSubCategory/ProductSubCategoryImage/'.$data->image;
            if(file_exists($pathImage))
            {
                unlink($pathImage);
            }


            $pathBanner = public_path().'/backend/ProductSubCategory/ProductSubCategoryBanner/'.$data->banner;
            if(file_exists($pathBanner))
            {
                unlink($pathBanner);
            }
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'delete',
                'description' => 'Permenantly Delete Product Sub Category which name is '.$data->category_name,
                'description_bn' => 'একটি পণ্য সাব ক্যাটাগরি সম্পূর্ণ ডিলেট করেছেন যার নাম '.$data->category_name,
            ]);
            History::where('tag','product_sub_category')->where('fk_id',$id)->delete();
            ProductSubCategory::withTrashed()->where('id',$id)->forceDelete();
            toastr()->success(__('product_sub_category.delete_message'), __('common.success'), ['timeOut' => 5000]);
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
            $data = ProductSubCategory::withTrashed()->where('id',$id)->first();
            if($data->status == 1)
            {
                ProductSubCategory::withTrashed()->where('id',$id)->update([
                    'status' => 0,
                ]);
            }
            else
            {
                ProductSubCategory::withTrashed()->where('id',$id)->update([
                    'status' => 1,
                ]);
            }
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'status',
                'description' => 'Change Status Product Sub Category which name is '.$data->sub_category_name,
                'description_bn' => 'একটি পণ্য সাব ক্যাটাগরি স্ট্যাটাস পরিবর্তন করেছেন যার নাম '.$data->sub_category_name,
            ]);

            History::create([
                'tag' => 'product_sub_category',
                'fk_id' => $id,
                'type' => 'status',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('product_sub_category.status_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function GetCategorie($category_id)
    {
        $this->lang = config('app.locale');

        $data = ProductCategory::where('item_id',$category_id)->get();


        $output = '<option value="">'.__('common.select_one').'</option>';


        foreach($data as $v)
        {

            $output .= '<option value="'.$v->id.'">'.$v->category_name.'</option>';

        }
        return $output;
    }
}
