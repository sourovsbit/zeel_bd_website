<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\AboutUsRepository;
use App\Http\Requests\AboutUsRequest;

class AboutUsController extends Controller
{
    protected $repo;
    public function __construct(AboutUsRepository $repo)
    {
        $this->repo= $repo;
        $this->middleware(['permission:About Us view'])->only(['index']);
        $this->middleware(['permission:About Us create'])->only(['create']);
        $this->middleware(['permission:About Us edit'])->only(['edit']);
        $this->middleware(['permission:About Us destroy'])->only(['destroy']);
        $this->middleware(['permission:About Us status'])->only(['status']);
        $this->middleware(['permission:About Us restore'])->only(['restore']);
        $this->middleware(['permission:About Us delete'])->only(['delete']);
        $this->middleware(['permission:About Us show'])->only(['show']);
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
    public function update(AboutUsRequest $request, string $id)
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
