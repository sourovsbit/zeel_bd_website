<?php
namespace App\Repositories;
use App\Interfaces\MessageInterface;
use App\Traits\ViewDirective;
use App\Models\Message;
use App\Models\User;
use Auth;
use App\Models\History;
use App\Models\ActivityLog;
use Yajra\DataTables\Facades\DataTables;

class MessageRepository implements MessageInterface{

    use ViewDirective;
    protected $path,$sl;

    public function __construct()
    {
        $this->path = 'admin.message';
    }

    public function index($datatable)
    {
        if($datatable == 1)
        {
            $data = Message::all();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('read',function($row)
            {
                if($row->read == 1)
                {
                    return '<span class="badge bg-success rounded-pill">Read</span>';
                }
                else
                {
                    return '<span class="badge bg-danger rounded-pill">Draft</span>';
                }
            })
            ->addColumn('read_by',function($row)
            {
                if($row->read_by != NULL)
                {
                    $reader = User::where('id',$row->read_by)->first();

                    return '<b>'.$reader->name.'</b>';
                }
            })
            ->addColumn('status',function($row){
                if(Auth::user()->can('Message status'))
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
                    <input onchange="return changeMessageStatus('.$row->id.')" id="cbx-51-'.$row->id.'" type="checkbox" '.$checked.'>
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
                if(Auth::user()->can('Message show'))
                {
                    $show_btn = '<a class="dropdown-item" href="'.route('message.show',$row->id).'"><i class="fa fa-eye"></i> '.__('common.show').'</a>';
                }
                else
                {
                    $show_btn ='';
                }

                if(Auth::user()->can('Message edit'))
                {
                    $edit_btn = '<a class="dropdown-item" href="'.route('message.edit',$row->id).'"><i class="fa fa-edit"></i> '.__('common.edit').'</a>';
                }
                else
                {
                    $edit_btn ='';
                }

                if(Auth::user()->can('Message destroy'))
                {
                    $delete_btn = '<form id="" method="post" action="'.route('message.destroy',$row->id).'">
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
            ->rawColumns(['action','read','read_by','serial','status'])
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
        $update = Message::find($id)->update([
            'read'=>1,
            'read_by'=>Auth::user()->id,
        ]);
        $data = Message::find($id);
        return view('admin.message.show',compact('data'));
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
            Message::find($id)->delete();
            $data = Message::where('id',$id)->first();
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'destroy',
                'description' => 'Destroy Message which name is '.$data->title,
                'description_bn' => 'একটি মেসেজ ডিলেট করেছেন যার নাম '.$data->title,
            ]);

            History::create([
                'tag' => 'message',
                'fk_id' => $id,
                'type' => 'destroy',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('message.delete_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function trash_list($datatable)
    {

    }

    public function restore($id)
    {

    }

    public function delete($id)
    {

    }

    public function print(){

    }

    public function status($id)
    {
        try {
            $data = Message::where('id',$id)->first();
            if($data->status == 1)
            {
                Message::where('id',$id)->update([
                    'status' => 0,
                ]);
            }
            else
            {
                Message::where('id',$id)->update([
                    'status' => 1,
                ]);
            }
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'status',
                'description' => 'Change Status Message which name is '.$data->title,
                'description_bn' => 'একটি মেসেজ স্ট্যাটাস পরিবর্তন করেছেন যার নাম '.$data->title,
            ]);

            History::create([
                'tag' => 'message',
                'fk_id' => $id,
                'type' => 'status',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('message.status_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }
}
