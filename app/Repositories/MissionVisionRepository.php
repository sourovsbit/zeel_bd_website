<?php
namespace App\Repositories;
use App\Traits\ViewDirective;
use App\Models\MissionVision;
use Auth;
use App\Models\History;
use App\Models\ActivityLog;
use Yajra\DataTables\Facades\DataTables;

class MissionVisionRepository{

    use ViewDirective;
    protected $path,$sl;

    public function __construct()
    {
        $this->path = 'admin.mission_vision';
    }

    public function index($datatable)
    {
        //
    }

    public function create()
    {
        $data['data'] = MissionVision::find(1);

        return ViewDirective::view($this->path,'index',$data);

    }

    public function store($request)
    {

    }

    public function show($id){

    }

    public function properties($id){

    }

    public function edit($id){

    }

    public function update($request)
    {
        try {
            $data = array(
                'description' => $request->description,
            );

            MissionVision::find(1)->update($data);
            $data = MissionVision::find(1);
            //activity_log
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'update',
                'description' => 'Update Mission & Vision which name is '.$data->description,
                'description_bn' => 'লক্ষ্য ও উদ্দেশ্য আপডেট করেছেন যার নাম '.$data->description,
            ]);
            History::create([
                'tag' => 'mission_vision',
                'fk_id' => 1,
                'type' => 'update',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('mission_vision.update_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function destroy($id){

    }

    public function trash_list($datatable){

    }

    public function restore($id){

    }

    public function delete($id){

    }

    public function print(){

    }
}
