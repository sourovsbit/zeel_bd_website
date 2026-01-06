<?php
namespace App\Repositories;
use App\Interfaces\ReviewInterface;
use App\Traits\ViewDirective;
use App\Models\Review;
use App\Models\Service;
use App\Models\User;
use Auth;
use App\Models\History;
use App\Models\ActivityLog;
use Yajra\DataTables\Facades\DataTables;

class ReviewRepository implements ReviewInterface{

    use ViewDirective;
    protected $path,$sl;

    public function __construct()
    {
        $this->path = 'admin.reviews';
    }

    public function index($datatable)
    {
        if($datatable == 1)
        {
            $data = Review::all();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('service_name',function($row){
                if($row->service_id > 0)
                {
                    $service_name = Service::where('id',$row->service_id)->first();
                }
                else
                {
                    $service_name = '-';
                }

                if($row->service_id > 0)
                {
                    return $service_name->service_name;
                }
                else
                {
                    $service_name = '-';
                }

            })
            ->addColumn('name',function($row){
                return $row->name;
            })
            ->addColumn('email',function($row){
                return $row->email;
            })
            ->addColumn('phone',function($row){
                return $row->phone;
            })
            ->addColumn('status',function($row){
                if(Auth::user()->can('Reviews status'))
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
                    <input onchange="return changeReviewStatus('.$row->id.')" id="cbx-51-'.$row->id.'" type="checkbox" '.$checked.'>
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
                if(Auth::user()->can('Reviews show'))
                {
                    $show_btn = '<a class="dropdown-item" href="'.route('reviews.show',$row->id).'"><i class="fa fa-eye"></i> '.__('common.show').'</a>';
                }
                else
                {
                    $show_btn ='';
                }

                if(Auth::user()->can('Reviews destroy'))
                {
                    $delete_btn = '<form id="" method="post" action="'.route('reviews.destroy',$row->id).'">
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
                <div class="dropdown-menu dropdown-menu-end py-0" aria-labelledby="dropdownMenuLink" style="">'.$show_btn.' '.$delete_btn.'
                </div>
                </div>';
                return $output;
            })
            ->rawColumns(['action','service_name','name','email','phone','status'])
            ->make(true);

        }
        return ViewDirective::view($this->path,'index');
    }

    public function create()
    {

    }

    public function store($request){

    }

    public function show($id)
    {
        $update = Review::find($id)->update([
            'read'=>1,
            'read_by'=>Auth::user()->id,
        ]);
        $data = Review::find($id);
        return ViewDirective::view($this->path,'show',compact('data'));
    }

    public function properties($id){

    }

    public function edit($id){

    }

    public function update($request, $id){

    }

    public function destroy($id)
    {
        try {
            Review::find($id)->delete();
            $data = Review::where('id',$id)->first();
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'destroy',
                'description' => 'Destroy Review which name is '.$data->name,
                'description_bn' => 'একটি রিভিউ ডিলেট করেছেন যার নাম '.$data->name,
            ]);

            History::create([
                'tag' => 'message',
                'fk_id' => $id,
                'type' => 'destroy',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('reviews.delete_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function trash_list($datatable){

    }

    public function restore($id){

    }

    public function delete($id){

    }

    public function print(){

    }

    public function status($id)
    {
        try {
            $data = Review::where('id',$id)->first();
            if($data->status == 1)
            {
                Review::where('id',$id)->update([
                    'status' => 0,
                ]);
            }
            else
            {
                Review::where('id',$id)->update([
                    'status' => 1,
                ]);
            }
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'status',
                'description' => 'Change Review Status which name is '.$data->name,
                'description_bn' => 'একটি রিভিউ স্ট্যাটাস পরিবর্তন করেছেন যার নাম '.$data->name,
            ]);

            History::create([
                'tag' => 'message',
                'fk_id' => $id,
                'type' => 'status',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('reviews.status_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }
}
