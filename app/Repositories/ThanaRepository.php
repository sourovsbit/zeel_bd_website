<?php
namespace App\Repositories;
use App\Interfaces\ThanaInterface;
use App\Traits\ViewDirective;
use App\Models\Thana;
use App\Models\DistrictSetup;
use App\Models\DivisionSetup;
use App\Models\Country;
use App\Models\ActivityLog;
use App\Models\History;
use Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Traits\Idgenerator;

class ThanaRepository implements ThanaInterface{

    use ViewDirective;
    protected $path,$sl;
    public function __construct()
    {
        $this->path = 'admin.thana_setup';
    }

    public function index($datatable)
    {
        if($datatable == 1)
        {
            $data = Thana::query();
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
            ->addColumn('division_name',function($row){
                if(config('app.locale') == 'en')
                {
                    return $row->division->division_name ?: $row->division->division_name_bn;
                }
                else
                {
                    return $row->division->division_name_bn ?: $row->division->division_name;
                }
            })
            ->addColumn('district_name',function($row){
                if(config('app.locale') == 'en')
                {
                    return $row->district->district_name ?: $row->district->district_name_bn;
                }
                else
                {
                    return $row->district->district_name_bn ?: $row->district->district_name;
                }
            })
            ->addColumn('thana_name',function($row){
                if(config('app.locale') == 'en')
                {
                    return $row->thana_name ?: $row->thana_name_bn;
                }
                else
                {
                    return $row->thana_name_bn ?: $row->thana_name;
                }
            })
            ->addColumn('status',function($row){
                if(Auth::user()->can('Thana Setup status'))
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
                    <input onchange="return changeThanaSetupStatus('.$row->id.')" id="cbx-51-'.$row->id.'" type="checkbox" '.$checked.'>
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
                if(Auth::user()->can('Thana Setup show'))
                {
                    $show_btn = '<a class="dropdown-item" href="'.route('thana_setup.show',$row->id).'"><i class="fa fa-eye"></i> '.__('common.show').'</a>';
                }
                else
                {
                    $show_btn ='';
                }

                if(Auth::user()->can('Thana Setup edit'))
                {
                    $edit_btn = '<a class="dropdown-item" href="'.route('thana_setup.edit',$row->id).'"><i class="fa fa-edit"></i> '.__('common.edit').'</a>';
                }
                else
                {
                    $edit_btn ='';
                }

                if(Auth::user()->can('Thana Setup destroy'))
                {
                    $delete_btn = '<form id="" method="post" action="'.route('thana_setup.destroy',$row->id).'">
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
            ->rawColumns(['action','country_name','division_name','district_name','thana_name','serial','status'])
            ->make(true);

        }
        return ViewDirective::view($this->path,'index');
    }

    public function create()
    {
        $data['country'] = Country::where('status',1)->get();
        $data['division'] = DivisionSetup::where('status',1)->get();
        $data['district'] = DistrictSetup::where('status',1)->get();
        return ViewDirective::view($this->path,'create',$data);
    }

    public function store($request)
    {
        try {
            $data = array(
                'sl' => $request->sl,
                'country_id' => $request->country_id,
                'division_id' => $request->division_id,
                'district_id' => $request->district_id,
                'thana_name' => $request->thana_name,
                'thana_name_bn' => $request->thana_name_bn,
                'status' => 1,
            );

            Thana::create($data);
            //activity_log
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'create',
                'description' => 'Create Thana which name is '.$request->thana_name,
                'description_bn' => 'একটি থানা তৈরি করেছেন যার নাম '.$request->thana_name,
            ]);

            toastr()->success(__('thana_setup.create_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function show($id)
    {
        $data['data'] = Thana::find($id);
        $data['histories'] = History::where('fk_id',$id)->where('tag','thana_setup')->get();
        return ViewDirective::view($this->path,'show',$data);
    }

    public function properties($id){

    }

    public function edit($id)
    {
        $data['data'] = Thana::find($id);
        $data['country'] = Country::where('status',1)->get();
        $data['division'] = DivisionSetup::where('status',1)->get();
        $data['district'] = DistrictSetup::where('status',1)->get();
        return ViewDirective::view($this->path,'edit',$data);
    }

    public function update($request, $id)
    {
        try {
            $data = array(
                'sl' => $request->sl,
                'country_id' => $request->country_id,
                'division_id' => $request->division_id,
                'district_id' => $request->district_id,
                'thana_name' => $request->thana_name,
                'thana_name_bn' => $request->thana_name_bn,
            );

            Thana::find($id)->update($data);
            $data = Thana::find($id);
            //activity_log
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'update',
                'description' => 'Update Thana which name is '.$data->thana_name,
                'description_bn' => 'একটি থানা আপডেট করেছেন যার নাম '.$data->thana_name,
            ]);
            History::create([
                'tag' => 'thana_setup',
                'fk_id' => $id,
                'type' => 'update',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('thana_setup.update_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            Thana::find($id)->delete();
            $data = Thana::withTrashed()->where('id',$id)->first();
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'destroy',
                'description' => 'Destroy Thana which name is '.$data->thana_name,
                'description_bn' => 'একটি থানা ডিলেট করেছেন যার নাম '.$data->thana_name,
            ]);

            History::create([
                'tag' => 'thana_setup',
                'fk_id' => $id,
                'type' => 'destroy',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('thana_setup.delete_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function trash_list($datatable)
    {
        if($datatable == 1)
        {
            $data = Thana::onlyTrashed()->get();
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
            ->addColumn('division_name',function($row){
                if(config('app.locale') == 'en')
                {
                    return $row->division->division_name ?: $row->division->division_name_bn;
                }
                else
                {
                    return $row->division->division_name_bn ?: $row->division->division_name;
                }
            })
            ->addColumn('district_name',function($row){
                if(config('app.locale') == 'en')
                {
                    return $row->district->district_name ?: $row->district->district_name_bn;
                }
                else
                {
                    return $row->district->district_name_bn ?: $row->district->district_name;
                }
            })
            ->addColumn('thana_name',function($row){
                if(config('app.locale') == 'en')
                {
                    return $row->thana_name ?: $row->thana_name_bn;
                }
                else
                {
                    return $row->thana_name_bn ?: $row->thana_name;
                }
            })
            ->addColumn('status',function($row){
                if(Auth::user()->can('Thana Setup status'))
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
                    <input onchange="return changeThanaSetupStatus('.$row->id.')" id="cbx-51-'.$row->id.'" type="checkbox" '.$checked.'>
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
                if(Auth::user()->can('Thana Setup restore'))
                {
                    $restore_btn = '<a class="dropdown-item" href="'.route('thana_setup.restore',$row->id).'"><i class="fa fa-trash-arrow-up"></i> '.__('common.restore').'</a>';
                }
                else
                {
                    $restore_btn = '';
                }

                if(Auth::user()->can('Thana Setup delete'))
                {
                    $delete_btn = '<a onclick="return Sure()" class="dropdown-item text-danger" href="'.route('thana_setup.delete',$row->id).'"><i class="fa fa-trash"></i> '.__('common.delete').'</a>';
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
            ->rawColumns(['action','country_name','division_name','district_name','thana_name','serial','status'])
            ->make(true);

        }
        return ViewDirective::view($this->path,'trash_list');
    }

    public function restore($id)
    {
        try {
            Thana::withTrashed()->where('id',$id)->restore();
            $data = Thana::withTrashed()->where('id',$id)->first();
            //history
            History::create([
                'tag' => 'thana_setup',
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
                'description' => 'Restore Thana which name is '.$data->thana_name,
                'description_bn' => 'একটি থানা পুনুরুদ্ধার করেছেন যার নাম '.$data->thana_name,
            ]);
            toastr()->success(__('thana_setup.restore_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $data = Thana::withTrashed()->where('id',$id)->first();

            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'delete',
                'description' => 'Permenantly Delete Thana which name is '.$data->thana_name,
                'description_bn' => 'একটি থানা সম্পূর্ণ ডিলেট করেছেন যার নাম '.$data->thana_name,
            ]);
            History::where('tag','thana_setup')->where('fk_id',$id)->delete();
            Thana::withTrashed()->where('id',$id)->forceDelete();
            toastr()->success(__('thana_setup.delete_message'), __('common.success'), ['timeOut' => 5000]);
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
            $data = Thana::withTrashed()->where('id',$id)->first();
            if($data->status == 1)
            {
                Thana::withTrashed()->where('id',$id)->update([
                    'status' => 0,
                ]);
            }
            else
            {
                Thana::withTrashed()->where('id',$id)->update([
                    'status' => 1,
                ]);
            }
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'status',
                'description' => 'Change Status Thana which name is '.$data->thana_name,
                'description_bn' => 'একটি থানা স্ট্যাটাস পরিবর্তন করেছেন যার নাম '.$data->thana_name,
            ]);

            History::create([
                'tag' => 'thana_setup',
                'fk_id' => $id,
                'type' => 'status',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('thana_setup.status_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function GetDistrict($division_id)
    {
        $this->lang = config('app.locale');

        $data = DistrictSetup::where('division_id',$division_id)->get();


        $output = '<option value="">'.__('common.select_one').'</option>';


        foreach($data as $v)
        {

            $output .= '<option value="'.$v->id.'">'.$v->district_name.'</option>';

        }
        return $output;
    }
}
        