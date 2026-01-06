<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\MissionVisionRepository;
use App\Http\Requests\MissionVisionRequest;

class MissionVisionController extends Controller
{
    protected $repo;
    public function __construct(MissionVisionRepository $repo)
    {
        $this->repo= $repo;
        $this->middleware(['permission:Mission Vision view'])->only(['index']);
        $this->middleware(['permission:Mission Vision create'])->only(['create']);
        $this->middleware(['permission:Mission Vision edit'])->only(['edit']);
        $this->middleware(['permission:Mission Vision destroy'])->only(['destroy']);
        $this->middleware(['permission:Mission Vision status'])->only(['status']);
        $this->middleware(['permission:Mission Vision restore'])->only(['restore']);
        $this->middleware(['permission:Mission Vision delete'])->only(['delete']);
        $this->middleware(['permission:Mission Vision show'])->only(['show']);
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
    public function update(MissionVisionRequest $request, string $id)
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
