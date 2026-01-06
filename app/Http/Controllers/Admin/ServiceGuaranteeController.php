<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ServiceGuaranteeRepository;
use App\Http\Requests\ServiceGuaranteeRequest;

class ServiceGuaranteeController extends Controller
{
    protected $repo;
    public function __construct(ServiceGuaranteeRepository $repo)
    {
        $this->repo= $repo;
        $this->middleware(['permission:Service Guarantee view'])->only(['index']);
        $this->middleware(['permission:Service Guarantee create'])->only(['create']);
        $this->middleware(['permission:Service Guarantee edit'])->only(['edit']);
        $this->middleware(['permission:Service Guarantee destroy'])->only(['destroy']);
        $this->middleware(['permission:Service Guarantee status'])->only(['status']);
        $this->middleware(['permission:Service Guarantee restore'])->only(['restore']);
        $this->middleware(['permission:Service Guarantee delete'])->only(['delete']);
        $this->middleware(['permission:Service Guarantee show'])->only(['show']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->repo->create();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceGuaranteeRequest $request, string $id)
    {
        return $this->repo->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
