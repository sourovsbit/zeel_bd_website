<?php
namespace App\Repositories;
use App\Interfaces\ServiceInterface;
use App\Traits\ViewDirective;
use App\Models\Service;
use App\Models\ServiceCategory;
use Auth;
use App\Models\History;
use App\Models\ActivityLog;
use Yajra\DataTables\Facades\DataTables;

class ServiceRepository implements ServiceInterface{

    use ViewDirective;
    protected $path,$sl;

    public function __construct()
    {
        $this->path = 'admin.create_service';
    }

    public function index($datatable)
    {
        if($datatable == 1)
        {
            $data = Service::all();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('serial',function($row){
                return $this->sl = $this->sl +1;
            })
            ->addColumn('service_name',function($row){
                if(config('app.locale') == 'en')
                {
                    return $row->service_name ?: $row->service_name_bn;
                }
                else
                {
                    return $row->service_name_bn ?: $row->service_name;
                }
            })
            ->addColumn('status',function($row){
                if(Auth::user()->can('Service status'))
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
                    <input onchange="return changeServicesStatus('.$row->id.')" id="cbx-51-'.$row->id.'" type="checkbox" '.$checked.'>
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
                if(Auth::user()->can('Service show'))
                {
                    $show_btn = '<a class="dropdown-item" href="'.route('create_service.show',$row->id).'"><i class="fa fa-eye"></i> '.__('common.show').'</a>';
                }
                else
                {
                    $show_btn ='';
                }

                if(Auth::user()->can('Service edit'))
                {
                    $edit_btn = '<a class="dropdown-item" href="'.route('create_service.edit',$row->id).'"><i class="fa fa-edit"></i> '.__('common.edit').'</a>';
                }
                else
                {
                    $edit_btn ='';
                }

                if(Auth::user()->can('Service destroy'))
                {
                    $delete_btn = '<form id="" method="post" action="'.route('create_service.destroy',$row->id).'">
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
            ->rawColumns(['action','service_name','serial','status'])
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
                'service_name' => $request->service_name,
                'service_name_bn' => 1,
                'description' => $request->description,
                'meta_title' => $request->meta_title,
                'meta_tag' => $request->meta_tag,
                'meta_description' => $request->meta_description,
                'status' => 1,
            );

            Service::create($data);
            //activity_log
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'create',
                'description' => 'Create Service which name is '.$request->service_name,
                'description_bn' => 'একটি সার্ভিস তৈরি করেছেন যার নাম '.$request->service_name,
            ]);

            toastr()->success(__('create_service.create_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function show($id)
    {
        $data['data'] = Service::find($id);
        $data['histories'] = History::where('tag','create_service')->where('fk_id',$id)->get();
        return ViewDirective::view($this->path,'show',$data);
    }

    public function properties($id)
    {

    }

    public function edit($id)
    {
        $data['data'] = Service::find($id);
        return ViewDirective::view($this->path,'edit',$data);
    }

    public function update($request, $id)
    {
        try {
            $data = array(
                'sl' => $request->sl,
                'service_name' => $request->service_name,
                'service_name_bn' => 1,
                'description' => $request->description,
                'meta_title' => $request->meta_title,
                'meta_tag' => $request->meta_tag,
                'meta_description' => $request->meta_description,
            );

            Service::find($id)->update($data);
            $data = Service::find($id);
            //activity_log
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'update',
                'description' => 'Update Service which name is '.$data->service_name,
                'description_bn' => 'একটি সার্ভিস আপডেট করেছেন যার নাম '.$data->service_name,
            ]);
            History::create([
                'tag' => 'create_service',
                'fk_id' => $id,
                'type' => 'update',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('create_service.update_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            Service::find($id)->delete();
            $data = Service::withTrashed()->where('id',$id)->first();
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'destroy',
                'description' => 'Destroy Service which name is '.$data->service_name,
                'description_bn' => 'একটি সার্ভিস ডিলেট করেছেন যার নাম '.$data->service_name,
            ]);

            History::create([
                'tag' => 'create_service',
                'fk_id' => $id,
                'type' => 'destroy',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('create_service.delete_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function trash_list($datatable)
    {
        if($datatable == 1)
        {
            $data = Service::onlyTrashed()->get();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('serial',function($row){
                return $this->sl = $this->sl +1;
            })
            ->addColumn('service_name',function($row){
                if(config('app.locale') == 'en')
                {
                    return $row->service_name ?: $row->service_name_bn;
                }
                else
                {
                    return $row->service_name_bn ?: $row->service_name;
                }
            })
            ->addColumn('status',function($row){
                if(Auth::user()->can('Service status'))
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
                    <input onchange="return changeServicesStatus('.$row->id.')" id="cbx-51-'.$row->id.'" type="checkbox" '.$checked.'>
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
                if(Auth::user()->can('Service restore'))
                {
                    $restore_btn = '<a class="dropdown-item" href="'.route('create_service.restore',$row->id).'"><i class="fa fa-trash-arrow-up"></i> '.__('common.restore').'</a>';
                }
                else
                {
                    $restore_btn = '';
                }

                if(Auth::user()->can('Service delete'))
                {
                    $delete_btn = '<a onclick="return Sure()" class="dropdown-item text-danger" href="'.route('create_service.delete',$row->id).'"><i class="fa fa-trash"></i> '.__('common.delete').'</a>';
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
            ->rawColumns(['action','category_name','serial','status'])
            ->make(true);

        }
        return ViewDirective::view($this->path,'trash_list');
    }

    public function restore($id)
    {
        try {
            Service::withTrashed()->where('id',$id)->restore();
            $data = Service::withTrashed()->where('id',$id)->first();
            //history
            History::create([
                'tag' => 'create_service',
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
                'description' => 'Restore Service which name is '.$data->service_name,
                'description_bn' => 'একটি সার্ভিস পুনুরুদ্ধার করেছেন যার নাম '.$data->service_name,
            ]);
            toastr()->success(__('create_service.restore_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $data = Service::withTrashed()->where('id',$id)->first();

            $path = public_path().'/backend/Service/ServiceImage/'.$data->image;
            if(file_exists($path))
            {
                unlink($path);
            }

            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'delete',
                'description' => 'Permenantly Delete Service which name is '.$data->service_name,
                'description_bn' => 'একটি সার্ভিস সম্পূর্ণ ডিলেট করেছেন যার নাম '.$data->service_name,
            ]);
            History::where('tag','create_service')->where('fk_id',$id)->delete();
            Service::withTrashed()->where('id',$id)->forceDelete();
            toastr()->success(__('create_service.delete_message'), __('common.success'), ['timeOut' => 5000]);
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
            $data = Service::withTrashed()->where('id',$id)->first();
            if($data->status == 1)
            {
                Service::withTrashed()->where('id',$id)->update([
                    'status' => 0,
                ]);
            }
            else
            {
                Service::withTrashed()->where('id',$id)->update([
                    'status' => 1,
                ]);
            }
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'status',
                'description' => 'Change Status Service which name is '.$data->service_name,
                'description_bn' => 'একটি সার্ভিস স্ট্যাটাস পরিবর্তন করেছেন যার নাম '.$data->service_name,
            ]);

            History::create([
                'tag' => 'create_service',
                'fk_id' => $id,
                'type' => 'status',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('create_service.status_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }
}
