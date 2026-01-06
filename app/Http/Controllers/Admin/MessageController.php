<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\MessageInterface;
use App\Http\Requests\MessageRequest;

class MessageController extends Controller
{
    protected $interface;
    public function __construct(MessageInterface $interface)
    {
        $this->interface= $interface;
        $this->middleware(['permission:Message view'])->only(['index']);
        $this->middleware(['permission:Message create'])->only(['create']);
        $this->middleware(['permission:Message edit'])->only(['edit']);
        $this->middleware(['permission:Message destroy'])->only(['destroy']);
        $this->middleware(['permission:Message status'])->only(['status']);
        $this->middleware(['permission:Message restore'])->only(['restore']);
        $this->middleware(['permission:Message delete'])->only(['delete']);
        $this->middleware(['permission:Message show'])->only(['show']);
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
