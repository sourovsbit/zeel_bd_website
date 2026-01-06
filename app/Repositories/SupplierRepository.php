<?php
namespace App\Repositories;
use App\Interfaces\SupplierInterface;
use App\Traits\ViewDirective;
use App\Models\Supplier;
use App\Models\History;
use App\Models\ActivityLog;
use App\Traits\Idgenerator;
use Auth;

class SupplierRepository implements SupplierInterface{
    use ViewDirective;
    protected $path;
    public function __construct()
    {
        $this->path = 'admin.supplier';
    }
    public function index($datatable)
    {
        $data['data'] = Supplier::all();
        return ViewDirective::view($this->path,'index',$data);
    }

    public function create()
    {
        return ViewDirective::view($this->path,'create');
    }

    public function store($request){
        try {
            $supplier_id= Idgenerator::autocode('suppliers','supplier_id','S-','10');
            $data = array(
                'sl' => $request->sl,
                'supplier_id' => $supplier_id,
                'supplier_name' => $request->supplier_name,
                'phone_number' => $request->phone_number,
                'company_name' => $request->company_name,
                'company_phone' => $request->company_phone,
                'nid' => $request->nid,
                'status' => 1,
            );

            $image = $request->file('image');
            $banner = $request->file('banner');
            if($image)
            {
                $imageName = rand().'.'.$image->getClientOriginalExtension();
                $image->move(public_path().'/backend/Supplier/SupplierImage',$imageName);
                $data['image'] = $imageName;
            }
            if($banner)
            {
                $bannerName = rand().'.'.$banner->getClientOriginalExtension();
                $banner->move(public_path().'/backend/Supplier/Supplierbanner',$bannerName);
                $data['banner'] = $bannerName;
            }

            Supplier::create($data);
            //activity_log
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'create',
                'description' => 'Create Suppleir which name is '.$request->supplier_name,
                'description_bn' => 'একটি সাপ্লাইয়ার তৈরি করেছেন যার নাম '.$request->supplier_name,
            ]);

            toastr()->success(__('supplier.create_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function show($id){

    }

    public function properties($id){

    }

    public function edit($id){

    }

    public function update($request, $id){

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
