<?php
namespace App\Repositories;
use App\Interfaces\PhotoGalleryInterface;
use App\Traits\ViewDirective;
use App\Models\PhotoGallery;
use Auth;
use App\Models\History;
use App\Models\ActivityLog;
use Yajra\DataTables\Facades\DataTables;

class PhotoGalleryRepository implements PhotoGalleryInterface{

    use ViewDirective;
    protected $path,$sl;

    public function __construct()
    {
        $this->path = 'admin.photo_gallery';
    }

    public function index($datatable)
    {
        if($datatable == 1)
        {
            $data = PhotoGallery::all();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('serial',function($row){
                return $this->sl = $this->sl +1;
            })
            ->addColumn('title',function($row){
                return $row->title;
            })
            ->addColumn('status',function($row){
                if(Auth::user()->can('Photo Gallery status'))
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
                    <input onchange="return changePhotoGallerysStatus('.$row->id.')" id="cbx-51-'.$row->id.'" type="checkbox" '.$checked.'>
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
                if(Auth::user()->can('Photo Gallery show'))
                {
                    $show_btn = '<a class="dropdown-item" href="'.route('photo_gallery.show',$row->id).'"><i class="fa fa-eye"></i> '.__('common.show').'</a>';
                }
                else
                {
                    $show_btn ='';
                }

                if(Auth::user()->can('Photo Gallery edit'))
                {
                    $edit_btn = '<a class="dropdown-item" href="'.route('photo_gallery.edit',$row->id).'"><i class="fa fa-edit"></i> '.__('common.edit').'</a>';
                }
                else
                {
                    $edit_btn ='';
                }

                if(Auth::user()->can('Photo Gallery destroy'))
                {
                    $delete_btn = '<form id="" method="post" action="'.route('photo_gallery.destroy',$row->id).'">
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
            ->rawColumns(['action','title','serial','status'])
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
                'sub_title' => $request->sub_title,
                'slider' => $request->slider,
                'status' => 1,
                'image' => '0',
            );

            $image = $request->file('image');
            if($image)
            {
                $imageName = rand().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('/backend/PhotoGallery/PhotoGalleryImage/'),$imageName);
                $data['image'] = $imageName;
            }

            PhotoGallery::create($data);
            //activity_log
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'create',
                'description' => 'Create Photo Gallery which name is '.$request->title,
                'description_bn' => 'একটি ফটো গ্যালারী তৈরি করেছেন যার নাম '.$request->title,
            ]);

            toastr()->success(__('photo_gallery.create_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function show($id)
    {
        $data['data'] = PhotoGallery::find($id);
        $data['histories'] = History::where('tag','photo_gallery')->where('fk_id',$id)->get();
        return ViewDirective::view($this->path,'show',$data);
    }

    public function properties($id)
    {

    }

    public function edit($id)
    {
        $data['data'] = PhotoGallery::find($id);
        return ViewDirective::view($this->path,'edit',$data);
    }

    public function update($request, $id)
    {
        try {
            $data = array(
                'sl' => $request->sl,
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'slider' => $request->slider,
            );


            $image = $request->file('image');
            $pathImage = PhotoGallery::find($id);

            if($image)
            {
                $path = public_path().'/backend/PhotoGallery/PhotoGalleryImage/'.$pathImage->image;
                if(file_exists($path))
                {
                    unlink($path);
                }
            }

            if($image)
            {
                $imageName = rand().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('/backend/PhotoGallery/PhotoGalleryImage/'),$imageName);
                $data['image'] = $imageName;
            }


            PhotoGallery::find($id)->update($data);
            $data = PhotoGallery::find($id);
            //activity_log
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'update',
                'description' => 'Update Photo Gallery which name is '.$data->title,
                'description_bn' => 'একটি ফটো গ্যালারী আপডেট করেছেন যার নাম '.$data->title,
            ]);
            History::create([
                'tag' => 'photo_gallery',
                'fk_id' => $id,
                'type' => 'update',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('photo_gallery.update_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            PhotoGallery::find($id)->delete();
            $data = PhotoGallery::withTrashed()->where('id',$id)->first();
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'destroy',
                'description' => 'Destroy Photo Gallery which name is '.$data->title,
                'description_bn' => 'একটি ফটো গ্যালারী ডিলেট করেছেন যার নাম '.$data->title,
            ]);

            History::create([
                'tag' => 'photo_gallery',
                'fk_id' => $id,
                'type' => 'destroy',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('photo_gallery.delete_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function trash_list($datatable)
    {
        if($datatable == 1)
        {
            $data = PhotoGallery::onlyTrashed()->get();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('serial',function($row){
                return $this->sl = $this->sl +1;
            })
            ->addColumn('icon',function($row){
                return $row->icon;
            })
            ->addColumn('title',function($row){
                if(config('app.locale') == 'en')
                {
                    return $row->title ?: $row->title_bn;
                }
                else
                {
                    return $row->title_bn ?: $row->title;
                }
            })
            ->addColumn('status',function($row){
                if(Auth::user()->can('Photo Gallery status'))
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
                    <input onchange="return changePhotoGallerysStatus('.$row->id.')" id="cbx-51-'.$row->id.'" type="checkbox" '.$checked.'>
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
                if(Auth::user()->can('Photo Gallery restore'))
                {
                    $restore_btn = '<a class="dropdown-item" href="'.route('photo_gallery.restore',$row->id).'"><i class="fa fa-trash-arrow-up"></i> '.__('common.restore').'</a>';
                }
                else
                {
                    $restore_btn = '';
                }

                if(Auth::user()->can('Photo Gallery delete'))
                {
                    $delete_btn = '<a onclick="return Sure()" class="dropdown-item text-danger" href="'.route('photo_gallery.delete',$row->id).'"><i class="fa fa-trash"></i> '.__('common.delete').'</a>';
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
            PhotoGallery::withTrashed()->where('id',$id)->restore();
            $data = PhotoGallery::withTrashed()->where('id',$id)->first();
            //history
            History::create([
                'tag' => 'photo_gallery',
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
                'description' => 'Restore Photo Gallery which name is '.$data->title,
                'description_bn' => 'একটি ফটো গ্যালারী পুনুরুদ্ধার করেছেন যার নাম '.$data->title,
            ]);
            toastr()->success(__('photo_gallery.restore_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $data = PhotoGallery::withTrashed()->where('id',$id)->first();

            $path = public_path().'/backend/PhotoGallery/PhotoGalleryImage/'.$data->image;
            if(file_exists($path))
            {
                unlink($path);
            }

            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'delete',
                'description' => 'Permenantly Delete Photo Gallery which name is '.$data->title,
                'description_bn' => 'একটি ফটো গ্যালারী সম্পূর্ণ ডিলেট করেছেন যার নাম '.$data->title,
            ]);
            History::where('tag','photo_gallery')->where('fk_id',$id)->delete();
            PhotoGallery::withTrashed()->where('id',$id)->forceDelete();
            toastr()->success(__('photo_gallery.delete_message'), __('common.success'), ['timeOut' => 5000]);
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
            $data = PhotoGallery::withTrashed()->where('id',$id)->first();
            if($data->status == 1)
            {
                PhotoGallery::withTrashed()->where('id',$id)->update([
                    'status' => 0,
                ]);
            }
            else
            {
                PhotoGallery::withTrashed()->where('id',$id)->update([
                    'status' => 1,
                ]);
            }
            ActivityLog::create([
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
                'slug' => 'status',
                'description' => 'Change Status Photo Gallery which name is '.$data->title,
                'description_bn' => 'একটি ফটো গ্যালারী স্ট্যাটাস পরিবর্তন করেছেন যার নাম '.$data->title,
            ]);

            History::create([
                'tag' => 'photo_gallery',
                'fk_id' => $id,
                'type' => 'status',
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'user_id' => Auth::user()->id,
            ]);
            toastr()->success(__('photo_gallery.status_message'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }
}
