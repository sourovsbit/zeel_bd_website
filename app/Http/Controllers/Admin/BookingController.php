<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\BookingInterface;
use App\Http\Requests\BookingRequest;

class BookingController extends Controller
{
    protected $interface;
    public function __construct(BookingInterface $interface)
    {
        $this->interface= $interface;
        $this->middleware(['permission:Bookings view'])->only(['index']);
        $this->middleware(['permission:Bookings create'])->only(['create']);
        $this->middleware(['permission:Bookings edit'])->only(['edit']);
        $this->middleware(['permission:Bookings destroy'])->only(['destroy']);
        $this->middleware(['permission:Bookings status'])->only(['status']);
        $this->middleware(['permission:Bookings restore'])->only(['restore']);
        $this->middleware(['permission:Bookings delete'])->only(['delete']);
        $this->middleware(['permission:Bookings show'])->only(['show']);
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
        return $this->interface->show($id);
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
    public function update(Request $request, string $id)
    {
        //
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
}
