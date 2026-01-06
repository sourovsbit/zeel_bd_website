<?php
namespace App\Repositories;
use App\Traits\ViewDirective;
use App\Models\ServiceGuarantee;
use Auth;
use App\Models\History;
use App\Models\ActivityLog;
use Yajra\DataTables\Facades\DataTables;

class ServiceGuaranteeRepository {
    use ViewDirective;
    protected $path,$sl;

    public function __construct()
    {
        $this->path = 'admin.service_guarantee';
    }

    public function index($datatable)
    {
        //
    }

    public function create()
    {
        $data['data'] = ServiceGuarantee::find(1);

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

            ServiceGuarantee::find(1)->update($data);
            $data = ServiceGuarantee::find(1);
            //activity_log
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'update',
                'description' => 'Update Service Guarantee which name is '.$data->description,
                'description_bn' => 'একটি সার্ভিস গ্যারান্টি আপডেট করেছেন যার নাম '.$data->description,
            ]);
            History::create([
                'tag' => 'service_guarantee',
                'fk_id' => 1,
                'type' => 'update',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('service_guarantee.update_message'), __('common.success'), ['timeOut' => 5000]);
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
