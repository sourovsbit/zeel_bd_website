<?php
namespace App\Repositories;
use App\Interfaces\ProductItemInterface;
use App\Traits\ViewDirective;
use App\Models\ProductItem;
use Auth;
use App\Models\History;
use App\Models\ActivityLog;
use Yajra\DataTables\Facades\DataTables;

class ProductItemRepository implements ProductItemInterface{

    use ViewDirective;
    protected $path,$sl;

    public function __construct()
    {
        $this->path = 'admin.product_item';
    }

    public function index($datatable)
    {
        if($datatable == 1)
        {
            $data = ProductItem::all();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('serial',function($row){
                return $this->sl = $this->sl +1;
            })
            ->addColumn('name',function($row){
                if(config('app.locale') == 'en')
                {
                    return $row->item_name ?: $row->item_name_bn;
                }
                else
                {
                    return $row->item_name_bn ?: $row->item_name;
                }
            })
            ->addColumn('status',function($row){
                if(Auth::user()->can('Product Item status'))
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
                    <input onchange="return changeItemStatus('.$row->id.')" id="cbx-51-'.$row->id.'" type="checkbox" '.$checked.'>
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
                if(Auth::user()->can('Product Item show'))
                {
                    $show_btn = '<a class="dropdown-item" href="'.route('product_item.show',$row->id).'"><i class="fa fa-eye"></i> '.__('common.show').'</a>';
                }
                else
                {
                    $show_btn ='';
                }

                if(Auth::user()->can('Product Item edit'))
                {
                    $edit_btn = '<a class="dropdown-item" href="'.route('product_item.edit',$row->id).'"><i class="fa fa-edit"></i> '.__('common.edit').'</a>';
                }
                else
                {
                    $edit_btn ='';
                }

                if(Auth::user()->can('Product Item destroy'))
                {
                    $delete_btn = '<form id="" method="post" action="'.route('product_item.destroy',$row->id).'">
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
            ->rawColumns(['action','item_name','serial','status'])
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
                'item_name' => $request->item_name,
                'item_name_bn' => $request->item_name_bn,
                'status' => 1,
                'image' => '0',
                'banner' => '0',
            );

            $image = $request->file('image');
            $banner = $request->file('banner');
            if($image)
            {
                $imageName = rand().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('/backend/ProductItem/ProductItemImage/'),$imageName);
                $data['image'] = $imageName;
            }
            if($banner)
            {
                $bannerName = rand().'.'.$banner->getClientOriginalExtension();
                $banner->move(public_path('/backend/ProductItem/ProductItemBanner/'),$bannerName);
                $data['banner'] = $bannerName;
            }

            ProductItem::create($data);
            //activity_log
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'create',
                'description' => 'Create Product Item which name is '.$request->item_name,
                'description_bn' => 'একটি পণ্য আইটেম তৈরি করেছেন যার নাম '.$request->item_name,
            ]);

            toastr()->success(__('product_item.create_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function show($id)
    {
        $data['data'] = ProductItem::find($id);
        $data['histories'] = History::where('tag','product_item')->where('fk_id',$id)->get();
        return ViewDirective::view($this->path,'show',$data);
    }

    public function properties($id){

    }

    public function edit($id)
    {
        $data['data'] = ProductItem::find($id);
        return ViewDirective::view($this->path,'edit',$data);
    }

    public function update($request, $id)
    {
        try {
            $data = array(
                'item_name' => $request->item_name,
                'item_name_bn' => $request->item_name_bn,
                'sl' => $request->sl,
            );


            $image = $request->file('image');
            $banner = $request->file('banner');
            $pathImage = ProductItem::find($id);

            if($image)
            {
                $path = public_path().'/backend/ProductItem/ProductItemImage/'.$pathImage->image;
                if(file_exists($path))
                {
                    unlink($path);
                }
            }

            if($image)
            {
                $imageName = rand().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('/backend/ProductItem/ProductItemImage/'),$imageName);
                $data['image'] = $imageName;
            }


            if($banner)
            {
                $banner = public_path().'/backend/ProductItem/ProductItemBanner/'.$pathImage->banner;
                if(file_exists($banner))
                {
                    unlink($banner);
                }
            }


            if($banner)
            {
                $bannerName = rand().'.'.$banner->getClientOriginalExtension();
                $banner->move(public_path('/backend/ProductItem/ProductItemBanner/'),$bannerName);
                $data['banner'] = $bannerName;
            }


            ProductItem::find($id)->update($data);
            $data = ProductItem::find($id);
            //activity_log
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'update',
                'description' => 'Update Product Item which name is '.$data->item_name,
                'description_bn' => 'একটি পণ্য আইটেম আপডেট করেছেন যার নাম '.$data->item_name,
            ]);
            History::create([
                'tag' => 'product_item',
                'fk_id' => $id,
                'type' => 'update',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('product_item.update_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            ProductItem::find($id)->delete();
            $data = ProductItem::withTrashed()->where('id',$id)->first();
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'destroy',
                'description' => 'Destroy Product Item which name is '.$data->item_name,
                'description_bn' => 'একটি পণ্য আইটেম ডিলেট করেছেন যার নাম '.$data->item_name,
            ]);

            History::create([
                'tag' => 'product_item',
                'fk_id' => $id,
                'type' => 'destroy',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('product_item.delete_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function trash_list($datatable)
    {
        if($datatable == 1)
        {
            $data = ProductItem::onlyTrashed()->get();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('serial',function($row){
                return $this->sl = $this->sl +1;
            })
            ->addColumn('name',function($row){
                if(config('app.locale') == 'en')
                {
                    return $row->item_name ?: $row->item_name_bn;
                }
                else
                {
                    return $row->item_name_bn ?: $row->item_name;
                }
            })
            ->addColumn('status',function($row){
                if(Auth::user()->can('Product Item status'))
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
                    <input onchange="return changeItemStatus('.$row->id.')" id="cbx-51-'.$row->id.'" type="checkbox" '.$checked.'>
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
                if(Auth::user()->can('Product Item restore'))
                {
                    $restore_btn = '<a class="dropdown-item" href="'.route('product_item.restore',$row->id).'"><i class="fa fa-trash-arrow-up"></i> '.__('common.restore').'</a>';
                }
                else
                {
                    $restore_btn = '';
                }

                if(Auth::user()->can('Product Item delete'))
                {
                    $delete_btn = '<a onclick="return Sure()" class="dropdown-item text-danger" href="'.route('product_item.delete',$row->id).'"><i class="fa fa-trash"></i> '.__('common.delete').'</a>';
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
            ProductItem::withTrashed()->where('id',$id)->restore();
            $data = ProductItem::withTrashed()->where('id',$id)->first();
            //history
            History::create([
                'tag' => 'product_item',
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
                'description' => 'Restore Product Item which name is '.$data->item_name,
                'description_bn' => 'একটি পণ্য আইটেম পুনুরুদ্ধার করেছেন যার নাম '.$data->item_name,
            ]);
            toastr()->success(__('product_item.restore_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $data = ProductItem::withTrashed()->where('id',$id)->first();

            $path = public_path().'/backend/ProductItem/ProductItemImage/'.$data->image;
            if(file_exists($path))
            {
                unlink($path);
            }
            $banner = public_path().'/backend/ProductItem/ProductItemBanner/'.$data->banner;
            if(file_exists($banner))
            {
                unlink($path);
            }

            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'delete',
                'description' => 'Permenantly Delete Product Item which name is '.$data->item_name,
                'description_bn' => 'একটি পণ্য আইটেম সম্পূর্ণ ডিলেট করেছেন যার নাম '.$data->item_name,
            ]);
            History::where('tag','product_item')->where('fk_id',$id)->delete();
            ProductItem::withTrashed()->where('id',$id)->forceDelete();
            toastr()->success(__('product_item.delete_message'), __('common.success'), ['timeOut' => 5000]);
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
            $data = ProductItem::withTrashed()->where('id',$id)->first();
            if($data->status == 1)
            {
                ProductItem::withTrashed()->where('id',$id)->update([
                    'status' => 0,
                ]);
            }
            else
            {
                ProductItem::withTrashed()->where('id',$id)->update([
                    'status' => 1,
                ]);
            }
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'status',
                'description' => 'Change Status Product Item which name is '.$data->item_name,
                'description_bn' => 'একটি পণ্য আইটেম স্ট্যাটাস পরিবর্তন করেছেন যার নাম '.$data->item_name,
            ]);

            History::create([
                'tag' => 'product_item',
                'fk_id' => $id,
                'type' => 'status',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('product_item.status_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }
}
