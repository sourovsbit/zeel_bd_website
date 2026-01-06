<?php
namespace App\Repositories;
use App\Interfaces\AdministrativeInterface;
use App\Traits\ViewDirective;
use App\Models\Administrative;
use Auth;
use App\Models\History;
use App\Models\ActivityLog;
use Yajra\DataTables\Facades\DataTables;

class AdministrativeRepository implements AdministrativeInterface{

    use ViewDirective;
    protected $path,$sl;

    public function __construct()
    {
        $this->path = 'admin.create_administrative';
    }

    public function index($datatable)
    {
        if($datatable == 1)
        {
            $data = Administrative::all();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('serial',function($row){
                return $this->sl = $this->sl +1;
            })
            ->addColumn('name',function($row){
                return $row->name;
            })
            ->addColumn('title',function($row){
                return $row->title;
            })
            ->addColumn('status',function($row){
                if(Auth::user()->can('Administrative Message status'))
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
                    <input onchange="return changeAdministrativeStatus('.$row->id.')" id="cbx-51-'.$row->id.'" type="checkbox" '.$checked.'>
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
                if(Auth::user()->can('Administrative Message show'))
                {
                    $show_btn = '<a class="dropdown-item" href="'.route('create_administrative.show',$row->id).'"><i class="fa fa-eye"></i> '.__('common.show').'</a>';
                }
                else
                {
                    $show_btn ='';
                }

                if(Auth::user()->can('Administrative Message edit'))
                {
                    $edit_btn = '<a class="dropdown-item" href="'.route('create_administrative.edit',$row->id).'"><i class="fa fa-edit"></i> '.__('common.edit').'</a>';
                }
                else
                {
                    $edit_btn ='';
                }

                if(Auth::user()->can('Administrative Message destroy'))
                {
                    $delete_btn = '<form id="" method="post" action="'.route('create_administrative.destroy',$row->id).'">
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
            ->rawColumns(['action','name','title','serial','status'])
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
                'title' => $request->title,
                'description' => $request->description,
                'status' => 1,
                'image' => '0',
            );

            $image = $request->file('image');
            if($image)
            {
                $imageName = rand().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('/backend/Administrative/AdministrativeImage/'),$imageName);
                $data['image'] = $imageName;
            }

            Administrative::create($data);
            //activity_log
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'create',
                'description' => 'Create Administrative Message which name is '.$request->title,
                'description_bn' => 'একটি প্রাশাসনিক বার্তা তৈরি করেছেন যার নাম '.$request->title,
            ]);

            toastr()->success(__('create_administrative.create_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function show($id)
    {
        $data['data'] = Administrative::find($id);
        $data['histories'] = History::where('tag','create_administrative')->where('fk_id',$id)->get();
        return ViewDirective::view($this->path,'show',$data);
    }

    public function properties($id)
    {

    }

    public function edit($id)
    {
        $data['data'] = Administrative::find($id);
        return ViewDirective::view($this->path,'edit',$data);
    }

    public function update($request, $id)
    {
        try {
            $data = array(
                'sl' => $request->sl,
                'name' => $request->name,
                'title' => $request->title,
                'description' => $request->description,
            );


            $image = $request->file('image');
            $pathImage = Administrative::find($id);

            if($image)
            {
                $path = public_path().'/backend/Administrative/AdministrativeImage/'.$pathImage->image;
                if(file_exists($path))
                {
                    unlink($path);
                }
            }

            if($image)
            {
                $imageName = rand().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('/backend/Administrative/AdministrativeImage/'),$imageName);
                $data['image'] = $imageName;
            }


            Administrative::find($id)->update($data);
            $data = Administrative::find($id);
            //activity_log
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'update',
                'description' => 'Update Administrative Message which name is '.$data->title,
                'description_bn' => 'একটি প্রাশাসনিক বার্তা আপডেট করেছেন যার নাম '.$data->title,
            ]);
            History::create([
                'tag' => 'create_administrative',
                'fk_id' => $id,
                'type' => 'update',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('create_administrative.update_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            Administrative::find($id)->delete();
            $data = Administrative::withTrashed()->where('id',$id)->first();
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'destroy',
                'description' => 'Destroy Administrative Message which name is '.$data->title,
                'description_bn' => 'একটি প্রাশাসনিক বার্তা ডিলেট করেছেন যার নাম '.$data->title,
            ]);

            History::create([
                'tag' => 'create_administrative',
                'fk_id' => $id,
                'type' => 'destroy',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('create_administrative.delete_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function trash_list($datatable)
    {
        if($datatable == 1)
        {
            $data = Administrative::onlyTrashed()->get();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('serial',function($row){
                return $this->sl = $this->sl +1;
            })
            ->addColumn('name',function($row){
                return $row->name;
            })
            ->addColumn('title',function($row){
                return $row->title;
            })
            ->addColumn('status',function($row){
                if(Auth::user()->can('Administrative Message status'))
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
                    <input onchange="return changeAdministrativeStatus('.$row->id.')" id="cbx-51-'.$row->id.'" type="checkbox" '.$checked.'>
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
                if(Auth::user()->can('Administrative Message restore'))
                {
                    $restore_btn = '<a class="dropdown-item" href="'.route('create_administrative.restore',$row->id).'"><i class="fa fa-trash-arrow-up"></i> '.__('common.restore').'</a>';
                }
                else
                {
                    $restore_btn = '';
                }

                if(Auth::user()->can('Administrative Message delete'))
                {
                    $delete_btn = '<a onclick="return Sure()" class="dropdown-item text-danger" href="'.route('create_administrative.delete',$row->id).'"><i class="fa fa-trash"></i> '.__('common.delete').'</a>';
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
            ->rawColumns(['action','title','serial','status'])
            ->make(true);

        }
        return ViewDirective::view($this->path,'trash_list');
    }

    public function restore($id)
    {
        try {
            Administrative::withTrashed()->where('id',$id)->restore();
            $data = Administrative::withTrashed()->where('id',$id)->first();
            //history
            History::create([
                'tag' => 'create_administrative',
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
                'description' => 'Restore Administrative Message which name is '.$data->title,
                'description_bn' => 'একটি প্রাশাসনিক বার্তা পুনুরুদ্ধার করেছেন যার নাম '.$data->title,
            ]);
            toastr()->success(__('create_administrative.restore_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $data = Administrative::withTrashed()->where('id',$id)->first();

            $path = public_path().'/backend/Administrative/AdministrativeImage/'.$data->image;
            if(file_exists($path))
            {
                unlink($path);
            }

            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'delete',
                'description' => 'Permenantly Delete Administrative Message which name is '.$data->title,
                'description_bn' => 'একটি প্রাশাসনিক বার্তা সম্পূর্ণ ডিলেট করেছেন যার নাম '.$data->title,
            ]);
            History::where('tag','create_administrative')->where('fk_id',$id)->delete();
            Administrative::withTrashed()->where('id',$id)->forceDelete();
            toastr()->success(__('create_administrative.delete_message'), __('common.success'), ['timeOut' => 5000]);
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
            $data = Administrative::withTrashed()->where('id',$id)->first();
            if($data->status == 1)
            {
                Administrative::withTrashed()->where('id',$id)->update([
                    'status' => 0,
                ]);
            }
            else
            {
                Administrative::withTrashed()->where('id',$id)->update([
                    'status' => 1,
                ]);
            }
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'status',
                'description' => 'Change Status Administrative Message which name is '.$data->title,
                'description_bn' => 'একটি প্রাশাসনিক বার্তা স্ট্যাটাস পরিবর্তন করেছেন যার নাম '.$data->title,
            ]);

            History::create([
                'tag' => 'create_administrative',
                'fk_id' => $id,
                'type' => 'status',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('create_administrative.status_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }
}
