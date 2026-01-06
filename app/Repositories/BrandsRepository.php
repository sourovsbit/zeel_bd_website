<?php
namespace App\Repositories;
use App\Interfaces\BrandsInterface;
use App\Traits\ViewDirective;
use App\Models\ProductBrands;
use Auth;
use App\Models\History;
use App\Models\ActivityLog;
use Yajra\DataTables\Facades\DataTables;
        
class BrandsRepository implements BrandsInterface{
    
    use ViewDirective;
    protected $path,$sl;

    public function __construct()
    {
        $this->path = 'admin.product_brands';
    }

    public function index($datatable)
    {
        if($datatable == 1)
        {
            $data = ProductBrands::all();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('serial',function($row){
                return $this->sl = $this->sl +1;
            })
            ->addColumn('name',function($row){
                if(config('app.locale') == 'en')
                {
                    return $row->brand_name ?: $row->brand_name_bn;
                }
                else
                {
                    return $row->brand_name_bn ?: $row->brand_name;
                }
            })
            ->addColumn('status',function($row){
                if(Auth::user()->can('Product Brand status'))
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
                    <input onchange="return changeBrandsStatus('.$row->id.')" id="cbx-51-'.$row->id.'" type="checkbox" '.$checked.'>
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
                if(Auth::user()->can('Product Brand show'))
                {
                    $show_btn = '<a class="dropdown-item" href="'.route('product_brands.show',$row->id).'"><i class="fa fa-eye"></i> '.__('common.show').'</a>';
                }
                else
                {
                    $show_btn ='';
                }

                if(Auth::user()->can('Product Brand edit'))
                {
                    $edit_btn = '<a class="dropdown-item" href="'.route('product_brands.edit',$row->id).'"><i class="fa fa-edit"></i> '.__('common.edit').'</a>';
                }
                else
                {
                    $edit_btn ='';
                }

                if(Auth::user()->can('Product Brand destroy'))
                {
                    $delete_btn = '<form id="" method="post" action="'.route('product_brands.destroy',$row->id).'">
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
            ->rawColumns(['action','brand_name','serial','status'])
            ->make(true);

        }
        return ViewDirective::view($this->path,'index');
    }

    public function create()
    {
        return ViewDirective::view($this->path,'create');
    }

    public function store($request)
    {
        try {
            $data = array(
                'sl' => $request->sl,
                'brand_name' => $request->brand_name,
                'brand_name_bn' => $request->brand_name_bn,
                'status' => 1,
                'image' => '0',
                'banner' => '0',
            );

            $image = $request->file('image');
            $banner = $request->file('banner');
            if($image)
            {
                $imageName = rand().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('/backend/ProductBrands/ProductBrandsImage/'),$imageName);
                $data['image'] = $imageName;
            }
            if($banner)
            {
                $bannerName = rand().'.'.$banner->getClientOriginalExtension();
                $banner->move(public_path('/backend/ProductBrands/ProductBrandsBanner/'),$bannerName);
                $data['banner'] = $bannerName;
            }

            ProductBrands::create($data);
            //activity_log
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'create',
                'description' => 'Create Product Brand which name is '.$request->brand_name,
                'description_bn' => 'একটি পণ্য ব্র্যান্ড তৈরি করেছেন যার নাম '.$request->brand_name,
            ]);

            toastr()->success(__('product_brands.create_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function show($id)
    {
        $data['data'] = ProductBrands::find($id);
        $data['histories'] = History::where('tag','product_brands')->where('fk_id',$id)->get();
        return ViewDirective::view($this->path,'show',$data);
    }

    public function properties($id)
    {

    }

    public function edit($id)
    {
        $data['data'] = ProductBrands::find($id);
        return ViewDirective::view($this->path,'edit',$data);
    }

    public function update($request, $id)
    {
        try {
            $data = array(
                'brand_name' => $request->brand_name,
                'brand_name_bn' => $request->brand_name_bn,
                'sl' => $request->sl,
            );


            $image = $request->file('image');
            $banner = $request->file('banner');
            $pathImage = ProductBrands::find($id);

            if($image)
            {
                $path = public_path().'/backend/ProductBrands/ProductBrandsImage/'.$pathImage->image;
                if(file_exists($path))
                {
                    unlink($path);
                }
            }

            if($image)
            {
                $imageName = rand().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('/backend/ProductBrands/ProductBrandsImage/'),$imageName);
                $data['image'] = $imageName;
            }


            if($banner)
            {
                $banner = public_path().'/backend/ProductBrands/ProductBrandsBanner/'.$pathImage->banner;
                if(file_exists($banner))
                {
                    unlink($banner);
                }
            }


            if($banner)
            {
                $bannerName = rand().'.'.$banner->getClientOriginalExtension();
                $banner->move(public_path('/backend/ProductBrands/ProductBrandsBanner/'),$bannerName);
                $data['banner'] = $bannerName;
            }


            ProductBrands::find($id)->update($data);
            $data = ProductBrands::find($id);
            //activity_log
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'update',
                'description' => 'Update Product Brand which name is '.$data->brand_name,
                'description_bn' => 'একটি পণ্য ব্র্যান্ড আপডেট করেছেন যার নাম '.$data->brand_name,
            ]);
            History::create([
                'tag' => 'product_brands',
                'fk_id' => $id,
                'type' => 'update',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('product_brands.update_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            ProductBrands::find($id)->delete();
            $data = ProductBrands::withTrashed()->where('id',$id)->first();
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'destroy',
                'description' => 'Destroy Product Brand which name is '.$data->brand_name,
                'description_bn' => 'একটি পণ্য ব্র্যান্ড ডিলেট করেছেন যার নাম '.$data->brand_name,
            ]);

            History::create([
                'tag' => 'product_brands',
                'fk_id' => $id,
                'type' => 'destroy',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('product_brands.delete_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function trash_list($datatable)
    {
        if($datatable == 1)
        {
            $data = ProductBrands::onlyTrashed()->get();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('serial',function($row){
                return $this->sl = $this->sl +1;
            })
            ->addColumn('brand_name',function($row){
                if(config('app.locale') == 'en')
                {
                    return $row->brand_name ?: $row->brand_name_bn;
                }
                else
                {
                    return $row->brand_name_bn ?: $row->brand_name;
                }
            })
            ->addColumn('status',function($row){
                if(Auth::user()->can('Product Brand status'))
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
                    <input onchange="return changeBrandsStatus('.$row->id.')" id="cbx-51-'.$row->id.'" type="checkbox" '.$checked.'>
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
                if(Auth::user()->can('Product Brand restore'))
                {
                    $restore_btn = '<a class="dropdown-item" href="'.route('product_brands.restore',$row->id).'"><i class="fa fa-trash-arrow-up"></i> '.__('common.restore').'</a>';
                }
                else
                {
                    $restore_btn = '';
                }

                if(Auth::user()->can('Product Brand delete'))
                {
                    $delete_btn = '<a onclick="return Sure()" class="dropdown-item text-danger" href="'.route('product_brands.delete',$row->id).'"><i class="fa fa-trash"></i> '.__('common.delete').'</a>';
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
            ->rawColumns(['action','brand_name','serial','status'])
            ->make(true);

        }
        return ViewDirective::view($this->path,'trash_list');
    }

    public function restore($id)
    {
        try {
            ProductBrands::withTrashed()->where('id',$id)->restore();
            $data = ProductBrands::withTrashed()->where('id',$id)->first();
            //history
            History::create([
                'tag' => 'product_brands',
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
                'description' => 'Restore Product Brand which name is '.$data->brand_name,
                'description_bn' => 'একটি পণ্য ব্র্যান্ড পুনুরুদ্ধার করেছেন যার নাম '.$data->brand_name,
            ]);
            toastr()->success(__('product_brands.restore_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $data = ProductBrands::withTrashed()->where('id',$id)->first();

            $path = public_path().'/backend/ProductBrands/ProductBrandsImage/'.$data->image;
            if(file_exists($path))
            {
                unlink($path);
            }
            $banner = public_path().'/backend/ProductBrands/ProductBrandsBanner/'.$data->banner;
            if(file_exists($banner))
            {
                unlink($path);
            }

            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'delete',
                'description' => 'Permenantly Delete Product Brand which name is '.$data->brand_name,
                'description_bn' => 'একটি পণ্য ব্র্যান্ড সম্পূর্ণ ডিলেট করেছেন যার নাম '.$data->brand_name,
            ]);
            History::where('tag','product_brands')->where('fk_id',$id)->delete();
            ProductBrands::withTrashed()->where('id',$id)->forceDelete();
            toastr()->success(__('product_brands.delete_message'), __('common.success'), ['timeOut' => 5000]);
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
            $data = ProductBrands::withTrashed()->where('id',$id)->first();
            if($data->status == 1)
            {
                ProductBrands::withTrashed()->where('id',$id)->update([
                    'status' => 0,
                ]);
            }
            else
            {
                ProductBrands::withTrashed()->where('id',$id)->update([
                    'status' => 1,
                ]);
            }
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'status',
                'description' => 'Change Status Product Brand which name is '.$data->brand_name,
                'description_bn' => 'একটি পণ্য ব্র্যান্ড স্ট্যাটাস পরিবর্তন করেছেন যার নাম '.$data->brand_name,
            ]);

            History::create([
                'tag' => 'product_brands',
                'fk_id' => $id,
                'type' => 'status',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('product_brands.status_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }
}
        