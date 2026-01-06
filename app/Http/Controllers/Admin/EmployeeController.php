<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\EmployeeInterface;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    protected $interface;
    public function __construct(EmployeeInterface $interface)
    {
        $this->interface= $interface;
        $this->middleware(['permission:Create Employee view'])->only(['index']);
        $this->middleware(['permission:Create Employee create'])->only(['create']);
        $this->middleware(['permission:Create Employee edit'])->only(['edit']);
        $this->middleware(['permission:Create Employee destroy'])->only(['destroy']);
        $this->middleware(['permission:Create Employee status'])->only(['status']);
        $this->middleware(['permission:Create Employee restore'])->only(['restore']);
        $this->middleware(['permission:Create Employee delete'])->only(['delete']);
        $this->middleware(['permission:Create Employee show'])->only(['show']);
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
    public function store(EmployeeRequest $request)
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
    public function update(EmployeeRequest $request, string $id)
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
