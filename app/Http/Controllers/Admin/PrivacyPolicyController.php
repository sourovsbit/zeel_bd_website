<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\PrivacyPolicyRepository;
use App\Http\Requests\PrivacyPolicyRequest;

class PrivacyPolicyController extends Controller
{
    protected $repo;
    public function __construct(PrivacyPolicyRepository $repo)
    {
        $this->repo= $repo;
        $this->middleware(['permission:Privacy Policy view'])->only(['index']);
        $this->middleware(['permission:Privacy Policy create'])->only(['create']);
        $this->middleware(['permission:Privacy Policy edit'])->only(['edit']);
        $this->middleware(['permission:Privacy Policy destroy'])->only(['destroy']);
        $this->middleware(['permission:Privacy Policy status'])->only(['status']);
        $this->middleware(['permission:Privacy Policy restore'])->only(['restore']);
        $this->middleware(['permission:Privacy Policy delete'])->only(['delete']);
        $this->middleware(['permission:Privacy Policy show'])->only(['show']);
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
    public function update(PrivacyPolicyRequest $request, string $id)
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
