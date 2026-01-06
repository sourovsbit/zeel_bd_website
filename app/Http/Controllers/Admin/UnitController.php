<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\UnitInterface;
use App\Http\Requests\UnitRequest;

class UnitController extends Controller
{
    protected $interface;
    public function __construct(UnitInterface $interface)
    {
        $this->interface = $interface;
        $this->middleware(['permission:Unit view'])->only(['index']);
        $this->middleware(['permission:Unit create'])->only(['create']);
        $this->middleware(['permission:Unit edit'])->only(['edit']);
        $this->middleware(['permission:Unit destroy'])->only(['destroy']);
        $this->middleware(['permission:Unit status'])->only(['status']);
        $this->middleware(['permission:Unit restore'])->only(['restore']);
        $this->middleware(['permission:Unit delete'])->only(['delete']);
        $this->middleware(['permission:Unit show'])->only(['show']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $datatable ='';
        if($request->ajax())
        {
            $datatable = true;
        }
        return $this->interface->index($datatable);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->interface->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UnitRequest $request)
    {
        return $this->interface->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->interface->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->interface->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UnitRequest $request, string $id)
    {
        return $this->interface->update($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->interface->destroy($id);
    }

    public function status(Request $request)
    {
        return $this->interface->status($request->id);
    }

    public function trash(Request $request)
    {
        $datatable ='';
        if($request->ajax())
        {
            $datatable = true;
        }

        return $this->interface->trash_list($datatable);
    }

    public function restore($id)
    {
        return $this->interface->restore($id);
    }
    public function delete($id)
    {
        return $this->interface->delete($id);
    }
}
