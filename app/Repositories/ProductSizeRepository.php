<?php
namespace App\Repositories;

use App\Interfaces\ProductSizeInterface;
use App\Traits\ViewDirective;
use App\Models\ProductSize;
use Auth;
use App\Models\History;
use App\Models\ActivityLog;
use Yajra\DataTables\Facades\DataTables;

class ProductSizeRepository implements ProductSizeInterface{

    use ViewDirective;
    protected $path,$sl;

    public function __construct()
    {
        $this->path = 'admin.product_size';
    }

    public function index($datatable)
    {
        if($datatable == 1)
        {
            $data = ProductSize::all();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('serial',function($row){
                return $this->sl = $this->sl +1;
            })
            ->addColumn('name',function($row){
                if(config('app.locale') == 'en')
                {
                    return $row->size_name ?: $row->size_name_bn;
                }
                else
                {
                    return $row->size_name_bn ?: $row->size_name;
                }
            })
            ->addColumn('status',function($row){
                if(Auth::user()->can('Product Size status'))
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
                    <input onchange="return changeSizeStatus('.$row->id.')" id="cbx-51-'.$row->id.'" type="checkbox" '.$checked.'>
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
                if(Auth::user()->can('Product Size show'))
                {
                    $show_btn = '<a class="dropdown-item" href="'.route('product_size.show',$row->id).'"><i class="fa fa-eye"></i> '.__('common.show').'</a>';
                }
                else
                {
                    $show_btn ='';
                }

                if(Auth::user()->can('Product Size edit'))
                {
                    $edit_btn = '<a class="dropdown-item" href="'.route('product_size.edit',$row->id).'"><i class="fa fa-edit"></i> '.__('common.edit').'</a>';
                }
                else
                {
                    $edit_btn ='';
                }

                if(Auth::user()->can('Product Size destroy'))
                {
                    $delete_btn = '<form id="" method="post" action="'.route('product_size.destroy',$row->id).'">
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
            ->rawColumns(['action','size_name','serial','status'])
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
                'size_name' => $request->size_name,
                'size_name_bn' => $request->size_name_bn,
                'status' => 1,
            );

            ProductSize::create($data);
            //activity_log
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'create',
                'description' => 'Create Product Size which name is '.$request->size_name,
                'description_bn' => 'একটি পণ্য সাইজ তৈরি করেছেন যার নাম '.$request->size_name,
            ]);

            toastr()->success(__('product_size.create_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function show($id)
    {
        $data['data'] = ProductSize::find($id);
        $data['histories'] = History::where('tag','product_size')->where('fk_id',$id)->get();
        return ViewDirective::view($this->path,'show',$data);
    }

    public function properties($id){

    }

    public function edit($id)
    {
        $data['data'] = ProductSize::find($id);
        return ViewDirective::view($this->path,'edit',$data);
    }

    public function update($request, $id)
    {
        try {
            $data = array(
                'size_name' => $request->size_name,
                'size_name_bn' => $request->size_name_bn,
                'sl' => $request->sl,
            );

            ProductSize::find($id)->update($data);
            $data = ProductSize::find($id);
            //activity_log
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'update',
                'description' => 'Update Product Size which name is '.$data->size_name,
                'description_bn' => 'একটি পণ্য সাইজ আপডেট করেছেন যার নাম '.$data->size_name,
            ]);
            History::create([
                'tag' => 'product_size',
                'fk_id' => $id,
                'type' => 'update',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('product_size.update_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            ProductSize::find($id)->delete();
            $data = ProductSize::withTrashed()->where('id',$id)->first();
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'destroy',
                'description' => 'Destroy Product Size which name is '.$data->size_name,
                'description_bn' => 'একটি পণ্য সাইজ ডিলেট করেছেন যার নাম '.$data->size_name,
            ]);

            History::create([
                'tag' => 'product_size',
                'fk_id' => $id,
                'type' => 'destroy',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('product_size.delete_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function trash_list($datatable)
    {
        if($datatable == 1)
        {
            $data = ProductSize::onlyTrashed()->get();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('serial',function($row){
                return $this->sl = $this->sl +1;
            })
            ->addColumn('name',function($row){
                if(config('app.locale') == 'en')
                {
                    return $row->size_name ?: $row->size_name_bn;
                }
                else
                {
                    return $row->size_name_bn ?: $row->size_name;
                }
            })
            ->addColumn('status',function($row){
                if(Auth::user()->can('Product Size status'))
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
                    <input onchange="return changeSizeStatus('.$row->id.')" id="cbx-51-'.$row->id.'" type="checkbox" '.$checked.'>
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
                if(Auth::user()->can('Product Size restore'))
                {
                    $restore_btn = '<a class="dropdown-item" href="'.route('product_size.restore',$row->id).'"><i class="fa fa-trash-arrow-up"></i> '.__('common.restore').'</a>';
                }
                else
                {
                    $restore_btn = '';
                }

                if(Auth::user()->can('Product Size delete'))
                {
                    $delete_btn = '<a onclick="return Sure()" class="dropdown-item text-danger" href="'.route('product_size.delete',$row->id).'"><i class="fa fa-trash"></i> '.__('common.delete').'</a>';
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
            ->rawColumns(['action','size_name','serial','status'])
            ->make(true);

        }
        return ViewDirective::view($this->path,'trash_list');
    }

    public function restore($id)
    {
        try {
            ProductSize::withTrashed()->where('id',$id)->restore();
            $data = ProductSize::withTrashed()->where('id',$id)->first();
            //history
            History::create([
                'tag' => 'product_size',
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
                'description' => 'Restore Product Size which name is '.$data->size_name,
                'description_bn' => 'একটি পণ্য কালার পুনুরুদ্ধার করেছেন যার নাম '.$data->size_name,
            ]);
            toastr()->success(__('product_size.restore_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $data = ProductSize::withTrashed()->where('id',$id)->first();

            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'delete',
                'description' => 'Permenantly Delete Product Size which name is '.$data->size_name,
                'description_bn' => 'একটি পণ্য সাইজ সম্পূর্ণ ডিলেট করেছেন যার নাম '.$data->size_name,
            ]);
            History::where('tag','product_size')->where('fk_id',$id)->delete();
            ProductSize::withTrashed()->where('id',$id)->forceDelete();
            toastr()->success(__('product_size.delete_message'), __('common.success'), ['timeOut' => 5000]);
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
            $data = ProductSize::withTrashed()->where('id',$id)->first();
            if($data->status == 1)
            {
                ProductSize::withTrashed()->where('id',$id)->update([
                    'status' => 0,
                ]);
            }
            else
            {
                ProductSize::withTrashed()->where('id',$id)->update([
                    'status' => 1,
                ]);
            }
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'status',
                'description' => 'Change Status Product Size which name is '.$data->size_name,
                'description_bn' => 'একটি পণ্য সাইজ স্ট্যাটাস পরিবর্তন করেছেন যার নাম '.$data->size_name,
            ]);

            History::create([
                'tag' => 'product_size',
                'fk_id' => $id,
                'type' => 'status',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('product_size.status_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }
}
