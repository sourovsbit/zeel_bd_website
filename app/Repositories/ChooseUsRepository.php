<?php
namespace App\Repositories;
use App\Interfaces\ChooseUsInterface;
use App\Traits\ViewDirective;
use App\Models\choose_us;
use Auth;
use App\Models\History;
use App\Models\ActivityLog;
use Yajra\DataTables\Facades\DataTables;

class ChooseUsRepository implements ChooseUsInterface{

    use ViewDirective;
    protected $path,$sl;

    public function __construct()
    {
        $this->path = 'admin.choose_us';
    }

    public function index($datatable)
    {
        if($datatable == 1)
        {
            $data = choose_us::all();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('serial',function($row){
                return $this->sl = $this->sl +1;
            })
            ->addColumn('title',function($row){
                return $row->title;
            })
            ->addColumn('status',function($row){
                if(Auth::user()->can('Why Choose Us status'))
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
                    <input onchange="return changeChooseUsStatus('.$row->id.')" id="cbx-'.$row->id.'" type="checkbox" '.$checked.'>
                    <label class="toggle" for="cbx-'.$row->id.'">
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
                if(Auth::user()->can('Why Choose Us edit'))
                {
                    $edit_btn = '<a class="dropdown-item" href="'.route('choose_us.edit',$row->id).'"><i class="fa fa-edit"></i> '.__('common.edit').'</a>';
                }
                else
                {
                    $edit_btn ='';
                }

                if(Auth::user()->can('Why Choose Us destroy'))
                {
                    $delete_btn = '<form id="" method="post" action="'.route('choose_us.destroy',$row->id).'">
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
                <div class="dropdown-menu dropdown-menu-end py-0" aria-labelledby="dropdownMenuLink" style="">'.$edit_btn.' '.$delete_btn.'
                </div>
              </div>';
                return $output;
            })
            ->rawColumns(['action','icon','title','serial','status'])
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
                'title' => $request->title,
                'details' => $request->details,
                'status' => 1,
                'image' => 0,
            );

            $image = $request->file('image');
            if($image)
            {
                $imageName = rand().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('backend/WhyChooseUs/WhyChooseUsImage'),$imageName);
                $data['image'] = $imageName;
            }

            choose_us::create($data);
            //activity_log
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'create',
                'description' => 'Create Why Choose Us which name is '.$request->title,
                'description_bn' => 'একটি কেন আমাদের নির্বাচন করেছে তৈরি করেছেন যার নাম '.$request->title,
            ]);

            toastr()->success(__('choose_us.create_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function show($id)
    {
        $data['data'] = choose_us::find($id);
        $data['histories'] = History::where('tag','choose_us')->where('fk_id',$id)->get();
        return ViewDirective::view($this->path,'show',$data);
    }

    public function properties($id){

    }

    public function edit($id)
    {
        $data['data'] = choose_us::find($id);
        return ViewDirective::view($this->path,'edit',$data);
    }

    public function update($request, $id)
    {
        try {
            $data = array(
                'title' => $request->title,
                'details' => $request->details,
                'sl' => $request->sl,
            );

            $image = $request->file('image');
            $pathImage = choose_us::find($id);

            if($image)
            {
                $path = public_path().'backend/WhyChooseUs/WhyChooseUsImage'.$pathImage->image;
                if(file_exists($path))
                {
                    unlink($path);
                }
            }

            if($image)
            {
                $imageName = rand().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('backend/WhyChooseUs/WhyChooseUsImage'),$imageName);
                $data['image'] = $imageName;
            }

            choose_us::find($id)->update($data);
            $data = choose_us::find($id);
            //activity_log
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'update',
                'description' => 'Update Why Choose Us which name is '.$data->title,
                'description_bn' => 'একটি কেন আমাদের নির্বাচন করেছে আপডেট করেছেন যার নাম '.$data->title,
            ]);
            History::create([
                'tag' => 'choose_us',
                'fk_id' => $id,
                'type' => 'update',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('choose_us.update_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            choose_us::find($id)->delete();
            $data = choose_us::withTrashed()->where('id',$id)->first();
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'destroy',
                'description' => 'Destroy Why Choose Us which name is '.$data->title,
                'description_bn' => 'একটি কেন আমাদের নির্বাচন করেছে ডিলেট করেছেন যার নাম '.$data->title,
            ]);

            History::create([
                'tag' => 'choose_us',
                'fk_id' => $id,
                'type' => 'destroy',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('choose_us.delete_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function trash_list($datatable)
    {
        if($datatable == 1)
        {
            $data = choose_us::onlyTrashed()->get();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('serial',function($row){
                return $this->sl = $this->sl +1;
            })
            ->addColumn('title',function($row){
                return $row->title;
            })
            ->addColumn('status',function($row){
                if(Auth::user()->can('Why Choose Us status'))
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
                    <input onchange="return changeChooseUsStatus('.$row->id.')" id="cbx-'.$row->id.'" type="checkbox" '.$checked.'>
                    <label class="toggle" for="cbx-'.$row->id.'">
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
                if(Auth::user()->can('Why Choose Us restore'))
                {
                    $restore_btn = '<a class="dropdown-item" href="'.route('choose_us.restore',$row->id).'"><i class="fa fa-trash-arrow-up"></i> '.__('common.restore').'</a>';
                }
                else
                {
                    $restore_btn = '';
                }

                if(Auth::user()->can('Why Choose Us delete'))
                {
                    $delete_btn = '<a onclick="return Sure()" class="dropdown-item text-danger" href="'.route('choose_us.delete',$row->id).'"><i class="fa fa-trash"></i> '.__('common.delete').'</a>';
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
            ->rawColumns(['action','icon','title','serial','status'])
            ->make(true);

        }
        return ViewDirective::view($this->path,'trash_list');
    }

    public function restore($id)
    {
        try {
            choose_us::withTrashed()->where('id',$id)->restore();
            $data = choose_us::withTrashed()->where('id',$id)->first();
            //history
            History::create([
                'tag' => 'choose_us',
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
                'description' => 'Restore Why Choose Us which name is '.$data->title,
                'description_bn' => 'একটি কেন আমাদের নির্বাচন করেছে পুনুরুদ্ধার করেছেন যার নাম '.$data->title,
            ]);
            toastr()->success(__('choose_us.restore_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function delete($id)
    {
        try{
            $data = choose_us::withTrashed()->where('id',$id)->first();

            $path = public_path().'/backend/WhyChooseUs/WhyChooseUsImage/'.$data->image;
            if(file_exists($path))
            {
                unlink($path);
            }

            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'delete',
                'description' => 'Permenantly Delete Why Choose Us which name is '.$data->title,
                'description_bn' => 'একটি কেন আমাদের নির্বাচন করেছে সম্পূর্ণ করেছেন যার নাম '.$data->title,
            ]);

            History::where('tag','choose_us')->where('fk_id',$id)->delete();

            Unit::withTrashed()->where('id',$id)->forceDelete();
            toastr()->success(__('choose_us.delete_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        }
        catch(\Throwable $th){
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function print(){

    }

    public function status($id)
    {
        $check = choose_us::withTrashed()->where('id',$id)->first();

        if($check->status == 0)
        {
            $check->update([
                'status' => '1',
            ]);
        }
        else
        {
            $check->update([
                'status' => '0',
            ]);
        }

        ActivityLog::create([
            'date' => date('Y-m-d'),
            'time' => date('H:i:s'),
            'user_id' => Auth::user()->id,
            'slug' => 'status',
            'description' => 'Change Status of Why Choose Us which name is '.$check->title,
            'description_bn' => 'একটি কেন আমাদের নির্বাচন করেছে এর স্ট্যাটাস পরিবর্তন করেছেন যার নাম '.$check->title,
        ]);
        History::create([
            'tag' => 'choose_us',
            'fk_id' => $id,
            'type' => 'status',
            'date' => date('Y-m-d'),
            'time' => date('H:i:s'),
            'user_id' => Auth::user()->id,
        ]);

        return 1;
    }
}
