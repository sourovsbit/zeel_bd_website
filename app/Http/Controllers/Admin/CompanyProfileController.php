<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CompanyProfileRepository;
use App\Http\Requests\CompanyProfileRequest;

class CompanyProfileController extends Controller
{
    protected $repo;
    public function __construct(CompanyProfileRepository $repo)
    {
        $this->repo= $repo;
        $this->middleware(['permission:Company Profile view'])->only(['index']);
        $this->middleware(['permission:Company Profile create'])->only(['create']);
        $this->middleware(['permission:Company Profile edit'])->only(['edit']);
        $this->middleware(['permission:Company Profile destroy'])->only(['destroy']);
        $this->middleware(['permission:Company Profile status'])->only(['status']);
        $this->middleware(['permission:Company Profile restore'])->only(['restore']);
        $this->middleware(['permission:Company Profile delete'])->only(['delete']);
        $this->middleware(['permission:Company Profile show'])->only(['show']);
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
    public function update(CompanyProfileRequest $request, string $id)
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
