<?php
namespace App\Repositories;
use App\Interfaces\ProductCategoryInterface;
use App\Traits\ViewDirective;
use App\Models\ProductItem;
use App\Models\ProductCategory;
use App\Models\ActivityLog;
use Auth;
use App\Models\History;
use Yajra\DataTables\Facades\DataTables;

class ProductCategoryRepository implements ProductCategoryInterface{
    use ViewDirective;
    protected $path,$sl;
    public function __construct()
    {
        $this->path = 'admin.product_category';
    }
    public function index($datatable)
    {
        if($datatable == 1)
        {
            $data = ProductCategory::all();
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
                    return $row->category_name ?: $row->category_name_bn;
                }
                else
                {
                    return $row->category_name_bn ?: $row->category_name;
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
                if(Auth::user()->can('Product Category show'))
                {
                    $show_btn = '<a class="dropdown-item" href="'.route('product_category.show',$row->id).'"><i class="fa fa-eye"></i> '.__('common.show').'</a>';
                }
                else
                {
                    $show_btn ='';
                }

                if(Auth::user()->can('Product Category edit'))
                {
                    $edit_btn = '<a class="dropdown-item" href="'.route('product_category.edit',$row->id).'"><i class="fa fa-edit"></i> '.__('common.edit').'</a>';
                }
                else
                {
                    $edit_btn ='';
                }

                if(Auth::user()->can('Product Category destroy'))
                {
                    $delete_btn = '<form id="" method="post" action="'.route('product_category.destroy',$row->id).'">
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
            ->rawColumns(['action','item_name','category_name','serial','status'])
            ->make(true);

        }
        return ViewDirective::view($this->path,'index');
    }

    public function create()
    {
        $data['item'] = ProductItem::where('status',1)->get();
        return ViewDirective::view($this->path,'create',$data);
    }

    public function store($request)
    {
        try {
            $data = array(
                'sl' => $request->sl,
                'item_id' => $request->item_id,
                'category_name' => $request->category_name,
                'category_name_bn' => $request->category_name_bn,
                'status' => 1,
                'image'=>'0',
                'banner'=>'0',
            );

            $image = $request->file('image');
            $banner = $request->file('banner');

            if($image)
            {
                $imageName = rand().'.'.$image->getClientOriginalExtension();
                $image->move(public_path().'/backend/ProductCategory/ProductCategoryImage/',$imageName);
                $data['image'] = $imageName;
            }
            if($banner)
            {
                $bannerName = rand().'.'.$banner->getClientOriginalExtension();
                $banner->move(public_path().'/backend/ProductCategory/ProductCategoryBanner/',$bannerName);
                $data['banner'] = $bannerName;
            }

            ProductCategory::create($data);
            //activity_log
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'create',
                'description' => 'Create Product Category which name is '.$request->category_name,
                'description_bn' => 'একটি পণ্য ক্যাটাগরি তৈরি করেছেন যার নাম '.$request->category_name,
            ]);

            toastr()->success(__('product_category.create_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function show($id)
    {
        $data['histories'] = History::where('tag','product_category')->get();
        $data['data'] = ProductCategory::find($id);

        return ViewDirective::view($this->path,'show',$data);
    }

    public function properties($id){

    }

    public function edit($id)
    {
        $data['data'] = ProductCategory::find($id);
        $data['item'] = ProductItem::where('status',1)->get();
        return ViewDirective::view($this->path,'edit',$data);
    }

    public function update($request, $id)
    {
        try {
            $data = array(
                'item_id' => $request->item_id,
                'category_name' => $request->category_name,
                'category_name_bn' => $request->category_name_bn,
            );

            $image = $request->file('image');
            $banner = $request->file('banner');
            $path = ProductCategory::find($id);
            if($image)
            {
                $pathImage = public_path().'/backend/ProductCategory/ProductCategoryImage/'.$path->image;
                if(file_exists($pathImage))
                {
                    unlink($pathImage);
                }
            }

            if($image)
            {
                $imageName = rand().'.'.$image->getClientOriginalExtension();
                $image->move(public_path().'/backend/ProductCategory/ProductCategoryImage/',$imageName);
                $data['image'] = $imageName;
            }



            if($banner)
            {
                $pathBanner = public_path().'/backend/ProductCategory/ProductCategoryBanner/'.$path->banner;
                if(file_exists($pathBanner))
                {
                    unlink($pathBanner);
                }
            }

            if($banner)
            {
                $bannerName = rand().'.'.$banner->getClientOriginalExtension();
                $banner->move(public_path().'/backend/ProductCategory/ProductCategoryBanner/',$bannerName);
                $data['banner'] = $bannerName;
            }

            ProductCategory::find($id)->update($data);
            $data = ProductCategory::find($id);
            //activity_log
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'update',
                'description' => 'Update Product Category which name is '.$data->category_name,
                'description_bn' => 'একটি পণ্য ক্যাটাগরি আপডেট করেছেন যার নাম '.$data->category_name,
            ]);
            History::create([
                'tag' => 'product_category',
                'fk_id' => $id,
                'type' => 'update',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('product_category.update_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            ProductCategory::find($id)->delete();
            $data = ProductCategory::withTrashed()->where('id',$id)->first();
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'destroy',
                'description' => 'Destroy Product Category which name is '.$data->category_name,
                'description_bn' => 'একটি পণ্য ক্যাটাগরি ডিলেট করেছেন যার নাম '.$data->category_name,
            ]);

            History::create([
                'tag' => 'product_category',
                'fk_id' => $id,
                'type' => 'destroy',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('product_category.delete_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function trash_list($datatable)
    {
        if($datatable == 1)
        {
            $data = ProductCategory::onlyTrashed()->get();
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
                    return $row->category_name ?: $row->category_name_bn;
                }
                else
                {
                    return $row->category_name_bn ?: $row->category_name;
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
                if(Auth::user()->can('Product Category restore'))
                {
                    $restore_btn = '<a class="dropdown-item" href="'.route('product_category.restore',$row->id).'"><i class="fa fa-trash-arrow-up"></i> '.__('common.restore').'</a>';
                }
                else
                {
                    $restore_btn = '';
                }

                if(Auth::user()->can('Product Category delete'))
                {
                    $delete_btn = '<a onclick="return Sure()" class="dropdown-item text-danger" href="'.route('product_category.delete',$row->id).'"><i class="fa fa-trash"></i> '.__('common.delete').'</a>';
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
            ProductCategory::withTrashed()->where('id',$id)->restore();
            $data = ProductCategory::withTrashed()->where('id',$id)->first();
            //history
            History::create([
                'tag' => 'product_category',
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
                'description' => 'Restore Product Category which name is '.$data->category_name,
                'description_bn' => 'একটি পণ্য ক্যাটাগরি পুনুরুদ্ধার করেছেন যার নাম '.$data->category_name,
            ]);
            toastr()->success(__('product_category.restore_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $data = ProductCategory::withTrashed()->where('id',$id)->first();

            $pathImage = public_path().'/backend/ProductCategory/ProductCategoryImage/'.$data->image;
            if(file_exists($pathImage))
            {
                unlink($pathImage);
            }


            $pathBanner = public_path().'/backend/ProductCategory/ProductCategoryBanner/'.$data->banner;
            if(file_exists($pathBanner))
            {
                unlink($pathBanner);
            }

            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'delete',
                'description' => 'Permenantly Delete Product Category which name is '.$data->category_name,
                'description_bn' => 'একটি পণ্য ক্যাটাগরি সম্পূর্ণ ডিলেট করেছেন যার নাম '.$data->category_name,
            ]);
            History::where('tag','product_category')->where('fk_id',$id)->delete();
            ProductCategory::withTrashed()->where('id',$id)->forceDelete();
            toastr()->success(__('product_category.delete_message'), __('common.success'), ['timeOut' => 5000]);
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
            $data = ProductCategory::withTrashed()->where('id',$id)->first();
            if($data->status == 1)
            {
                ProductCategory::withTrashed()->where('id',$id)->update([
                    'status' => 0,
                ]);
            }
            else
            {
                ProductCategory::withTrashed()->where('id',$id)->update([
                    'status' => 1,
                ]);
            }
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'status',
                'description' => 'Change Status Product Category which name is '.$data->category_name,
                'description_bn' => 'একটি পণ্য ক্যাটাগরি স্ট্যাটাস পরিবর্তন করেছেন যার নাম '.$data->category_name,
            ]);

            History::create([
                'tag' => 'product_category',
                'fk_id' => $id,
                'type' => 'status',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('product_category.status_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }
}
