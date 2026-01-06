<?php
namespace App\Repositories;
use App\Interfaces\EmployeeInterface;
use App\Traits\ViewDirective;
use App\Models\Employee;
use Auth;
use App\Models\History;
use App\Models\ActivityLog;
use Yajra\DataTables\Facades\DataTables;

class EmployeeRepository implements EmployeeInterface{

    use ViewDirective;
    protected $path,$sl;

    public function __construct()
    {
        $this->path = 'admin.create_employee';
    }

    public function index($datatable)
    {
        if($datatable == 1)
        {
            $data = Employee::all();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('serial',function($row){
                return $this->sl = $this->sl +1;
            })
            ->addColumn('name',function($row){
                return $row->name;
            })
            ->addColumn('designation',function($row){
                return $row->designation;
            })
            ->addColumn('phone',function($row){
                return $row->phone;
            })
            ->addColumn('status',function($row){
                if(Auth::user()->can('Create Employee status'))
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
                    <input onchange="return changeEmployeeStatus('.$row->id.')" id="cbx-51-'.$row->id.'" type="checkbox" '.$checked.'>
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
                if(Auth::user()->can('Create Employee show'))
                {
                    $show_btn = '<a class="dropdown-item" href="'.route('create_employee.show',$row->id).'"><i class="fa fa-eye"></i> '.__('common.show').'</a>';
                }
                else
                {
                    $show_btn ='';
                }

                if(Auth::user()->can('Create Employee edit'))
                {
                    $edit_btn = '<a class="dropdown-item" href="'.route('create_employee.edit',$row->id).'"><i class="fa fa-edit"></i> '.__('common.edit').'</a>';
                }
                else
                {
                    $edit_btn ='';
                }

                if(Auth::user()->can('Create Employee destroy'))
                {
                    $delete_btn = '<form id="" method="post" action="'.route('create_employee.destroy',$row->id).'">
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
            ->rawColumns(['action','name','designation','phone','serial','status'])
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
                'name' => $request->name,
                'designation' => $request->designation,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'phone' => $request->phone,
                'status' => 1,
                'image' => '0',
            );

            $image = $request->file('image');
            if($image)
            {
                $imageName = rand().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('/backend/Employee/EmployeeImage/'),$imageName);
                $data['image'] = $imageName;
            }

            Employee::create($data);
            //activity_log
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'create',
                'description' => 'Create Create Employee which name is '.$request->name,
                'description_bn' => 'একটি কর্মকর্তা/কর্মচারী তৈরি করেছেন যার নাম '.$request->name,
            ]);

            toastr()->success(__('create_employee.create_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function show($id)
    {
        $data['data'] = Employee::find($id);
        $data['histories'] = History::where('tag','create_employee')->where('fk_id',$id)->get();
        return ViewDirective::view($this->path,'show',$data);
    }

    public function properties($id)
    {

    }

    public function edit($id)
    {
        $data['data'] = Employee::find($id);
        return ViewDirective::view($this->path,'edit',$data);
    }

    public function update($request, $id)
    {
        try {
            $data = array(
                'sl' => $request->sl,
                'name' => $request->name,
                'designation' => $request->designation,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'phone' => $request->phone,
            );


            $image = $request->file('image');
            $pathImage = Employee::find($id);

            if($image)
            {
                $path = public_path().'/backend/Employee/EmployeeImage/'.$pathImage->image;
                if(file_exists($path))
                {
                    unlink($path);
                }
            }

            if($image)
            {
                $imageName = rand().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('/backend/Employee/EmployeeImage/'),$imageName);
                $data['image'] = $imageName;
            }


            Employee::find($id)->update($data);
            $data = Employee::find($id);
            //activity_log
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'update',
                'description' => 'Update Create Employee which name is '.$data->name,
                'description_bn' => 'একটি কর্মকর্তা/কর্মচারী আপডেট করেছেন যার নাম '.$data->name,
            ]);
            History::create([
                'tag' => 'create_employee',
                'fk_id' => $id,
                'type' => 'update',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('create_employee.update_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            Employee::find($id)->delete();
            $data = Employee::withTrashed()->where('id',$id)->first();
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'destroy',
                'description' => 'Destroy Create Employee which name is '.$data->name,
                'description_bn' => 'একটি কর্মকর্তা/কর্মচারী ডিলেট করেছেন যার নাম '.$data->name,
            ]);

            History::create([
                'tag' => 'create_employee',
                'fk_id' => $id,
                'type' => 'destroy',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('create_employee.delete_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function trash_list($datatable)
    {
        if($datatable == 1)
        {
            $data = Employee::onlyTrashed()->get();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('serial',function($row){
                return $this->sl = $this->sl +1;
            })
            ->addColumn('name',function($row){
                return $row->name;
            })
            ->addColumn('designation',function($row){
                return $row->designation;
            })
            ->addColumn('phone',function($row){
                return $row->phone;
            })
            ->addColumn('status',function($row){
                if(Auth::user()->can('Employee status'))
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
                    <input onchange="return changeEmployeeStatus('.$row->id.')" id="cbx-51-'.$row->id.'" type="checkbox" '.$checked.'>
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
                if(Auth::user()->can('Create Employee restore'))
                {
                    $restore_btn = '<a class="dropdown-item" href="'.route('create_employee.restore',$row->id).'"><i class="fa fa-trash-arrow-up"></i> '.__('common.restore').'</a>';
                }
                else
                {
                    $restore_btn = '';
                }

                if(Auth::user()->can('Create Employee delete'))
                {
                    $delete_btn = '<a onclick="return Sure()" class="dropdown-item text-danger" href="'.route('create_employee.delete',$row->id).'"><i class="fa fa-trash"></i> '.__('common.delete').'</a>';
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
            ->rawColumns(['action','name','designation','phone','serial','status'])
            ->make(true);

        }
        return ViewDirective::view($this->path,'trash_list');
    }

    public function restore($id)
    {
        try {
            Employee::withTrashed()->where('id',$id)->restore();
            $data = Employee::withTrashed()->where('id',$id)->first();
            //history
            History::create([
                'tag' => 'create_employee',
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
                'description' => 'Restore Create Employee which name is '.$data->name,
                'description_bn' => 'একটি কর্মকর্তা/কর্মচারী পুনুরুদ্ধার করেছেন যার নাম '.$data->name,
            ]);
            toastr()->success(__('create_employee.restore_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $data = Employee::withTrashed()->where('id',$id)->first();

            $path = public_path().'/backend/Employee/EmployeeImage/'.$data->image;
            if(file_exists($path))
            {
                unlink($path);
            }

            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'delete',
                'description' => 'Permenantly Delete Create Employee which name is '.$data->name,
                'description_bn' => 'একটি কর্মকর্তা/কর্মচারী সম্পূর্ণ ডিলেট করেছেন যার নাম '.$data->name,
            ]);
            History::where('tag','create_employee')->where('fk_id',$id)->delete();
            Employee::withTrashed()->where('id',$id)->forceDelete();
            toastr()->success(__('create_employee.delete_message'), __('common.success'), ['timeOut' => 5000]);
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
            $data = Employee::withTrashed()->where('id',$id)->first();
            if($data->status == 1)
            {
                Employee::withTrashed()->where('id',$id)->update([
                    'status' => 0,
                ]);
            }
            else
            {
                Employee::withTrashed()->where('id',$id)->update([
                    'status' => 1,
                ]);
            }
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'status',
                'description' => 'Change Status Create Employee which name is '.$data->name,
                'description_bn' => 'একটি কর্মকর্তা/কর্মচারী স্ট্যাটাস পরিবর্তন করেছেন যার নাম '.$data->name,
            ]);

            History::create([
                'tag' => 'create_employee',
                'fk_id' => $id,
                'type' => 'status',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('create_employee.status_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }
}
