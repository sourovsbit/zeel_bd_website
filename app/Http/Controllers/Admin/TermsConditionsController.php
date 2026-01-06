<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\TermsConditionsRepository;
use App\Http\Requests\TermsConditionsRequest;

class TermsConditionsController extends Controller
{
    protected $repo;
    public function __construct(TermsConditionsRepository $repo)
    {
        $this->repo= $repo;
        $this->middleware(['permission:Terms & Conditions view'])->only(['index']);
        $this->middleware(['permission:Terms & Conditions create'])->only(['create']);
        $this->middleware(['permission:Terms & Conditions edit'])->only(['edit']);
        $this->middleware(['permission:Terms & Conditions destroy'])->only(['destroy']);
        $this->middleware(['permission:Terms & Conditions status'])->only(['status']);
        $this->middleware(['permission:Terms & Conditions restore'])->only(['restore']);
        $this->middleware(['permission:Terms & Conditions delete'])->only(['delete']);
        $this->middleware(['permission:Terms & Conditions show'])->only(['show']);
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
    public function update(TermsConditionsRequest $request, string $id)
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
