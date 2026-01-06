<?php
namespace App\Repositories;
use App\Traits\ViewDirective;
use App\Models\CompanyProfile;
use Auth;
use App\Models\History;
use App\Models\ActivityLog;

class CompanyProfileRepository {

    use ViewDirective;
    protected $path,$sl;

    public function __construct()
    {
        $this->path = 'admin.company_profile';
    }

    public function index($datatable)
    {
        //
    }

    public function create()
    {
        $data['data'] = CompanyProfile::find(1);

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
            $company = CompanyProfile::find(1);
            if (!$company) {
                return redirect()->back()->with('error', 'Company profile not found!');
            }

            $data = [
                'company_name' => $request->company_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'sales_phone' => $request->sales_phone,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'youtube' => $request->youtube,
                'twiter' => $request->twiter,
                'pinterest' => $request->pinterest,
                'linkedin' => $request->linkedin,
                'tikTok' => $request->tikTok,
                'address' => $request->address,
                'map' => $request->map,
                'meta_title' => $request->meta_title,
                'meta_tag' => $request->meta_tag,
                'meta_description' => $request->meta_description,
            ];

            $logo = $request->file('logo');
            $icon = $request->file('icon');

            if ($logo) {
                $logoPath = public_path('/backend/CompanyProfile/CompanyProfileLogo/' . $company->logo);
                if (file_exists($logoPath)) unlink($logoPath);

                $extension = $logo->getClientOriginalExtension();
                $logoName = 'logo.' . $extension; // force name to be logo
                $logo->move(public_path('/backend/CompanyProfile/CompanyProfileLogo/'), $logoName);
                $data['logo'] = $logoName;
            }

            if ($icon) {
                $iconPath = public_path('/backend/CompanyProfile/CompanyProfileIcon/' . $company->icon);
                if (file_exists($iconPath)) unlink($iconPath);

                $extension = $icon->getClientOriginalExtension();
                $iconName = 'favicon.' . $extension; // force name to be favicon
                $icon->move(public_path('/backend/CompanyProfile/CompanyProfileIcon/'), $iconName);
                $data['icon'] = $iconName;
            }


            // Debugging - Check what is being updated
            // dd($data);

            $company->update($data);

            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'update',
                'description' => 'Update Company Profile which name is ' . $company->company_name,
                'description_bn' => 'একটি কোম্পানির প্রোফাইল আপডেট করেছেন যার নাম ' . $company->company_name,
            ]);

            History::create([
                'tag' => 'company_profile',
                'fk_id' => 1,
                'type' => 'update',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);

            toastr()->success(__('company_profile.update_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
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
