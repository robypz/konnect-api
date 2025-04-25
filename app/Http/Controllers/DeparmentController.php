<?php

namespace App\Http\Controllers;

use App\Models\Deparment;
use App\Http\Requests\StoreDeparmentRequest;
use App\Http\Requests\UpdateDeparmentRequest;

class DeparmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deparments = Deparment::all();
        return response()->json($deparments,200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDeparmentRequest $request)
    {
        $deparment = Deparment::create($request->validated());
        return response()->json($deparment,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Deparment $deparment)
    {
        return response()->json($deparment,200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDeparmentRequest $request, Deparment $deparment)
    {
        $deparment->update($request->validated());
        return response()->json($deparment,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deparment $deparment)
    {
        $deparment->delete();
        return response()->json(null,204);
    }
}
