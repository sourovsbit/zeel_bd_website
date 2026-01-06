<?php
namespace App\Repositories;
use App\Interfaces\DivisionSetupInterface;
use App\Traits\ViewDirective;
use App\Models\DivisionSetup;
use App\Models\Country;
use Auth;
use App\Models\History;
use App\Models\ActivityLog;
use Yajra\DataTables\Facades\DataTables;

class DivisionSetupRepository implements DivisionSetupInterface{
    
    use ViewDirective;
    protected $path,$sl;

    public function __construct()
    {
        $this->path = 'admin.division_setup';
    }

    public function index($datatable)
    {
        if($datatable == 1)
        {
            $data = DivisionSetup::all();
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
            ->addColumn('name',function($row){
                if(config('app.locale') == 'en')
                {
                    return $row->division_name ?: $row->division_name_bn;
                }
                else
                {
                    return $row->division_name_bn ?: $row->division_name;
                }
            })
            ->addColumn('status',function($row){
                if(Auth::user()->can('Division Setup status'))
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
                    <input onchange="return changeDivisionSetupStatus('.$row->id.')" id="cbx-51-'.$row->id.'" type="checkbox" '.$checked.'>
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
                if(Auth::user()->can('Division Setup show'))
                {
                    $show_btn = '<a class="dropdown-item" href="'.route('division_setup.show',$row->id).'"><i class="fa fa-eye"></i> '.__('common.show').'</a>';
                }
                else
                {
                    $show_btn ='';
                }

                if(Auth::user()->can('Division Setup edit'))
                {
                    $edit_btn = '<a class="dropdown-item" href="'.route('division_setup.edit',$row->id).'"><i class="fa fa-edit"></i> '.__('common.edit').'</a>';
                }
                else
                {
                    $edit_btn ='';
                }

                if(Auth::user()->can('Division Setup destroy'))
                {
                    $delete_btn = '<form id="" method="post" action="'.route('division_setup.destroy',$row->id).'">
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
            ->rawColumns(['action','country_name','division_name','serial','status'])
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
                'country_id' => $request->country_id,
                'division_name' => $request->division_name,
                'division_name_bn' => $request->division_name_bn,
                'status' => 1,
            );

            DivisionSetup::create($data);
            //activity_log
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'create',
                'description' => 'Create Division which name is '.$request->division_name,
                'description_bn' => 'একটি বিভাগ তৈরি করেছেন যার নাম '.$request->division_name,
            ]);

            toastr()->success(__('division_setup.create_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function show($id)
    {
        $data['data'] = DivisionSetup::find($id);
        $data['histories'] = History::where('tag','division_setup')->where('fk_id',$id)->get();
        return ViewDirective::view($this->path,'show',$data);
    }

    public function properties($id){

    }

    public function edit($id)
    {
        $data['data'] = DivisionSetup::find($id);
        $data['country'] = Country::where('status',1)->get();
        return ViewDirective::view($this->path,'edit',$data);
    }

    public function update($request, $id)
    {
        try {
            $data = array(
                'sl' => $request->sl,
                'country_id' => $request->country_id,
                'division_name' => $request->division_name,
                'division_name_bn' => $request->division_name_bn,
            );

            DivisionSetup::find($id)->update($data);
            $data = DivisionSetup::find($id);
            //activity_log
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'update',
                'description' => 'Update Division which name is '.$data->division_name,
                'description_bn' => 'একটি পণ্য কালার আপডেট করেছেন যার নাম '.$data->division_name,
            ]);
            History::create([
                'tag' => 'division_setup',
                'fk_id' => $id,
                'type' => 'update',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('division_setup.update_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            DivisionSetup::find($id)->delete();
            $data = DivisionSetup::withTrashed()->where('id',$id)->first();
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'destroy',
                'description' => 'Destroy Division which name is '.$data->division_name,
                'description_bn' => 'একটি বিভাগ ডিলেট করেছেন যার নাম '.$data->division_name,
            ]);

            History::create([
                'tag' => 'division_setup',
                'fk_id' => $id,
                'type' => 'destroy',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('division_setup.delete_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function trash_list($datatable)
    {
        if($datatable == 1)
        {
            $data = DivisionSetup::onlyTrashed()->get();
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
            ->addColumn('name',function($row){
                if(config('app.locale') == 'en')
                {
                    return $row->division_name ?: $row->division_name_bn;
                }
                else
                {
                    return $row->division_name_bn ?: $row->division_name;
                }
            })
            ->addColumn('status',function($row){
                if(Auth::user()->can('Division Setup status'))
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
                    <input onchange="return changeDivisionSetupStatus('.$row->id.')" id="cbx-51-'.$row->id.'" type="checkbox" '.$checked.'>
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
                if(Auth::user()->can('Division Setup restore'))
                {
                    $restore_btn = '<a class="dropdown-item" href="'.route('division_setup.restore',$row->id).'"><i class="fa fa-trash-arrow-up"></i> '.__('common.restore').'</a>';
                }
                else
                {
                    $restore_btn = '';
                }

                if(Auth::user()->can('Division Setup delete'))
                {
                    $delete_btn = '<a onclick="return Sure()" class="dropdown-item text-danger" href="'.route('division_setup.delete',$row->id).'"><i class="fa fa-trash"></i> '.__('common.delete').'</a>';
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
            ->rawColumns(['action','country_name'.'division_name','serial','status'])
            ->make(true);

        }
        return ViewDirective::view($this->path,'trash_list');
    }

    public function restore($id)
    {
        try {
            DivisionSetup::withTrashed()->where('id',$id)->restore();
            $data = DivisionSetup::withTrashed()->where('id',$id)->first();
            //history
            History::create([
                'tag' => 'division_setup',
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
                'description' => 'Restore Division which name is '.$data->division_name,
                'description_bn' => 'একটি বিভাগ পুনুরুদ্ধার করেছেন যার নাম '.$data->division_name,
            ]);
            toastr()->success(__('division_setup.restore_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $data = DivisionSetup::withTrashed()->where('id',$id)->first();

            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'delete',
                'description' => 'Permenantly Delete Division which name is '.$data->division_name,
                'description_bn' => 'একটি বিভাগ সম্পূর্ণ ডিলেট করেছেন যার নাম '.$data->division_name,
            ]);
            History::where('tag','division_setup')->where('fk_id',$id)->delete();
            DivisionSetup::withTrashed()->where('id',$id)->forceDelete();
            toastr()->success(__('division_setup.delete_message'), __('common.success'), ['timeOut' => 5000]);
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
            $data = DivisionSetup::withTrashed()->where('id',$id)->first();
            if($data->status == 1)
            {
                DivisionSetup::withTrashed()->where('id',$id)->update([
                    'status' => 0,
                ]);
            }
            else
            {
                DivisionSetup::withTrashed()->where('id',$id)->update([
                    'status' => 1,
                ]);
            }
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'status',
                'description' => 'Change Division Status which name is '.$data->division_name,
                'description_bn' => 'একটি বিভাগ স্ট্যাটাস পরিবর্তন করেছেন যার নাম '.$data->division_name,
            ]);

            History::create([
                'tag' => 'division_setup',
                'fk_id' => $id,
                'type' => 'status',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('division_setup.status_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }
}
        