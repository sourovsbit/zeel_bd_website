<?php
namespace App\Repositories;
use App\Interfaces\DeliveryChargeInterface;
use App\Traits\ViewDirective;
use App\Models\DelivaryCharge;
use App\Models\ShippingClass;
use App\Models\DivisionSetup;
use App\Models\Country;
use Auth;
use App\Models\History;
use App\Models\ActivityLog;
use Yajra\DataTables\Facades\DataTables;

class DeliveryChargeRepository implements DeliveryChargeInterface{
    
    use ViewDirective;
    protected $path,$sl;

    public function __construct()
    {
        $this->path = 'admin.delivary_charge';
    }

    public function index($datatable)
    {
        if($datatable == 1)
        {
            $data = DelivaryCharge::all();
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
            ->addColumn('shipping_name',function($row){
                if(config('app.locale') == 'en')
                {
                    return $row->shipping->shipping_name ?: $row->shipping->shipping_name_bn;
                }
                else
                {
                    return $row->shipping->shipping_name_bn ?: $row->shipping->shipping_name;
                }
            })
            ->addColumn('charge_amount',function($row){
                return $row->charge_amount;
            })
            ->addColumn('status',function($row){
                if(Auth::user()->can('Delivery Charge status'))
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
                    <input onchange="return changeDelivaryChargeStatus('.$row->id.')" id="cbx-51-'.$row->id.'" type="checkbox" '.$checked.'>
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
                if(Auth::user()->can('Delivery Charge show'))
                {
                    $show_btn = '<a class="dropdown-item" href="'.route('delivary_charge.show',$row->id).'"><i class="fa fa-eye"></i> '.__('common.show').'</a>';
                }
                else
                {
                    $show_btn ='';
                }

                if(Auth::user()->can('Delivery Charge edit'))
                {
                    $edit_btn = '<a class="dropdown-item" href="'.route('delivary_charge.edit',$row->id).'"><i class="fa fa-edit"></i> '.__('common.edit').'</a>';
                }
                else
                {
                    $edit_btn ='';
                }

                if(Auth::user()->can('Delivery Charge destroy'))
                {
                    $delete_btn = '<form id="" method="post" action="'.route('delivary_charge.destroy',$row->id).'">
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
            ->rawColumns(['action','country_name','division_name','shipping_name','charge_amount','serial','status'])
            ->make(true);

        }
        return ViewDirective::view($this->path,'index');
    }

    public function create()
    {
        $data['country'] = Country::where('status',1)->get();
        $data['division'] = DivisionSetup::where('status',1)->get();
        $data['shipping'] = ShippingClass::where('status',1)->get();
        return ViewDirective::view($this->path,'create',$data);
    }

    public function store($request)
    {
        try {
            $data = array(
                'sl' => $request->sl,
                'country_id' => $request->country_id,
                'division_id' => $request->division_id,
                'shipping_class_id' => $request->shipping_class_id,
                'charge_amount' => $request->charge_amount,
                'status' => 1,
            );

            DelivaryCharge::create($data);
            //activity_log
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'create',
                'description' => 'Create Delivery Charge which name is '.$request->charge_amount,
                'description_bn' => 'একটি ডেলিভারি চার্জ তৈরি করেছেন যার নাম '.$request->charge_amount,
            ]);

            toastr()->success(__('delivary_charge.create_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function show($id)
    {
        $data['data'] = DelivaryCharge::find($id);
        $data['histories'] = History::where('tag','delivary_charge')->where('fk_id',$id)->get();
        return ViewDirective::view($this->path,'show',$data);
    }

    public function properties($id){

    }

    public function edit($id)
    {
        $data['data'] = DelivaryCharge::find($id);
        $data['country'] = Country::where('status',1)->get();
        $data['division'] = DivisionSetup::where('status',1)->get();
        $data['shipping'] = ShippingClass::where('status',1)->get();
        return ViewDirective::view($this->path,'edit',$data);
    }

    public function update($request, $id)
    {
        try {
            $data = array(
                'sl' => $request->sl,
                'country_id' => $request->country_id,
                'division_id' => $request->division_id,
                'shipping_class_id' => $request->shipping_class_id,
                'charge_amount' => $request->charge_amount,
            );

            DelivaryCharge::find($id)->update($data);
            $data = DelivaryCharge::find($id);
            //activity_log
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'update',
                'description' => 'Update Delivery Charge which name is '.$data->charge_amount,
                'description_bn' => 'একটি ডেলিভারি চার্জ আপডেট করেছেন যার নাম '.$data->charge_amount,
            ]);
            History::create([
                'tag' => 'delivary_charge',
                'fk_id' => $id,
                'type' => 'update',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('delivary_charge.update_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            DelivaryCharge::find($id)->delete();
            $data = DelivaryCharge::withTrashed()->where('id',$id)->first();
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'destroy',
                'description' => 'Destroy Delivery Charge which name is '.$data->charge_amount,
                'description_bn' => 'একটি ডেলিভারি চার্জ ডিলেট করেছেন যার নাম '.$data->charge_amount,
            ]);

            History::create([
                'tag' => 'delivary_charge',
                'fk_id' => $id,
                'type' => 'destroy',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('delivary_charge.delete_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function trash_list($datatable)
    {
        if($datatable == 1)
        {
            $data = DelivaryCharge::onlyTrashed()->get();
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
            ->addColumn('shipping_name',function($row){
                if(config('app.locale') == 'en')
                {
                    return $row->shipping->shipping_name ?: $row->shipping->shipping_name_bn;
                }
                else
                {
                    return $row->shipping->shipping_name_bn ?: $row->shipping->shipping_name;
                }
            })
            ->addColumn('charge_amount',function($row){
                return $row->charge_amount;
            })
            ->addColumn('status',function($row){
                if(Auth::user()->can('Delivery Charge status'))
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
                    <input onchange="return changeDelivaryChargeStatus('.$row->id.')" id="cbx-51-'.$row->id.'" type="checkbox" '.$checked.'>
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
                if(Auth::user()->can('Delivery Charge restore'))
                {
                    $restore_btn = '<a class="dropdown-item" href="'.route('delivary_charge.restore',$row->id).'"><i class="fa fa-trash-arrow-up"></i> '.__('common.restore').'</a>';
                }
                else
                {
                    $restore_btn = '';
                }

                if(Auth::user()->can('Delivery Charge delete'))
                {
                    $delete_btn = '<a onclick="return Sure()" class="dropdown-item text-danger" href="'.route('delivary_charge.delete',$row->id).'"><i class="fa fa-trash"></i> '.__('common.delete').'</a>';
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
            ->rawColumns(['action','country_name'.'division_name','shipping_name','charge_amount','serial','status'])
            ->make(true);

        }
        return ViewDirective::view($this->path,'trash_list');
    }

    public function restore($id)
    {
        try {
            DelivaryCharge::withTrashed()->where('id',$id)->restore();
            $data = DelivaryCharge::withTrashed()->where('id',$id)->first();
            //history
            History::create([
                'tag' => 'charge_amount',
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
                'description' => 'Restore Delivery Charge which name is '.$data->charge_amount,
                'description_bn' => 'একটি ডেলিভারি চার্জ পুনুরুদ্ধার করেছেন যার নাম '.$data->charge_amount,
            ]);
            toastr()->success(__('charge_amount.restore_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $data = DelivaryCharge::withTrashed()->where('id',$id)->first();

            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'delete',
                'description' => 'Permenantly Delete Delivery Charge which name is '.$data->charge_amount,
                'description_bn' => 'একটি ডেলিভারি চার্জ সম্পূর্ণ ডিলেট করেছেন যার নাম '.$data->charge_amount,
            ]);
            History::where('tag','charge_amount')->where('fk_id',$id)->delete();
            DelivaryCharge::withTrashed()->where('id',$id)->forceDelete();
            toastr()->success(__('charge_amount.delete_message'), __('common.success'), ['timeOut' => 5000]);
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
            $data = DelivaryCharge::withTrashed()->where('id',$id)->first();
            if($data->status == 1)
            {
                DelivaryCharge::withTrashed()->where('id',$id)->update([
                    'status' => 0,
                ]);
            }
            else
            {
                DelivaryCharge::withTrashed()->where('id',$id)->update([
                    'status' => 1,
                ]);
            }
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'status',
                'description' => 'Change Status Delivery Charge which name is '.$data->charge_amount,
                'description_bn' => 'একটি ডেলিভারি চার্জ স্ট্যাটাস পরিবর্তন করেছেন যার নাম '.$data->charge_amount,
            ]);

            History::create([
                'tag' => 'charge_amount',
                'fk_id' => $id,
                'type' => 'status',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('charge_amount.status_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function GetDivision($division_id)
    {
        $this->lang = config('app.locale');

        $data = DivisionSetup::where('country_id',$division_id)->get();


        $output = '<option value="">'.__('common.select_one').'</option>';


        foreach($data as $v)
        {

            $output .= '<option value="'.$v->id.'">'.$v->division_name.'</option>';

        }
        return $output;
    }
}
        