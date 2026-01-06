<?php
namespace App\Repositories;
use App\Interfaces\VendorInterface;
use App\Traits\ViewDirective;
use App\Models\Country;
use App\Models\Vendor;
use Auth;
use Hash;
use App\Models\History;
use App\Models\ActivityLog;
use Yajra\DataTables\Facades\DataTables;

class VendorRepository implements VendorInterface{

    use ViewDirective;
    protected $path,$sl;

    public function __construct()
    {
        $this->path = 'admin.vendor';
    }

    public function index($datatable)
    {
        if($datatable == 1)
        {
            $data = Vendor::all();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('serial',function($row){
                return $this->sl = $this->sl +1;
            })
            ->addColumn('country_name',function($row){
                if(config('app.locale') == 'en')
                {
                    return $row->country->country_name ?: $row->country->country_name_bn;
                }
                else
                {
                    return $row->country->country_name_bn ?: $row->country->country_name;
                }
            })
            ->addColumn('vendor_name',function($row){
                if(config('app.locale') == 'en')
                {
                    return $row->vendor_name ?: $row->vendor_name_bn;
                }
                else
                {
                    return $row->vendor_name_bn ?: $row->vendor_name;
                }
            })
            ->addColumn('vendor_phone',function($row){
                
                return $row->vendor_phone;

            })
            ->addColumn('company_name',function($row){
                if(config('app.locale') == 'en')
                {
                    return $row->company_name ?: $row->company_name_bn;
                }
                else
                {
                    return $row->company_name_bn ?: $row->company_name;
                }
            })
            ->addColumn('company_phone',function($row){
                
                return $row->company_phone;

            })
            ->addColumn('status',function($row){
                if(Auth::user()->can('Vendor status'))
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
                    <input onchange="return changeVendorStatus('.$row->id.')" id="cbx-51-'.$row->id.'" type="checkbox" '.$checked.'>
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
                if(Auth::user()->can('Vendor show'))
                {
                    $show_btn = '<a class="dropdown-item" href="'.route('vendor.show',$row->id).'"><i class="fa fa-eye"></i> '.__('common.show').'</a>';
                }
                else
                {
                    $show_btn ='';
                }

                if(Auth::user()->can('Vendor edit'))
                {
                    $edit_btn = '<a class="dropdown-item" href="'.route('vendor.edit',$row->id).'"><i class="fa fa-edit"></i> '.__('common.edit').'</a>';
                }
                else
                {
                    $edit_btn ='';
                }

                if(Auth::user()->can('Vendor destroy'))
                {
                    $delete_btn = '<form id="" method="post" action="'.route('vendor.destroy',$row->id).'">
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
            ->rawColumns(['action','country_name','vendor_name','company_name','sl','status'])
            ->make(true);

        }
        return ViewDirective::view($this->path,'index');
    }

    public function create()
    {
        $data['country'] = Country::where('status',1)->get();
        return ViewDirective::view($this->path,'create',$data);
    }

    public function store($request)
    {
        try {
            $data = array(
                'sl' => $request->sl,
                'vendor_id' => 1,
                'country_id' => $request->country_id,
                'vendor_name' => $request->vendor_name,
                'vendor_name_bn' => $request->vendor_name_bn,
                'vendor_phone' => $request->vendor_phone,
                'company_name' => $request->company_name,
                'company_name_bn' => $request->company_name_bn,
                'company_phone' => $request->company_phone,
                'email' => $request->email,
                'nid' => $request->nid,
                'address' => $request->address,
                'status' => 1,
                'image' => '0',
                'banner' => '0',
                'password' => Hash::make($request->password),
                'raw_password' => $request->password,
            );

            $image = $request->file('image');
            $banner = $request->file('banner');

            if($image)
            {
                $imageName = rand().'.'.$image->getClientOriginalExtension();
                $image->move(public_path().'/backend/Vendor/VendorImage/',$imageName);
                $data['image'] = $imageName;
            }
            if($banner)
            {
                $bannerName = rand().'.'.$banner->getClientOriginalExtension();
                $banner->move(public_path().'/backend/Vendor/VendorBanner/',$bannerName);
                $data['banner'] = $bannerName;
            }

            Vendor::create($data);
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'create',
                'description' => 'Create Vendor Information which name is '.$request->vendor_name,
                'description_bn' => 'একটি ভেন্ডর ইনফরমেশন তৈরি করেছেন যার নাম '.$request->vendor_name,
            ]);

            toastr()->success(__('vendor.create_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function show($id)
    {
        $data['histories'] = History::where('tag','vendor')->get();
        $data['data'] = Vendor::find($id);

        return ViewDirective::view($this->path,'show',$data);
    }

    public function properties($id){

    }

    public function edit($id)
    {
        $data['data'] = Vendor::find($id);
        $data['country'] = Country::where('status',1)->get();
        return ViewDirective::view($this->path,'edit',$data);
    }

    public function update($request, $id)
    {
        try {
            $data = array(
                'sl' => $request->sl,
                'vendor_id' => 1,
                'country_id' => $request->country_id,
                'vendor_name' => $request->vendor_name,
                'vendor_name_bn' => $request->vendor_name_bn,
                'vendor_phone' => $request->vendor_phone,
                'company_name' => $request->company_name,
                'company_name_bn' => $request->company_name_bn,
                'company_phone' => $request->company_phone,
                'email' => $request->email,
                'nid' => $request->nid,
                'address' => $request->address,
            );

            $image = $request->file('image');
            $banner = $request->file('banner');
            $path = Vendor::find($id);
            if($image)
            {
                $pathImage = public_path().'/backend/Vendor/VendorImage/'.$path->image;
                if(file_exists($pathImage))
                {
                    unlink($pathImage);
                }
            }

            if($image)
            {
                $imageName = rand().'.'.$image->getClientOriginalExtension();
                $image->move(public_path().'/backend/Vendor/VendorImage/',$imageName);
                $data['image'] = $imageName;
            }



            if($banner)
            {
                $pathBanner = public_path().'/backend/Vendor/VendorBanner/'.$path->banner;
                if(file_exists($pathBanner))
                {
                    unlink($pathBanner);
                }
            }

            if($banner)
            {
                $bannerName = rand().'.'.$banner->getClientOriginalExtension();
                $banner->move(public_path().'/backend/Vendor/VendorBanner/',$bannerName);
                $data['banner'] = $bannerName;
            }

            Vendor::find($id)->update($data);
            $data = Vendor::find($id);
            //activity_log
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'update',
                'description' => 'Update Vendor Information which name is '.$data->vendor_name,
                'description_bn' => 'একটি ভেন্ডর ইনফরমেশন আপডেট করেছেন যার নাম '.$data->vendor_name,
            ]);
            History::create([
                'tag' => 'vendor',
                'fk_id' => $id,
                'type' => 'update',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('vendor.update_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            Vendor::find($id)->delete();
            $data = Vendor::withTrashed()->where('id',$id)->first();
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'destroy',
                'description' => 'Destroy Vendor Information which name is '.$data->vendor_name,
                'description_bn' => 'একটি ভেন্ডর ইনফরমেশন ডিলেট করেছেন যার নাম '.$data->vendor_name,
            ]);

            History::create([
                'tag' => 'vendor',
                'fk_id' => $id,
                'type' => 'destroy',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('vendor.delete_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function trash_list($datatable)
    {
        if($datatable == 1)
        {
            $data = Vendor::onlyTrashed()->get();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('serial',function($row){
                return $this->sl = $this->sl +1;
            })
            ->addColumn('country_name',function($row){
                if(config('app.locale') == 'en')
                {
                    return $row->country->country_name ?: $row->country->country_name_bn;
                }
                else
                {
                    return $row->country->country_name_bn ?: $row->country->country_name;
                }
            })
            ->addColumn('vendor_name',function($row){
                if(config('app.locale') == 'en')
                {
                    return $row->vendor_name ?: $row->vendor_name_bn;
                }
                else
                {
                    return $row->vendor_name_bn ?: $row->vendor_name;
                }
            })
            ->addColumn('vendor_phone',function($row){
                
                return $row->vendor_phone;

            })
            ->addColumn('company_name',function($row){
                if(config('app.locale') == 'en')
                {
                    return $row->company_name ?: $row->company_name_bn;
                }
                else
                {
                    return $row->company_name_bn ?: $row->company_name;
                }
            })
            ->addColumn('company_phone',function($row){
                
                return $row->company_phone;

            })
            ->addColumn('status',function($row){
                if(Auth::user()->can('Vendor status'))
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
                    <input onchange="return changeVendorStatus('.$row->id.')" id="cbx-51-'.$row->id.'" type="checkbox" '.$checked.'>
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
                if(Auth::user()->can('Vendor restore'))
                {
                    $restore_btn = '<a class="dropdown-item" href="'.route('vendor.restore',$row->id).'"><i class="fa fa-trash-arrow-up"></i> '.__('common.restore').'</a>';
                }
                else
                {
                    $restore_btn = '';
                }

                if(Auth::user()->can('Vendor delete'))
                {
                    $delete_btn = '<a onclick="return Sure()" class="dropdown-item text-danger" href="'.route('vendor.delete',$row->id).'"><i class="fa fa-trash"></i> '.__('common.delete').'</a>';
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
            ->rawColumns(['action','country_name','vendor_name','company_name','sl','status'])
            ->make(true);

        }
        return ViewDirective::view($this->path,'trash_list');
    }

    public function restore($id)
    {
        try {
            Vendor::withTrashed()->where('id',$id)->restore();
            $data = Vendor::withTrashed()->where('id',$id)->first();
            //history
            History::create([
                'tag' => 'vendor',
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
                'description' => 'Restore Vendor Information which name is '.$data->vendor_name,
                'description_bn' => 'একটি ভেন্ডর ইনফরমেশন পুনুরুদ্ধার করেছেন যার নাম '.$data->vendor_name,
            ]);
            toastr()->success(__('vendor.restore_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $data = Vendor::withTrashed()->where('id',$id)->first();

            $pathImage = public_path().'/backend/Vendor/VendorImage/'.$data->image;
            if(file_exists($pathImage))
            {
                unlink($pathImage);
            }


            $pathBanner = public_path().'/backend/Vendor/VendorBanner/'.$data->banner;
            if(file_exists($pathBanner))
            {
                unlink($pathBanner);
            }

            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'delete',
                'description' => 'Permenantly Delete Vendor Information which name is '.$data->category_name,
                'description_bn' => 'একটি ভেন্ডর ইনফরমেশন সম্পূর্ণ ডিলেট করেছেন যার নাম '.$data->category_name,
            ]);
            History::where('tag','vendor')->where('fk_id',$id)->delete();
            Vendor::withTrashed()->where('id',$id)->forceDelete();
            toastr()->success(__('vendor.delete_message'), __('common.success'), ['timeOut' => 5000]);
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
            $data = Vendor::withTrashed()->where('id',$id)->first();
            if($data->status == 1)
            {
                Vendor::withTrashed()->where('id',$id)->update([
                    'status' => 0,
                ]);
            }
            else
            {
                Vendor::withTrashed()->where('id',$id)->update([
                    'status' => 1,
                ]);
            }
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'status',
                'description' => 'Change Status Vendor which name is '.$data->vendor_name,
                'description_bn' => 'একটি ভেন্ডর স্ট্যাটাস পরিবর্তন করেছেন যার নাম '.$data->vendor_name,
            ]);

            History::create([
                'tag' => 'vendor',
                'fk_id' => $id,
                'type' => 'status',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('vendor.status_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }
}
        